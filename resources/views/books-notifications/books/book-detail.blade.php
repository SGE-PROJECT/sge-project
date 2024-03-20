@extends('layouts.panel')

@section('titulo')
    Detalle del Libro - {{ $book->title }}
@endsection

@section('contenido')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="p-7">
                        <div class="bg-gray-800 rounded-lg p-6 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                            <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
                            <p class="mt-4">{{ $book->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                            <p class="font-bold">Editorial:</p>
                            <p class="mt-2">{{ $book->editorial }}</p>
                        </div>
                        <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                            <p class="font-bold">Alumno:</p>
                            <p class="mt-2">{{ $book->student }}</p>
                        </div>
                        <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                            <p class="font-bold">Precio:</p>
                            <p class="mt-2">${{ $book->price }}</p>
                        </div>
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('libros.index') }}" class="block">
                            <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                                Volver a la lista de libros
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
