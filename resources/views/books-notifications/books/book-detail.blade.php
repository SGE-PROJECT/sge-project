@extends('layouts.panelUsers')

@section('titulo')
    Detalle del Libro - {{ $book->title }}
@endsection

@section('contenido')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <div class=" pb-7">
                        <div class="bg-gray-800 rounded-lg p-6 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                            <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
                            <div class="mt-4" style="max-height: 200px; overflow-y: auto;">
                                <p>{{ $book->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        <div class=" grid grid-cols-2 gap-4">
                            <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                <p class="font-bold">Editorial:</p>
                                <p class="mt-2">{{ $book->editorial }}</p>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                <p class="font-bold">Autor:</p>
                                <p class="mt-2">{{ $book->author }}</p>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                <p class="font-bold">Precio:</p>
                                <p class="mt-2">${{ $book->price }}</p>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                <p class="font-bold">Año de publicación:</p>
                                <p class="mt-2">${{ $book->year_published }}</p>
                            </div>
                            @if ($students->count()>1)
                            
                            <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                <p class="font-bold">Colaboradores:</p>
                                @forelse ($students as $student )
                                <p class="mt-2">{{ $student }}</p>
                                @empty
                                @endforelse
                            </div>
                            @else
                            <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                <p class="font-bold">Colaborador:</p>
                                @forelse ($students as $student )
                                <p class="mt-2">{{ $student }}</p>
                                @empty
                                @endforelse
                            </div>
                            @endif
                            <div class="bg-gray-800 rounded-lg p-2 text-white hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101">
                                <p class="font-bold">Estado:</p>
                                @if ($book->state===1) 
                                <p class="mt-2">Finalizado</p>
                                @else
                                <p class="mt-2">En proceso</p>
                                @endif
                            </div>
                           
                                
                                
                        </div>
                    </div>
                </div>

                <div class="flex flex-col justify-center ">
                    <div class="grid grid-cols-1 gap-4 h-full w-full  justify-items-center">
                        <img src="{{$book->image_book}}" alt="" class=" min-h-[450px] min-w-[320px]">
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
@endsection
