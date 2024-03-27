@extends('layouts.panel')

@section('titulo')
Gestión De Usuarios
@endsection

@section('contenido')
<style>
    .modal-button {
        padding: 1.0em 2em;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 200;
        color: #ffffff;
        background-color: teal-500;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }
    .modal-button:hover {
        background-color: #1E5C43;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #ffffff;
        transform: translateY(-7px);
        box-shadow: 2px 5px 0 0 black;
    }
    .modal-button:active {
        transform: translateY(4px) translateX(1px);
        box-shadow: 0 0 0 0 black;
    }
    .fondo{
        text-align: center;  
        font-size: 35px; 
        color: #293846;
        padding: 1.5%;
        text-shadow: 0px 0px 9px #808B96;
    }
</style>

<h1 class="fondo text-center font-bold pt-10 pb-12">Lista de Usuarios</h1>

<a  href="{{ route('users.cruduser.create')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white  rounded hover:bg-teal-600 transition-colors">Agregar usuario</a>

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
