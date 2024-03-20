
@extends('layouts.panel')

@section('titulo', 'Agregar Carrera')

@section('contenido')
<div class="container">
    <a href="{{ route('carreras.index') }}">
        <div class="flex items-center ml-11 mt-11 mb-5">
            <button type="button" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Regresar
            </button>
        </div>
    </a>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="border-b py-2 rounded mb-4">
            <h2 class="text-2xl text-center font-bold text-aqua-600">Agregar Carrera</h2>
        </div>
        <form method="POST" action="{{ route('carreras.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Carrera</label>
                <input id="name" type="text" placeholder="Nombre de la Carrera" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" required>
            </div>

            <div class="mb-4">
                <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División</label>
                <select id="division_id" name="division_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Seleccione una División</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                <textarea id="description" placeholder="Descripción" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de inicio</label>
                <input id="start_date" type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="start_date" value="{{ old('start_date', $program->start_date ?? '') }}" required>
            </div>
            
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de fin</label>
                <input id="end_date" type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="end_date" value="{{ old('end_date', $program->end_date ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
                <input id="image" type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image">
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Agregar Carrera
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
