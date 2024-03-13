@extends('layouts.panel')

@section('titulo')
    Libros
@endsection

@section('contenido')
    @php
    $libros = [
        ['imagen' => 'images/books/c-book.jpg'],
        ['imagen' => 'images/books/cert-book.jpg'],
        ['imagen' => 'images/books/java-book.jpg'],
        ['imagen' => 'images/books/java-poo-book.jpg'],
        ['imagen' => 'images/books/js-book.jpg'],
        ['imagen' => 'images/books/logica-book.jpg'],
        ['imagen' => 'images/books/logica-java-book.jpg'],
        ['imagen' => 'images/books/metodologia-book.jpg'],
        ['imagen' => 'images/books/model-book.jpg'],
        ['imagen' => 'images/books/poo-book.jpg'],
    ];
    @endphp

    <div class="container-bk">
        <h1 class="title-books"> - Libros -</h1> 
        <a href="{{ route('añadir.libros') }}"><button class="button-books position-books">Registrar Libro</button></a>
        
        <div class="flex flex-wrap mx-10 gap-10 ctn-bk">
            <div class=" w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 items-center">
                    
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
                    
                </div>
            </div>
        </div>
    </div>
@endsection
