<?php

namespace App\Http\Controllers\books;


use Goutte\Client;
use App\Models\Book;
use App\Models\User;
use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\CommentNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Panther\PantherTestCase;



class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $estado = $request->estado;
        $query = $request->query('query'); // Obtener el parámetro de búsqueda del request

        // Obtener todos los libros
        $books = Book::query();

        // Aplicar filtro por estado si se proporciona
        if ($estado === 'finalizado') {
            $books->where('estate', 1);
        } elseif ($estado === 'en-proceso') {
            $books->where('estate', 0);
        }

        // Aplicar filtro por nombre si se proporciona
        if ($query) {
            $books->where('title', 'LIKE', "%$query%");
        }

        // Obtener los libros filtrados
        $books = $books->get();

        return view('books-notifications.books.Books', compact('books', 'estado'));
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
        $pdf = Pdf::loadView('books-notifications.books.reports', compact('books', 'image'));
        return $pdf->stream('books_reports.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books-notifications.books.create-book');
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
            'student' => 'required|string|max:255',
            'tuition' => 'required|string|max:255',
            'image_book' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
            ],
            'estate' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Procesar y guardar la imagen
        $image = $request->file('image_book');
        $imageName = $image->getClientOriginalName(); // Obtener el nombre original del archivo
        $imagePath = $image->storeAs('images/books', $imageName, 'public'); // Guardar el archivo con su nombre original


        // Guardar el libro en la base de datos
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->editorial = $request->editorial;
        $book->year_published = $request->year_published;
        $book->price = $request->price;
        $book->student = $request->student;
        $book->tuition = $request->tuition;
        $book->image_book = $imageName;
        $book->estate = $request->estate;
        $book->save();

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
    return Excel::download(new BooksExport, 'libros.xlsx');
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
    $searchTerm = "cillyan murphy";
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

    // Obtener el enlace de la primera imagen de búsqueda
    $firstImageLink = $crawler->filter('li.ld > a.img > noscript > img')->first()->attr('src');

    // Descargar la imagen desde la URL
    $imageContent = file_get_contents($firstImageLink);

    $imagePath = public_path("images\books").$imgpath; // Ruta donde se guardará la imagen, que tambien se puede guardar en la BD

    file_put_contents($imagePath, $imageContent);


   /*  // Imprimir la URL de la primera imagen de búsqueda
    echo "URL de la primera imagen de búsqueda: " . $firstImageLink . PHP_EOL; */
    // Retornar la vista y pasarle el valor de la URL obtenida
    return view('books-notifications.books.book-img', ['imageUrl' => $firstImageLink]);

}


}
