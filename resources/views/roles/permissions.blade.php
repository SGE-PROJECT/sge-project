@extends('layouts.panel')

@section('titulo', 'Roles y permisos')

@section('contenido')
<link rel="stylesheet" href="css/roles/roles.css">

<div class="container">
    <h1 class="mb-4">Lista de Roles con Permisos</h1>
    <!-- Botón para agregar un nuevo rol -->
    <a href="{{ route('roles.permissions.create') }}" class="btn btn-success mb-3">Agregar Rol</a>
    <div class="row">
        @foreach($roles as $role)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $role->name }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Permisos:</li>
                        @foreach($role->permissions as $permission)
                        <li class="list-group-item">{{ $permission->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('roles.permissions.show', $role->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('roles.permissions.edit', $role->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('roles.permissions.destroy', $role->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
