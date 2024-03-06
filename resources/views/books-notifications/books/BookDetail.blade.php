@extends('layouts.panel')

@section('titulo')
    Detalle del Libro - {{ $libro['titulo'] }}
@endsection

@section('contenido')
    <div class="container-bor mx-auto">
        <div class="max-w-auto max-h-10 m-10">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="container-card-book max-w-full md:max-w-3xl mx-auto flex items-center justify-center h-screen">

                            <div class="scale">
                                <div class="card-book">
                                    <div class="card__content-book">
                                        <img src="{{ asset($libro['imagen']) }}" alt="Imagen del libro"">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container-card max-w-full md:max-w-3xl mx-auto">
                            <div class="ctn-bor p-4">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <h1 class="text-xl font-bold text-gray-800">{{ $libro['titulo'] }}</h1>
                                <br>
                                <br>
                                <p class="text-gray-700">{{ $libro['descripcion'] }}</p>
                                <a href="{{ route('books.index') }}"><button class="button-books">Volver a la lista de libros</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
