
@extends('layouts.panel')

@section('titulo', 'Agregar academia')

@section('contenido')
<div class="container">
    <a href="{{ route('academias.index') }}">
        <div class="flex items-center ml-11 mt-11 mb-5">
            <button type="button" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Regresar
            </button>
        </div>
    </a>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="border-b py-2 rounded mb-4">
            <h2 class="text-2xl text-center font-bold text-aqua-600">Agregar academia</h2>
        </div>
        <form method="POST" action="{{ route('academias.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la academia</label>
                <input id="name" type="text" placeholder="Nombre de la academia" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Carreras</label>
                @foreach($programs as $program)
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="programs[]" value="{{ $program->id }}" class="form-checkbox h-5 w-5 text-aqua-600"><span class="ml-2">{{ $program->name }}</span>
                </label>
                @endforeach
            </div>




            <div class="flex items-center justify-center">
                <button type="submit" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Agregar academia
                </button>
            </div>
        </form>
    </div>
</div>


@endsection
