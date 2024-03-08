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
                        <div
                            class="container-card-book max-w-full md:max-w-3xl mx-auto flex items-center justify-center h-screen">

                            <div class="slide-in-left">
                                <div class="scale">
                                    <div class="card-book">
                                        <div class="card__content-book">
                                            <img src="{{ asset($libro['imagen']) }}" alt="Imagen del libro"">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container-card max-w-full md:max-w-3xl mx-auto">
                            <div class="ctn-bor p-4">

                                <div class="card-detail-book">
                                    <a class="card1-detail-book">
                                     <p class="p-book"> 
                                     
                                        <h1 class="text-xl font-bold text-gray-800 h1-book">{{ $libro['titulo'] }}</h1>
                                        <br>
                                        <br>

                                     </p>
                                     <p class="small">
                                     
                                        <p class="p-book">{{ $libro['descripcion'] }}</p>
                                        <br>
                                        <p class="p-book">{{ $libro['editorial'] }}</p>
                                        <br>
                                        <p class="p-book">{{ $libro['Alumno'] }}</p>
                                        <br>
                                        <p class="p-book">{{ $libro['Precio'] }}</p>
                                        <br>
                                    
                                     </p class="p-book">
                                     <div class="go-corner">
                                       <div class="go-arrow">
                                         ?
                                       </div>
                                     </div>
                                   </a>
                                 </div>

                                {{-- <h1 class="text-xl font-bold text-gray-800">{{ $libro['titulo'] }}</h1>
                                <br>
                                <br>
                                <p class="text-gray-700">{{ $libro['descripcion'] }}</p>
                                <br>
                                <p class="text-gray-700">{{ $libro['editorial'] }}</p>
                                <br> --}}
                                <a href="{{ route('books.index') }}"><button class="button-books">Volver a la lista de libros</button></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
