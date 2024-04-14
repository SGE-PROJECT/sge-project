@extends('layouts.panel')

@section('titulo')
Gestión De Usuarios
@endsection

@section('contenido')
@vite('resources/css/users/cruduser.css')

<h1 class="fondo text-center font-bold pt-10 pb-12">Lista de Usuarios</h1>

<a  href="{{ route('users.cruduser.create')}}" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors font-bold py-2 px-4 focus:outline-none focus:shadow-outline mb-2 sm:mb-0 md:mb-2 lg:mb-0 rounded">Agregar usuario </a>
<a  href="{{ route('users.masiveadd.index')}}" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors font-bold py-2 px-4 focus:outline-none focus:shadow-outline mb-2 sm:mb-0 md:mb-2 lg:mb-0 rounded">Agregar usuarios </a>

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
                        {{$user->division_name ?? 'Sin división'}}
                    </td>
                    <td class="py-4 px-6">
                        {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('users.cruduser.edit', $user->id) }}" class="bg-[#03A696] hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline mb-2 sm:mb-0 md:mb-2 lg:mb-0 rounded">Editar</a>
                                                                                         
                        <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#03A696] hover:bg-red-600 text-white py-2 px-4 rounded  mb-2 sm:mb-0 md:mb-2 lg:mb-0 hover:underline" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
