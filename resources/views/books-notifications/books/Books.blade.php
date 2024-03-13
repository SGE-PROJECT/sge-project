@extends('layouts.panel')

@section('titulo')
    Libros
@endsection

@section('contenido')
    @php
    $libros = [
        ['imagen' => 'images/books/c-book.jpg', 'alumno' => 'Francisco', 'matricula' => '234762'],
        ['imagen' => 'images/books/cert-book.jpg', 'alumno' => 'Gael', 'matricula' => '234342'],
        ['imagen' => 'images/books/java-book.jpg', 'alumno' => 'Andrea', 'matricula' => '223762'],
        ['imagen' => 'images/books/java-poo-book.jpg', 'alumno' => 'Ceana', 'matricula' => '874762'],
        ['imagen' => 'images/books/js-book.jpg', 'alumno' => 'Guillermo', 'matricula' => '980923'],
        ['imagen' => 'images/books/logica-book.jpg', 'alumno' => 'Joshua', 'matricula' => '6744535'],
        ['imagen' => 'images/books/logica-java-book.jpg', 'alumno' => 'Adiel', 'matricula' => '890212'],
        ['imagen' => 'images/books/metodologia-book.jpg', 'alumno' => 'David', 'matricula' => '246909'],
        ['imagen' => 'images/books/model-book.jpg', 'alumno' => 'Angel', 'matricula' => '93029'],
        ['imagen' => 'images/books/poo-book.jpg', 'alumno' => 'Paloma', 'matricula' => '2109470'],
    ];
    @endphp

    <div class="container-bk">
        <h1 class="title-books"> - Libros -</h1> 
        <a href="{{ route('añadir.libros') }}"><button class="button-books bg-teal-500 position-books">Registrar Libro</button></a>
        <a href="{{ route('books.reports') }}"><button class="button-books bg-teal-500 position-books-2">Exportar Lista a PDF</button></a>

        <div class="flex flex-wrap mx-10 gap-10 ctn-bk">
            <div class=" w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 items-center">
                    
                    @foreach($libros as $libro)
                    <div class="container-card-book">
                        <a href="{{ route('libros.show', ['libro' => $loop->index]) }}">
                            <div class="card-book">
                                <div class="card__content-book">
                                    <img src="{{ asset($libro['imagen']) }}" alt="Imagen del libro">
                                    <div class="info-alumno">
                                        <p>Alumno: {{ $libro['alumno'] }}</p>
                                        <p>Matrícula: {{ $libro['matricula'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="shelf"></div>
                        {{-- <a href="{{ route('libros.show', ['libro' => $loop->index]) }}"><button class="button-books">Ver Libro</button></a> --}}
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection
