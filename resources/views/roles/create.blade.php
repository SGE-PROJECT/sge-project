@extends('layouts.panel')

@section('titulo')
    Crear Roles
@endsection

@section('contenido')
<link rel="stylesheet" href="/css/roles/crateroles.css">

<div class="container">
    <div class="heading">
        {{ __('Crear Nuevo Rol') }}
    </div>

    <div class="edit-form">
        <form method="POST" action="{{ route('roles.permissions.store') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="label">{{ __('Nombre del Rol') }}</label>

                <div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="input">

                    @error('name')
                        <span role="alert" class="error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="label">{{ __('Permisos') }}</label>

                <div class="checkbox-group">
                    @foreach($permissions as $permission)
                        <div class="checkbox">
                            <input type="checkbox" value="{{ $permission->name }}" name="permissions[]" id="permission{{ $permission->id }}" class="input-checkbox">
                            <label for="permission{{ $permission->id }}" class="checkbox-label">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach

                    @error('permissions')
                        <span role="alert" class="error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Crear Rol') }}
                </button>
                <a href="{{ route('roles.permissions.index') }}" class="btn btn-secondary">
                    {{ __('Cancelar') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
