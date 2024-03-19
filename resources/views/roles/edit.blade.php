@extends('layouts.panel')

@section('titulo', 'Editar Rol')

@section('contenido')
    <link rel="stylesheet" href="/css/roles/edit.css">

    <div class="container">
        <div class="heading">
            {{ __('EDICIÓN DEL ROL') }}
        </div>
        <form class="edit-form" method="POST" action="{{ route('roles.permissions.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group-name">
                <div class="input-box">
                    <input id="name" type="text" name="name" value="{{ $role->name }}" required autofocus />
                    <label for="name">Nombre del rol</label>
                </div>
            </div>

            <div class="form-group">
                <label class="permission-label">{{ __('Permisos') }}</label>
               
                <div class="checkbox-group">
                    @foreach ($permissions as $permission)
                        <div class="checkbox">
                            <input type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}"
                                value="{{ $permission->id }}" class="checkbox"
                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                            <label for="permission-{{ $permission->id }}"
                                class="checkbox-label">{{ $permission->description }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="botones-container">
                <button type="submit" class="btn btn-primary">Actualizar Rol</button>
                <a href="{{ route('roles.permissions.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
