@extends('layouts.panel')

@section('titulo')
    Detalle del Libro - {{ $libro['titulo'] }}
@endsection

@section('contenido')
    <div class="container-bor mx-auto">
        <div class="w-90 mx-auto md:max-w-full my-10">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="container-card-book h-90 md:h-screen flex items-center justify-center mt-20">
                        <div class="slide-in-left">
                            <div class="scale">
                                <div class="card-book-d">
                                    <div class="card__content-book">
                                        <img src="{{ asset($libro['imagen']) }}" alt="Imagen del libro" class="w-full">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-card md:max-w-full md:flex-1">
                        <div class="ctn-bor p-6">
                            <div>
                                <div class="bg-gray-800 rounded-lg p-6 text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                    <div class="card-detail-book">
                                        <div class="card-text">
                                            <h1 class="text-xl font-bold">{{ $libro['titulo'] }}</h1>
                                            <p>{{ $libro['descripcion'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <div class="bg-gray-800 rounded-lg p-6 text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                            <div class="card-detail-book">
                                                <div class="card-text">
                                                    <p>{{ $libro['editorial'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-gray-800 rounded-lg p-6 text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                            <div class="card-detail-book">
                                                <div class="card-text">
                                                    <p>{{ $libro['alumno'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-gray-800 rounded-lg p-6 text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                            <div class="card-detail-book">
                                                <div class="card-text">
                                                    <p>{{ $libro['Precio'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('libros.index') }}" class="block">
                                    <button class="button-books bg-teal-500">Volver a la lista de libros</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
