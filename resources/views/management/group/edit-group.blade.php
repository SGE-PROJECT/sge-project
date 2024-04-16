@extends('layouts.panel')

@section('titulo')
    Editar grupo
@endsection

@section('contenido')
<div class="max-w-lg mx-auto bg-white mt-8 rounded p-6">
    <h1 class="text-2xl font-bold mb-5 flex justify-center text-gray-700">Editar grupo</h1>
    @include('partials.errors')  <!-- Reutiliza el componente de errores si ya existe -->

    <form action="{{ route('grupos.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $group->name) }}" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <input type="text" name="description" id="description" value="{{ old('description', $group->description) }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
            <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="fetchPrograms()">
                <option value="">Seleccione una división</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" {{ $division->id == $group->program->division_id ? 'selected' : '' }}>{{ $division->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="program_id" class="block text-gray-700 text-sm font-bold mb-2">Carrera:</label>
            <select name="program_id" id="program_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}" {{ $program->id == $group->program_id ? 'selected' : '' }}>{{ $program->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center">
            <button type="submit" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Actualizar grupo
            </button>
        </div>
    </form>
</div>

<script>
    function fetchPrograms() {
        let divisionId = document.getElementById('division_id').value;
        let programSelect = document.getElementById('program_id');
        programSelect.disabled = true;  // Disable the select
        if (divisionId) {
            fetch(`/grupos/programs/${divisionId}`)
                .then(response => response.json())
                .then(data => {
                    programSelect.innerHTML = '';  // Clear existing options
                    if (data.length) {
                        data.forEach(program => {
                            let option = new Option(program.name, program.id, program.id == {{ $group->program_id }});
                            programSelect.add(option);
                        });
                        programSelect.disabled = false;  // Enable the select
                    } else {
                        programSelect.add(new Option('No hay carreras disponibles', ''));
                    }
                })
                .catch(error => console.error('Error loading the programs:', error));
        }
    }
</script>
@endsection
