@extends('layouts.panel')

@section('titulo')
    Crear grupo
@endsection

@section('contenido')

<div class="max-w-lg mx-auto bg-white mt-8 rounded p-6">
    <h1 class="text-2xl font-bold mb-5 flex justify-center text-gray-700">Crear grupo</h1>

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

    <form action="{{ route('grupos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <input type="text" name="description" id="description" value="{{ old('description') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
        </div>

        <div id="divisionField" class="mb-4">
            <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
            <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="fetchPrograms()">
                <option value="">Seleccione una división</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="programField" class="mb-4">
            <label for="program_id" class="block text-gray-700 text-sm font-bold mb-2">Carrera:</label>
            <select name="program_id" id="program_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                <option value="">Seleccione una carrera</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="four-month-period" class="block text-gray-700 text-sm font-bold mb-2">Cuatrimestre:</label>
            <select name="four-month-period" id="four-month-period" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="" disabled selected>Seleccione un cuatrimestre</option>
                <option value="5" {{ old('four-month-period') == '5' ? 'selected' : '' }}>Quinto</option>
                <option value="6" {{ old('four-month-period') == '6' ? 'selected' : '' }}>Sexto</option>
            </select>
        </div>
        

        <div class="flex flex-col sm:flex-row items-center justify-center">
            <button type="submit" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Crear grupo
            </button>
        </div>
    </form>
</div>

<script>
    function fetchPrograms() {
        const divisionId = document.getElementById('division_id').value;
        const programSelect = document.getElementById('program_id');
        programSelect.disabled = true; // Disable the select
        if (divisionId) {
            fetch(`/grupos/programs/${divisionId}`)
                .then(response => response.json())
                .then(data => {
                    programSelect.innerHTML = '<option value="">Seleccione una carrera</option>'; // Clear existing options
                    if (data.length) {
                        data.forEach(program => {
                            const option = new Option(program.name, program.id);
                            programSelect.add(option);
                        });
                        programSelect.disabled = false; // Enable the select
                    } else {
                        programSelect.add(new Option('No hay carreras disponibles', ''));
                    }
                })
                .catch(error => {
                    console.error('Error loading the programs:', error);
                    programSelect.add(new Option('Error al cargar las carreras', ''));
                });
        }
    }
    </script>    

@endsection