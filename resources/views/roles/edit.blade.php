@extends('layouts.panel')

@section('titulo', 'Editar Rol')

@section('contenido')
<link rel="stylesheet" href="/css/roles/edit.css">

<div class="container">
    <h1 class="heading">Editar Rol</h1>
    <form class="edit-form" method="POST" action="{{ route('roles.permissions.update', $role->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="label">Nombre del Rol:</label>
            <input type="text" id="name" name="name" value="{{ $role->name }}" class="input" required>
        </div>
        <div class="form-group">
            <label class="label">Permisos:</label>
            @foreach($permissions as $permission)
            <div class="checkbox-group">
                <input type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}" value="{{ $permission->id }}" class="checkbox" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                <label for="permission-{{ $permission->id }}" class="checkbox-label">{{ $permission->name }}</label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Rol</button>
        <a href="{{ route('roles.permissions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
