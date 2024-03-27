@extends('layouts.panel')

@section('titulo', 'Roles y permisos')

@section('contenido')
    <link rel="stylesheet" href="css/roles/roles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="container">
        <h1 class="mb-4">Gestión de Roles con Permisos</h1>
        <div class="botonagregar">
            <a href="{{ route('roles.permissions.create') }}" class="add-btn">Agregar Nuevo Rol</a>
        </div>
        <div class="cards-container">
            @foreach ($roles as $role)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $role->name }} </h5>
                        <div class="card-iconos">
                            @switch($role->name)
                                @case('SuperAdmin')
                                    <i class="fas fa-user-shield"></i>
                                @break

                                @case('ManagmentAdmin')
                                    <i class="fas fa-cogs"></i>
                                @break

                                @case('Adviser')
                                    <i class="fas fa-user-tie"></i>
                                @break

                                @case('Student')
                                    <i class="fas fa-user-graduate"></i>
                                @break

                                @case('President')
                                    <i class="fas fa-user-circle"></i>
                                @break

                                @case('Secretary')
                                        <i class="fas fa-user-secret"></i>
                                @break


                                @default
                                <i class="fas fa-exclamation-triangle"></i>
                            @endswitch
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="button-container">
                            <a href="{{ route('roles.permissions.show', $role->id) }}" class="btn btn-info">Ver</a>
                        </div>
                        <div class="button-container">
                            <a href="{{ route('roles.permissions.edit', $role->id) }}" class="btn btn-primary">Editar</a>
                        </div>
                        <div class="button-container">
                            <form action="{{ route('roles.permissions.destroy', $role->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
