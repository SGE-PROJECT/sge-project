@extends('layouts.panelUsers')

@section('titulo')
Gestión De Usuarios
@endsection

@section('contenido')
<style>
    .modal-button {
        padding: 1.0em 1.0em;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: bold;
        color: #ffffff;
        background-color: teal-500;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        display: inline-block;
        position: relative;
        z-index: 2;
    }
    .fondo{
        text-align: center;  
        font-size: 30px; 
        color: #293846;
        padding: 20px 10px 2px;
        font-weight: bold;
        position: relative;
        z-index: 2;
    }
    .video-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .video-container video {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0.5;
        z-index: 1;
    }
    .tabla-project {
        margin-top: -32px;
        z-index: 3;
    }
    .rounded-lg {
        border: 3px solid #CCD1D1;
        overflow: visible;
        width: 190px;
        height: 254px;
    }
</style>
<div class="video-container">
    <video autoplay muted loop>
        <source src="{{ asset('/images/roles/video2.mp4') }}" type="video/mp4">
    </video>
<h1 class="fondo text-center font-bold pt-10 pb-12">Lista de Usuarios</h1>

<a  href="{{ route('users.cruduser.create')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white  rounded hover:bg-teal-600 transition-colors">Agregar usuario </a>
<a  href="{{ route('users.masiveadd.index')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white  rounded hover:bg-teal-600 transition-colors">Agregar usuarios </a>

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
                        <a href="{{ route('users.cruduser.edit', $user->id) }}" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-2 sm:mb-0 md:mb-2 lg:mb-0">Editar</a>
                        <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-2 sm:mb-0 md:mb-2 lg:mb-0 hover:underline" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
