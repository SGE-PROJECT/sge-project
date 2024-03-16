@extends('layouts.panel')
@section('titulo')
    crear Roles
@endsection
@section('contenido')
<link rel="stylesheet" href="/css/roles/crateroles.css">

    <div>
        <div>
            <div>
                {{ __('Crear Nuevo Rol') }}
            </div>

            <div>
                <form method="POST" action="{{ route('roles.permissions.store') }}">
                    @csrf

                    <div>
                        <label for="name">{{ __('Nombre del Rol') }}</label>

                        <div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label>{{ __('Permisos') }}</label>

                        <div>
                            @foreach($permissions as $permission)
                                <div>
                                    <input type="checkbox" value="{{ $permission->name }}" name="permissions[]" id="permission{{ $permission->id }}">
                                    <label for="permission{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach

                            @error('permissions')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit">
                            {{ __('Crear Rol') }}
                        </button>
                        <a href="{{ route('roles.permissions.index') }}">
                            {{ __('Cancelar') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
