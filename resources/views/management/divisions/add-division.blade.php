@extends('layouts.panel')

@section('titulo', 'Divisiones')

@section('contenido')

<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <a href="{{ route('divisiones.index') }}">
        <div class="flex items-center ml-11 mt-11 mb-5">
            <button type="submit" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Regresar
            </button>
        </div>
    </a>
    <div class="max-w-md mx-auto mt-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4">
                <h2 class="text-2xl font-bold text-center text-aqua-600 mb-4">Agregar División</h2>
                <form action="{{ route('divisiones.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold">Nombre:</label>
                        <input type="text" name="name" id="name"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Ingrese el nombre de la división" required>

                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description"
                            class="block text-gray-700 text-sm font-bold">Descripción:</label>
                        <textarea name="description" id="description"
                            class="appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Ingrese la descripción de la división" rows="3"></textarea>
                        @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                        <input type="file" name="image" id="image"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            accept="image/*" required>
                        <div class="mt-2 flex flex-col items-center">
                            <p class="text-sm text-gray-600 mb-2">Previsualización</p>
                            <img id="imagePreview" class="w-40 h-auto rounded-lg" />
                        </div>
                    </div>
                    @error('image')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear
                            División</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
        }

        reader.readAsDataURL(file);
    });
</script>

@endsection
