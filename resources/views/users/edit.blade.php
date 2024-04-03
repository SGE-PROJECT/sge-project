@extends('layouts.panel')

@section('titulo')
    Editar Usuario
@endsection

@section('contenido')
<style>
    .modal-button {
        padding: 1.0em 2em;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 200;
        color: #ffffff;
        background-color: bg-teal-500;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }
    .modal-button:hover {
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #ffffff;
        transform: translateY(-4px);
    }
    .modal-button:active {
        transform: translateY(-1px);
    }
    .text-pattern {
    color: transparent;
    text-align: center;
    background-color: rgba(90, 204, 204, 0.5);
    background-image: repeating-linear-gradient(40deg, teal, teal 25px, rgba(255, 255, 255, .5) 25px, rgba(255, 255, 255, .5) 40px);    
    background-clip: text;
    animation: color 50s linear infinite;
    background-size: 200%;    
}
@keyframes color {
    from {
        background-position: 0% 50%;
    }
    to {
        background-position: 100% 50%;
    }
}
</style>

<div class="max-w-lg mx-auto bg-white mt-8 rounded p-6">
    <h1 class="text-pattern text-2xl font-bold mb-5 pt-4">Editar Usuario</h1>
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Hay problemas con los datos ingresados.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('users.cruduser.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
            <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" />
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
            <select name="role" id="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach (Spatie\Permission\Models\Role::all() as $role)
                    <option value="{{ $role->name }}" {{ ($user->hasRole($role->name)) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="division" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
            <select name="division_id" id="division" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach (App\Models\management\Division::all() as $division)
                    <option value="{{ $division->id }}" {{ ($user->division_id == $division->id) ? 'selected' : '' }}>{{ $division->name }}</option>
                @endforeach
            </select>
            @error('division_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col sm:flex-row items-center justify-between">
            <button type="submit" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4 sm:mb-0">
                Editar Usuario
            </button>
            <a  href="{{ route('users.cruduser.index')}}" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
        </div>
    </form>
</div>

@endsection