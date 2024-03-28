@extends('layouts.panelUsers')

@section('titulo')
    Crear Roles
@endsection

@section('contenido')
@vite('resources/css/roles/crateroles.css');

    <div class="container">
        <div class="heading">
            {{ __('AGREGAR NUEVO ROL') }}
        </div>

        <div class="edit-form">
            <form method="POST" action="{{ route('roles.permissions.store') }}">
                @csrf
                <div class="form-group-name">
                    <div class="input-box">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
                        <label for="name">Nombre del rol</label>

                        @error('name')
                            <span role="alert" class="error-message">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="permission-label">{{ __('Permisos') }}</label>

                    <div class="checkbox-group">
                        @foreach ($permissions as $permission)
                            <div class="checkbox">
                                <input type="checkbox" value="{{ $permission->name }}" name="permissions[]"
                                    id="permission{{ $permission->id }}" class="input-checkbox">
                                <label for="permission{{ $permission->id }}" class="checkbox-label">
                                    {{ $permission->description }}
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

                <div class="botones-container">
                    <button type="submit" class="btn btn-primary">
                        {{ __('AGREGAR ROL') }}
                    </button>
                    <a href="{{ route('roles.permissions.index') }}" class="btn btn-secondary">
                        {{ __('CANCELAR') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
{{-- LOGICA PARA QUE LOS CHECKBOX PRINCIPALES SE AUTOMARQUEN CUANDO SE SELECCIONA UN PERMISO RELACIONADO CON EL PRINCIPAL --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/permissions.js"></script>
@endsection
