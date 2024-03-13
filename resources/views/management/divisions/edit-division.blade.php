@extends('layouts.panel')

@section('titulo', 'Editar División')

@section('contenido')

<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <div class="border py-2 rounded mb-4">
        <h2 class="text-2xl text-center font-bold text-aqua-600">Editar División</h2>
    </div>

    <form action="{{ route('divisiones.update', $division->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $division->name }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <textarea name="description" id="description"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                rows="3">{{ $division->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
            <input type="file" name="image" id="image"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                accept="image/*">
        </div>
        <div class="flex items-center justify-center">
            <button type="submit"
                class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar
                División</button>
        </div>
    </form>

</div>

@endsection
