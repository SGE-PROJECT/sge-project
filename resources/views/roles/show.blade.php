@extends('layouts.panel')

@section('titulo', 'Detalles del Rol')

@section('contenido')
    <link rel="stylesheet" href="/css/roles/details.css">

    <div class="container">
        <div class="heading">
            {{ __('DETALLES DEL ROL') }}
        </div>
        <div class="edit-form">
            <div class="form-group-name">
                <div class="input-box">
                    <input id="name" type="text" name="name" value="{{ $role->name }}" required autofocus />
                    <label for="name">Nombre del rol</label>
                </div>
            </div>

            <div class="form-group">
                <label class="permission-label">{{ __('Permisos') }}</label>

                <div class="checkbox-group">
                    @foreach ($role->permissions as $permission)
                    <div class="checkbox">
                        <label for="permission-{{ $permission->id }}"
                            class="checkbox-label">{{ $permission->description }}</label>
                    </div>
                    @endforeach
                </ul>
            </div>


            <div class="card-footer">
                <a href="{{ route('roles.permissions.index') }}" class="btn btn-secondary">Volver a la lista de roles</a>
            </div>
        </div>
    </div>
@endsection
