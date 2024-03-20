@extends('layouts.panel')

@section('titulo')
Crear Usuario
@endsection

@section('contenido')

<h1 class="text-2xl font-bold mb-5">Agregar Usuario</h1>

<form action="{{ route('users.cruduser.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
        <input type="text" name="name" id="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input type="email" name="email" id="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
        <input type="password" name="password" id="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" />
    </div>

    <div class="mb-4">
        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
        <select name="role" id="role" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @foreach (Spatie\Permission\Models\Role::all() as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="division" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
        <select name="division_id" id="division" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @foreach (App\Models\management\Division::all() as $division)
            <option value="{{ $division->id }}">{{ $division->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Crear Usuario
        </button>
    </div>
</form>

@endsection
