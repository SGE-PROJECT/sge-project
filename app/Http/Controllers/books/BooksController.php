<?php

namespace App\Http\Controllers\books;


use Illuminate\Support\Facades\DB;
use Goutte\Client;
use App\Models\Book;
use App\Models\User;
use App\Models\Student;
use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\CommentNotification;
use App\Http\Controllers\Controller;
use App\Models\ManagmentAdmin;
use App\Models\Secretary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\DomCrawler\Crawler;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Panther\PantherTestCase;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Notifications\DivisionAdministratorNotification;



class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $estado = $request->estado;
        $query = $request->query('query'); // Obtener el parámetro de búsqueda del request
        $user = Auth::user();
        $idUser =$user->id;
        $divId = Secretary::where('user_id', $idUser)->select('division_id')->get();
        $divisionId=$divId[0]->division_id;


        $booksOfStudents = Student::join('groups', 'students.group_id', '=', 'groups.id')
        ->join('programs', 'groups.program_id', '=', 'programs.id')
        ->join('divisions', 'programs.division_id', '=', 'divisions.id')
        ->join('users', 'students.user_id', '=', 'users.id')
        ->join('books','students.book_id','=','books.id')
        ->where('divisions.id', $divisionId)
        ->whereNotNull('students.book_id')
        ->select('books.*') 
        ->get();

       

        
        $oneBookforStudent = collect([]);
        foreach($booksOfStudents as $book){
           // Verificar si el libro ya existe en $oneBookforStudent
    if (!$oneBookforStudent->contains('id', $book->id)) {
        // Si no existe se agrega a $oneBookforStudent
        $oneBookforStudent->push($book);
    }

    }

        // Aplicar filtro por estado si se proporciona
        $filteredBooks = $oneBookforStudent;
        if ($estado === 'finalizado') {
        $filteredBooks=$filteredBooks->where('state', 1);
        } elseif ($estado === 'en-proceso') {
            $filteredBooks = $filteredBooks->where('state', 0);
        }

        // Aplicar filtro por nombre si se proporciona
        if ($query) {
            $filteredBooks = $filteredBooks->where('title', 'LIKE', "%$query%");
        }
        $studentBook=[];

        // Obtener los libros filtrados
        
        foreach($filteredBooks as $book){
            $students=Student::join('users', 'students.user_id', '=', 'users.id')->where('students.book_id',$book->id)->select('users.name as name','students.registration_number as tuition')->get();
            $studentBook[] = [
                'book' => $book,
                'students' => $students
            ];
        }
       

        return view('books-notifications.books.Books', compact('studentBook', 'estado'));
    }


    public function listBook()
    {
        $books = Book::all();
        return view('books-notifications.books.BooksList', compact('books'));
    }
    public function report()
    {
        $image = 'images/utcbis-logo.jpg';
        $books = Book::all();

        $user = Auth::user();
        $idUser =$user->id;
        $divId = Secretary::where('user_id', $idUser)->select('division_id')->get();
        $nDivision=DB::table('divisions')->where('id',$divId[0]->division_id)->select('name')->get();
        $nameDivision=$nDivision[0]->name;
        $divisionId=$divId[0]->division_id;
        $booksOfStudents = Student::join('groups', 'students.group_id', '=', 'groups.id')
        ->join('programs', 'groups.program_id', '=', 'programs.id')
        ->join('divisions', 'programs.division_id', '=', 'divisions.id')
        ->join('users', 'students.user_id', '=', 'users.id')
        ->join('books','students.book_id','=','books.id')
        ->where('divisions.id', $divisionId)
        ->whereNotNull('students.book_id')
        ->select('students.id as student_id','books.id as book_id','users.name as user_name','students.registration_number as tuition','books.created_at as book_created','books.price as book_price','books.title as book_title','books.author as book_author','programs.name as program_name') 
        ->get();
        $pdf = Pdf::loadView('books-notifications.books.reports', compact('booksOfStudents', 'image','nameDivision'))->setPaper('a4', 'landscape');
        return $pdf->stream('books_reports.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $idUser =$user->id;
        $divId = Secretary::where('user_id', $idUser)->select('division_id')->get();
        $role = $user->getRoleNames()->first();

        if($role==="Asistente de Dirección"){
         $divisionId=$divId[0]->division_id;
        $studentsWithoutBook = Student::join('groups', 'students.group_id', '=', 'groups.id')
        ->join('programs', 'groups.program_id', '=', 'programs.id')
        ->join('divisions', 'programs.division_id', '=', 'divisions.id')
        ->join('users', 'students.user_id', '=', 'users.id') // Relación con la tabla users
        ->where('divisions.id', $divisionId)
        ->whereNull('students.book_id')
        ->select('students.*', 'students.registration_number as registration_number', 'users.email as email','users.name as user_name','users.id as user_id') // Selecciona el correo electrónico del usuario
        ->get();
        }else return redirect()->back();



        return view('books-notifications.books.create-book',compact('studentsWithoutBook'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'year_published' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:300',
            'selected_students' => 'required',
            'state' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Después de pasar la validación
$selectedStudentsIds = json_decode($request->selected_students);

//buscar imagen del libro

  // Crear una instancia de cliente Goutte
  $client = new Client();
  $searchTerm ="libro ".$request->title." ".$request->author;

  // Realizar la solicitud GET para cargar la página de búsqueda de Yahoo
  $crawler = $client->request('GET', 'https://mx.search.yahoo.com/');

 // Obtener el formulario de búsqueda
 $form = $crawler->filter('#sf')->form();

  // Establecer el valor del campo de entrada de búsqueda
  $form['p'] = $searchTerm;

  // Enviar el formulario
  $crawler = $client->submit($form);

   // Acceder a la sección de "Imágenes"
   $linkImagenes = $crawler->selectLink('Imágenes')->link();
   $crawler = $client->click($linkImagenes);

  /* // Obtener el enlace de la primera imagen de búsqueda
  $firstImageLink = $crawler->filter('li.ld > a.img > noscript > img')->first()->attr('src'); */

// Intentar obtener el enlace de la primera imagen de búsqueda
$images = $crawler->filter('li.ld > a.img > noscript > img');
$firstImageLink = $images->count() > 0 ? $images->first()->attr('src') : null;

// Si no se encontró la primera imagen, intentar con la segunda
if (!$firstImageLink && $images->count() > 1) {
    $firstImageLink = $images->eq(1)->attr('src'); // 'eq(1)' obtiene el segundo elemento
}

// Comprobar si aún no se ha encontrado ninguna imagen
if (!$firstImageLink) {
    // Manejar la situación, tal vez establecer una imagen predeterminada o lanzar un error
    $firstImageLink="https://educacion2.com/wp-content/uploads/El-mejor-libro.jpg";
}


        // Guardar el libro en la base de datos
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->editorial = $request->editorial;
        $book->year_published = $request->year_published;
        $book->price = $request->price;
        $book->image_book = $firstImageLink;
        $book->state = $request->state;
        $book->save();
        // Asegúrate de que el libro se haya guardado antes de continuar
if($book->exists) {
    // Actualizar el book_id para cada estudiante seleccionado
    Student::whereIn('id', $selectedStudentsIds)->update(['book_id' => $book->id]);
}

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Aquí puedes obtener el libro específico con el ID proporcionado
        /*    $book = Book::findOrFail($id); */
        $book = Book::where('slug', $slug)->firstOrFail();

        // Luego, pasamos el libro a la vista de detalle del libro junto con el índice
        return view('books-notifications.books.book-detail', compact('book'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener el libro por su ID
        $book = Book::findOrFail($id);

        // Retornar la vista de edición con el libro
        return view('books-notifications.books.edit-book', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'year_published' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:300',
            'student' => 'required|string|max:255',
            'tuition' => 'required|string|max:255',
            'image_book' => 'nullable|image|mimes:jpeg,png,jpg',
            'estate' => 'required|boolean',
        ]);

        // Si la validación falla, redireccionar de nuevo al formulario de edición con los errores
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Obtener el libro por su ID
        $book = Book::findOrFail($id);

        // Actualizar los campos del libro con los datos del formulario
        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'editorial' => $request->editorial,
            'year_published' => $request->year_published,
            'price' => $request->price,
            'student' => $request->student,
            'tuition' => $request->tuition,
            'estate' => $request->estate,
        ]);

        // Si se proporcionó una nueva imagen, actualizarla
        if ($request->hasFile('image_book')) {
            $image = $request->file('image_book');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('images/books', $imageName, 'public'); // Guardar el archivo con su nombre original

            // Actualizar el campo de imagen en la base de datos
            $book->update(['image_book' => $imageName]);
        }

        // Redireccionar al usuario de nuevo a la lista de libros con un mensaje de éxito
        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Obtener el libro por su ID
        $book = Book::findOrFail($id);

        // Obtener el nombre de la imagen del libro
        $imageName = $book->image_book;

        // Eliminar el libro de la base de datos
        $book->delete();

        // Borrar la imagen del libro de la carpeta "public"
        Storage::delete("public/images/books/$imageName");

    // Redireccionar al usuario de nuevo a la lista de libros con un mensaje de éxito
    return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente.');
}

public function export()
{
    $user = Auth::user();
    $idUser =$user->id;
    $divId = Secretary::where('user_id', $idUser)->select('division_id')->get();
    $divisionId=$divId[0]->division_id;


    $booksOfStudents = Student::join('groups', 'students.group_id', '=', 'groups.id')
    ->join('programs', 'groups.program_id', '=', 'programs.id')
    ->join('divisions', 'programs.division_id', '=', 'divisions.id')
    ->join('users', 'students.user_id', '=', 'users.id')
    ->join('books','students.book_id','=','books.id')
    ->where('divisions.id', $divisionId)
    ->whereNotNull('students.book_id')
    ->select('students.id as student_id','books.id as book_id','users.name as user_name','students.registration_number as tuition','books.created_at as book_created','books.price as book_price','books.title as book_title','books.author as book_author','programs.name as program_name') 
    ->get();

    return Excel::download(new BooksExport($booksOfStudents), 'libros.xlsx');
}

public function notifications (Request $request){
    $recipients = User::all();
    $user=User::find(9);

   /*  $notification = new ProjectNotification($request->data, $recipient); */
   /* aqui se envia la notificacion a la bd */
   foreach ($recipients as $recipient) {
            Notification::send($recipient,new ProjectNotification($request->data,$recipient));
   }
    /*  $recipient->notify($notification); // Aquí enviamos la notificación al usuario */
    /* aqui se envia al email del usuario */
    Mail::to($user->email)->send(new CommentNotification($request->data, $user->name));
    Mail::to('angelguxman77@gmail.com')->send(new CommentNotification($request->data, $user->name));
    return redirect()->route('libros.index');
}




public function imageBooks()
{
    // Crear una instancia de cliente Goutte
    $client = new Client();
    $searchTerm = "el lenguaje de programación c brian w";
    $imgpath='/'.str_replace(' ', '_', $searchTerm) . '.webp';



    // Realizar la solicitud GET para cargar la página de búsqueda de Yahoo
    $crawler = $client->request('GET', 'https://mx.search.yahoo.com/');

   // Obtener el formulario de búsqueda
   $form = $crawler->filter('#sf')->form();

    // Establecer el valor del campo de entrada de búsqueda
    $form['p'] = $searchTerm;

    // Enviar el formulario
    $crawler = $client->submit($form);

     // Acceder a la sección de "Imágenes"
     $linkImagenes = $crawler->selectLink('Imágenes')->link();
     $crawler = $client->click($linkImagenes);

     // Intentar obtener el enlace de la primera imagen de búsqueda
$images = $crawler->filter('li.ld > a.img > noscript > img');
$firstImageLink = $images->count() > 0 ? $images->first()->attr('src') : null;

// Si no se encontró la primera imagen, intentar con la segunda
if (!$firstImageLink && $images->count() > 1) {
    $firstImageLink = $images->eq(1)->attr('src'); // 'eq(1)' obtiene el segundo elemento
}

// Comprobar si aún no se ha encontrado ninguna imagen
if (!$firstImageLink) {
    // Manejar la situación, tal vez establecer una imagen predeterminada o lanzar un error
    $firstImageLink="https://educacion2.com/wp-content/uploads/El-mejor-libro.jpg";
}

    // Descargar la imagen desde la URL
    $imageContent = file_get_contents($firstImageLink);

    $imagePath = public_path("images\books").$imgpath; // Ruta donde se guardará la imagen, que tambien se puede guardar en la BD

    file_put_contents($imagePath, $imageContent);


   /*  // Imprimir la URL de la primera imagen de búsqueda
    echo "URL de la primera imagen de búsqueda: " . $firstImageLink . PHP_EOL; */
    // Retornar la vista y pasarle el valor de la URL obtenida
    return view('books-notifications.books.book-img', ['imageUrl' => $firstImageLink]);

}

function studentsForDivision(Request $request){
     // Obtener el usuario autenticado
     $user = Auth::user();
   $idUser =$user->id;
      $data=$request->data;
     // Verificar si el usuario está autenticado y tiene un rol
     if ($user) {
         // Obtener el rol del usuario utilizando Spatie Laravel Permission
         $role = $user->getRoleNames()->first(); // Obtener el primer rol asignado al usuario

         if ($role === 'Estudiante') {
             // Lógica para usuarios con rol de administrador
         } elseif ($role === 'Super Administrador') {

         }elseif ($role === 'Administrador de División') {
            $divId = ManagmentAdmin::where('user_id', $idUser)->select('division_id')->get();
            $divisionId=$divId[0]->division_id;

            $students = Student::join('groups', 'students.group_id', '=', 'groups.id')
            ->join('programs', 'groups.program_id', '=', 'programs.id')
            ->join('divisions', 'programs.division_id', '=', 'divisions.id')
            ->join('users', 'students.user_id', '=', 'users.id') // Relación con la tabla users
            ->where('divisions.id', $divisionId)
            ->select('students.*', 'users.email as email','users.name as name','users.id as user_id') // Selecciona el correo electrónico del usuario
            ->get();
            foreach ($students as $student) {
                $user = User::find($student->user_id); // Obtener el usuario asociado al estudiante
                Notification::send($user,new DivisionAdministratorNotification($data,$student));
       }

       return redirect()->back();
        }elseif ($role === 'Asesor Académico') {
            // Lógica para usuarios con rol de editor
        }elseif ($role === 'Presidente Académico') {
            // Lógica para usuarios con rol de editor
        }elseif ($role === 'Asistente de Dirección') {
            // Lógica para usuarios con rol de editor
        }
          else {
             // Lógica para otros roles o usuario sin rol específico
         }
     } else {
         // El usuario no está autenticado
         // Redirigir o mostrar un mensaje de error
     }
}

public function studentBook(){
    // Obtener el usuario autenticado
    $user = Auth::user();
    $idUser =$user->id;
    $studentBook=Student::where('user_id',$idUser)->select('book_id')->get();
    $idBook= $studentBook[0]->book_id;
    $book=Book::where('id',$idBook)->get();
//obtener todos los colaboradores del libro
if($book){
    $bookCollaborative=User::join('students','users.id', '=', 'students.user_id')
    ->join('books','students.book_id', '=', 'books.id')
    ->where('students.book_id',$idBook)
    ->select('users.*')
    ->get();
}


    return view('books-notifications.books.book-student',compact('book','bookCollaborative'));
}


}
