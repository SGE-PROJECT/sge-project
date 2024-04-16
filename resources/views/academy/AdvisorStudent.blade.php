@extends('layouts.panelUsers')

@section('titulo', 'Carreras')

@section('contenido')

    <div class="max-w-lg mx-auto bg-white mt-8 rounded p-6">
        <h1 class="text-2xl font-bold mb-5">Agregar Usuario</h1>
        <form action="{{ route('asignar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Asignar asesorados:</label>
                <select name="advisor" id="role"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($advisors as $asesor)
                        <option value="{{ $asesor->id }}">{{ $asesor->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Ingrese los alumnos: (Se deben
                    escribir las matriculas separadas por comas)</label>
                <textarea type="text" name="students" id="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required></textarea>
            </div>
            <div class="flex gap-5 w-full">
                <a href="{{ route('users.cruduser.index') }}"
                    class="w-full bg-teal-500 hover:bg-teal-600 text-center text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Volver
                </a>
                <button type="submit"
                    class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Asignar Estudiantes
                </button>

            </div>
    </div>
    </form>
    </div>

@endsection
