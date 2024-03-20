@extends('layouts.panel')

@section('titulo')
Gestión De Usuarios
@endsection

@section('contenido')

<h1 class="text-2xl font-bold mb-5">Lista de Usuarios</h1>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nombre
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Roles
                </th>
                <th scope="col" class="py-3 px-6">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    {{ $user->name }}
                </td>
                <td class="py-4 px-6">
                    {{ $user->email }}
                </td>
                <td class="py-4 px-6">
                    {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}
                </td>
                <td class="py-4 px-6">
                    <a href="{{ route('users.cruduser.edit', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
