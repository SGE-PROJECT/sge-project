@extends('layouts.panel')

@section('titulo', 'Detalles del Rol')

@section('contenido')
<link rel="stylesheet" href="/css/roles/details.css">

<div class="container">
    <h1>Detalles del Rol</h1>
    <div class="card">
        <div class="card-body">
            <h3>Nombre del Rol: {{ $role->name }}</h3>
            <h3>Permisos:</h3>
            <ul>
                @foreach($role->permissions as $permission)
                    <li>{{ $permission->description }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('roles.permissions.index') }}">Volver a la lista de roles</a>
        </div>
    </div>
</div>
@endsection
