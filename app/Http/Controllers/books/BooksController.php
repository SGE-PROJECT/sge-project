<?php

namespace App\Http\Controllers\books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books-notifications.books.books');
    }
    public function listBook(){
        $books =Book::all();
        return view('books-notifications.books.BooksList',compact('books'));
    }
    public function report (){
        $image='images/utcbis-logo.jpg';
        $books =Book::all();
       $pdf = Pdf::loadView('books-notifications.books.reports', compact( 'books','image'));
       return $pdf->stream('books_reports.pdf');
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
            ['imagen' => 'images/books/c-book.jpg', 'titulo' => "Programación orientada a objetos con C++ y Java.", "descripcion" => "Sumérgete en el mundo de la programación orientada a objetos con este libro, que cubre tanto C++ como Java, ofreciendo una guía completa desde los fundamentos hasta técnicas avanzadas, ideal para desarrolladores en busca de un dominio sólido en POO.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Francisco', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/cert-book.jpg', 'titulo' => "Certificado de profesionalidad en programación", "descripcion" => "Este certificado ofrece una sólida formación en programación, abordando desde los conceptos básicos hasta las habilidades avanzadas necesarias en el mundo laboral actual, proporcionando una base sólida para el éxito en el campo de la programación.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Gael', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/java-book.jpg', 'titulo' => "Programación orientada a objetos con Java", "descripcion" => "Sumérgete en el mundo de la programación orientada a objetos con este libro enfocado en Java, que ofrece una guía completa desde los fundamentos hasta las técnicas avanzadas, ideal para desarrolladores en busca de un dominio sólido en POO con este lenguaje.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Andrea', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/java-poo-book.jpg', 'titulo' => "Pilares de la programación orientada a objetos con Java", "descripcion" => "Explora los fundamentos esenciales de la programación orientada a objetos con Java, desglosando los pilares clave que sustentan este paradigma de desarrollo. Desde la encapsulación hasta la herencia y la polimorfismo, este libro te guiará a través de los conceptos fundamentales para dominar la programación orientada a objetos en Java.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Ceana', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/js-book.jpg', 'titulo' => "Introducción moderna a la programación con Javascript", "descripcion" => "Una introducción fresca a la programación con JavaScript, explorando desde los fundamentos hasta las últimas tendencias para crear aplicaciones web dinámicas y escalables. Este libro te sumerge en el mundo de JavaScript de manera accesible y actualizada.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Guillermo', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/logica-book.jpg', 'titulo' => "Lógica de programación orientada a objetos", "descripcion" => "Domina la lógica de la programación orientada a objetos con este libro conciso. Desde la conceptualización hasta la implementación, explora cómo estructurar y diseñar sistemas robustos utilizando principios fundamentales de la POO.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Joshua', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/logica-java-book.jpg', 'titulo' => "Algoritmos y programación en Java", "descripcion" => "Descubre la magia de los algoritmos y la programación en Java con este libro. Desde la teoría hasta la práctica, adéntrate en la resolución de problemas y la optimización de código en uno de los lenguajes más versátiles", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Adiel', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/metodologia-book.jpg', 'titulo' => "Metodología de la pragramación orientada a objetos", "descripcion" => "Explora la metodología de la programación orientada a objetos en este libro conciso. Desde la planificación hasta la implementación, aprende a diseñar sistemas flexibles y mantenibles utilizando principios sólidos de la POO.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: David', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/model-book.jpg', 'titulo' => "Modelo y diseño orientado a objetos", "descripcion" => "Sumérgete en el mundo del modelo y diseño orientado a objetos con este libro esencial. Desde la conceptualización hasta la implementación, aprende a crear sistemas eficientes y escalables utilizando las mejores prácticas de diseño.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Angel', "Precio" => "Precio: \$520" ],
            ['imagen' => 'images/books/poo-book.jpg', 'titulo' => "Buenas prácticas de programación orientada a objetos en Java", "descripcion" => "Descubre las mejores prácticas de programación orientada a objetos en Java con este libro. Desde la estructuración del código hasta la optimización, aprende a desarrollar aplicaciones robustas y mantenibles siguiendo estándares de calidad.", 'editorial' => "Editorial de prueba $id", 'alumno' => 'Alumno: Paloma', "Precio" => "Precio: \$520" ]
        ];

        $libro = $libros[$id];

        // Luego, pasamos el libro a la vista de detalle del libro junto con el índice
        return view('books-notifications.books.book-detail', compact('libro', 'id'));
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
