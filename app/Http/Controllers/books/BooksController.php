<?php

namespace App\Http\Controllers\books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books-notifications.books.Books');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Aquí puedes obtener el libro específico con el ID proporcionado
        $libros = [
            ['imagen' => 'images/books/c-book.jpg', 'titulo' => "Programación orientada a objetos con C++ y Java.", "descripcion" => "Sumérgete en el mundo de la programación orientada a objetos con este libro, que cubre tanto C++ como Java, ofreciendo una guía completa desde los fundamentos hasta técnicas avanzadas, ideal para desarrolladores en busca de un dominio sólido en POO.", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/cert-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/java-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/java-poo-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/js-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/logica-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/logica-java-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/metodologia-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/model-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"],
            ['imagen' => 'images/books/poo-book.jpg', 'titulo' => "Libro - $id", 'editorial' => "Editorial - $id"]
        ];

        $libro = $libros[$id];

        // Luego, pasamos el libro a la vista de detalle del libro junto con el índice
        return view('books-notifications.books.BookDetail', compact('libro', 'id'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
