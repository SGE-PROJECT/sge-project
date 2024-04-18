
@extends('layouts.panel')

@section('titulo', 'Agregar academia')

@section('contenido')
<div class="container">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-28">
        <div class="border-b py-2 rounded mb-4">
            <h2 class="text-2xl text-center font-bold text-aqua-600">Editar academia</h2>
        </div>
        <form method="POST" action="{{ route('academias.update', $academy->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Agrega un campo oculto para indicar que se está enviando un método PUT -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la academia</label>
                <input id="name" type="text" placeholder="Nombre de la academia" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" value="{{ $academy->name }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Programas Asociados</label>
                @foreach($associatedPrograms as $program)
                    <label class="inline-flex items-center mt-2">
                        <input type="checkbox" name="programs[]" value="{{ $program->id }}" class="form-checkbox h-5 w-5 text-aqua-600" checked>
                        <span class="ml-2">{{ $program->name }}</span>
                    </label>
                @endforeach
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Programas Disponibles</label>
                @foreach($availablePrograms as $program)
                    <label class="inline-flex items-center mt-2">
                        <input type="checkbox" name="programs[]" value="{{ $program->id }}" class="form-checkbox h-5 w-5 text-aqua-600">
                        <span class="ml-2">{{ $program->name }}</span>
                    </label>
                @endforeach
            </div>


            <div class="flex items-center justify-center">
                <button type="submit" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
