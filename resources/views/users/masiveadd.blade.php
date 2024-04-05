@extends('layouts.panel')

@section('titulo')
Gestión Masiva De Usuarios
@endsection

@section('contenido')
<h1 class="text-center font-bold text-4xl py-4 text-black">Registro de usuarios</h1>

<a  href="{{ route('users.exportCsv')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white  rounded hover:bg-teal-600 transition-colors">Descargar Excell</a>
<a  href="{{ route('users.import')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white  rounded hover:bg-teal-600 transition-colors">Subir Excell</a>
<form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Importar Usuarios</button>
</form>

<div class="tabla-project rounded-t-lg">
    <div class="tabla-cont-project rounded-t-lg">
        <table class="rounded-lg">
            <thead>
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nombre
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        División
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
                <tr >
                    <td class="py-4 px-6">
                        {{ $user->name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $user->email }}
                    </td>
                    <td class="py-4 px-6">
                        {{$user->division->name ?? 'Sin división'}}
                    </td>
                    <td class="py-4 px-6">
                        {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('users.cruduser.edit', $user->id) }}" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4 sm:mb-0">Editar</a>
                        <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4 sm:mb-0 hover:underline" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
