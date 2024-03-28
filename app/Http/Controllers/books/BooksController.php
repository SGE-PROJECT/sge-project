<?php

namespace App\Http\Controllers\books;

use App\Models\Book;
use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
            'price' => 'required|numeric|min:0',
            'student' => 'required|string|max:255',
            'tuition' => 'required|string|max:255',
            'image_book' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                // Tamaño máximo del archivo en kilobytes
                /* function ($attribute, $value, $fail) {
                    // Verificar el tamaño de la imagen en píxeles
                    list($width, $height) = getimagesize($value);
                    if ($width > 900 || $height > 1200) {
                        $fail('La imagen debe tener un ancho máximo de 900px y un alto máximo de 1200px.');
                    }
                }, */
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


}
