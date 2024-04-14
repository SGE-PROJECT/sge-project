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

    <form action="{{ route('users.cruduser.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
        </div>

        <div id="divisionField" class="mb-4">
            <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
            <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="unlockNextSelect('program_id')">
                <option value="">Seleccione una división</option>
                <option value="A">A</option>

            </select>
        </div>

        <div id="programField" class="mb-4">
            <label for="program_id" class="block text-gray-700 text-sm font-bold mb-2">Carrera:</label>
            <select name="program_id" id="program_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled onchange="unlockNextSelect('quarter_id')">
                <option value="">Seleccione una carrera</option>
                <option value="B">B</option>

                <!-- Añadir opciones aquí -->
            </select>
        </div>

        <div id="quarterField" class="mb-4">
            <label for="quarter_id" class="block text-gray-700 text-sm font-bold mb-2">Cuatrimestre:</label>
            <select name="quarter_id" id="quarter_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                <option value="">Seleccione un cuatrimestre</option>
                <option value="C">C</option>

                <!-- Añadir opciones aquí -->
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
function unlockNextSelect(nextSelectId) {
    const nextSelect = document.getElementById(nextSelectId);
    nextSelect.disabled = false; // Enable the next select element
}

document.getElementById('division_id').addEventListener('change', function() {
    if (this.value !== "") {
        unlockNextSelect('program_id');
    } else {
        document.getElementById('program_id').disabled = true;
        document.getElementById('quarter_id').disabled = true;
    }
});

document.getElementById('program_id').addEventListener('change', function() {
    if (this.value !== "") {
        unlockNextSelect('quarter_id');
    } else {
        document.getElementById('quarter_id').disabled = true;
    }
});
</script>
@endsection
