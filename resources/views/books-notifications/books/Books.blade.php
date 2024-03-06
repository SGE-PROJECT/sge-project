@extends('layouts.panel')

@section('titulo')
    Libros
@endsection

@section('contenido')
    @php
    // Definir el arreglo de libros
    $libros = [
        ['imagen' => 'images/books/c-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/cert-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/java-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/java-poo-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/js-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/logica-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/logica-java-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/metodologia-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/model-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
        ['imagen' => 'images/books/poo-book.jpg', 'titulo' => 'Libro - ', 'editorial' => 'Editorial -'],
    ];
    @endphp

    <div class="container">
        <h1 class="title-books"> - Libros -</h1>
        <div class="flex flex-wrap mx-10 gap-10 ctn-bk">
            <div class=" w-full"> <!-- Establecemos una altura máxima que equivalga a mostrar 4 libros -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 items-center">
                    <!-- Iterar sobre los elementos del arreglo -->
                    @foreach($libros as $libro)
                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset($libro['imagen']) }}" alt="Imagen del libro">
                            </div>
                        </div>
                       <a href="{{ route('books.show', ['book' => $loop->index]) }}"><button class="button-books">Ver Libro</button></a>
                    </div>
                    @endforeach
                    <!-- Fin del bucle -->
                </div>
            </div>
        </div>
    </div>
@endsection
