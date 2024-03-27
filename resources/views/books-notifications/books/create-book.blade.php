@extends('layouts.panel')

@section('titulo')
    Crear Libro
@endsection

@section('contenido')
    <div class="container p-10">
        <h1 class="text-3xl font-semibold mb-4">Crear Libro</h1>
        <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="4" required></textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
                <input type="text" name="author" id="author" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('author')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="editorial" class="block text-sm font-medium text-gray-700">Editorial</label>
                <input type="text" name="editorial" id="editorial" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('editorial')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="year_published" class="block text-sm font-medium text-gray-700">Año de Publicación</label>
                <input type="number" name="year_published" id="year_published" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('year_published')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" name="price" id="price" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('price')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="student" class="block text-sm font-medium text-gray-700">Estudiante</label>
                <input type="text" name="student" id="student" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('student')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tuition" class="block text-sm font-medium text-gray-700">Matrícula</label>
                <input type="text" name="tuition" id="tuition" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('tuition')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image_book" class="block text-sm font-medium text-gray-700">Imagen del Libro</label>
                <input type="file" name="image_book" id="image_book" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('image_book')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="estate" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="estate" id="estate" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="0">En proceso</option>
                    <option value="1">Finalizado</option>
                </select>
                @error('estate')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-md button-books">Crear Libro</button>

        </form>
        <a href="{{ route('libros.index') }}" class="block">
            <button class="button-books create-book-position bg-teal-500">Volver a la lista de libros</button>
        </a>
    </div>
@endsection
