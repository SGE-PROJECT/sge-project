@extends('layouts.panel')

@section('titulo', 'Divisiones')

@section('contenido')
    <div class="header_divisions">
        <h1 class="text-font_divisions font-bold">Divisiones:</h1>

        <span class="flex">
            <input id="searchInput" class="search_divisions px-3 outline-none border-l-5" type="text"
                placeholder="Buscar...">
            <button id="searchButton" class="search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </span>
    </div>

    @if (Auth::check() && Auth::user()->hasAnyRole(['Super Administrador']))
        <div class="ml-7 mb-8">
            <a href="{{ route('divisiones.create') }}"
                class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">Agregar
                División</a>
        </div>
    @endif

    <!-- Mostrar mensajes -->
    @if (session('success'))
        <div id="successMessage"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 ml-7 mr-4 mb-4 rounded relative"
            role="alert">
            <strong class="font-bold">Éxito:</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-3 py-3"
                onclick="this.parentElement.style.display='none';">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Cerrar</title>
                    <path
                        d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 5.354 4.646a.5.5 0 1 0-.708.708L9.293 10l-4.647 4.646a.5.5 0 1 0 .708.708L10 10.707l4.646 4.647a.5.5 0 0 0 .708-.708L10.707 10l4.647-4.646a.5.5 0 0 0 0-.708z" />
                </svg>
            </button>
        </div>
    @elseif(session('error'))
        <div id="errorMessage" class="mx-auto mb-8 max-w-md">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Divisiones Activas -->
    @php
        $activas = $divisions->where('isActive', true);
    @endphp
    @if ($activas->isNotEmpty())
        <hr class=" border-gray-300">
        <h2 class="text-lg font-bold text-gray-800 mb-2 uppercase ml-7">Activas:</h2>
        <div class="contenedor_divisions">
            @foreach ($divisions->where('isActive', true) as $division)
                <div class="card__division" data-name="{{ $division->name }}"
                    data-description="{{ $division->description }}">
                    <p class="Titulo">{{ $division->name }}</p>
                    @if ($division->divisionImage)
                        <img src="{{ asset($division->divisionImage->image_path) }}" alt="{{ $division->description }}">
                    @else
                        <img src="{{ asset('images/divisions/SinImagen.jpg') }}" alt="Imagen no disponible">
                    @endif
                    <div class="card__content">
                        <p class="card__title">{{ $division->name }}</p>
                        <p class="card__description">Descripción: {{ $division->description }}</p>
                        @if (isset($academicDirectors[$division->id]) && !$academicDirectors[$division->id]->isEmpty())
                            <p class="card__description">Presidente(s) Académico(s):</p>
                            @foreach ($academicDirectors[$division->id] as $academicDirector)
                                <p class="card__description2">{{ $academicDirector->user->name }}</p>
                            @endforeach
                        @else
                            <p class="card__description2">No hay presidente académico asignado</p>
                        @endif
                        <div class="inline-flex ">
                            <!-- <button class="bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600" >Ver más</button> -->
                            <form action="{{ route('divisiones.edit', $division->id) }}" method="GET">
                                <button
                                    class="bg-[#03A696] hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 mb-2">Editar</button>
                            </form>
                            <a href="{{ route('divisiones.destroy', $division->id) }}">
                                <form action="{{ route('divisiones.destroy', $division->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-[#03A696] hover:bg-red-600 text-white py-2 px-4 rounded">Desactivar</button>
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class=" border-gray-300">
            @endforeach
        </div>
    @endif

    <!-- Divisiones Inactivas -->
    @php
        $inactivas = $divisions->where('isActive', false);
    @endphp
    @if ($inactivas->isNotEmpty())
        <hr class=" border-gray-300">
        <h2 class="text-lg font-bold text-gray-800 mb-2 ml-7 uppercase">Inactivas:</h2>
        <div class="contenedor_divisions">
            @foreach ($divisions->where('isActive', false) as $division)
                <div class="card__division" data-name="{{ $division->name }}"
                    data-description="{{ $division->description }}">
                    <p class="Titulo">{{ $division->name }}</p>
                    @if ($division->divisionImage)
                        <img src="{{ asset($division->divisionImage->image_path) }}" alt="{{ $division->description }}">
                    @else
                        <img src="{{ asset('images/divisions/SinImagen.jpg') }}" alt="Imagen no disponible">
                    @endif
                    <div class="card__content">
                        <p class="card__title">{{ $division->name }}</p>
                        <p class="card__description">Descripción: {{ $division->description }}</p>
                        @if (isset($academicDirectors[$division->id]) && !$academicDirectors[$division->id]->isEmpty())
                            <p class="card__description">Presidente(s) Académico(s):</p>
                            @foreach ($academicDirectors[$division->id] as $academicDirector)
                                <p class="card__description2">{{ $academicDirector->user->name }}</p>
                            @endforeach
                        @else
                            <p class="card__description2">No hay presidente académico asignado</p>
                        @endif
                        <div class="inline-flex ">
                            <!-- <button class="bg-[#03A696] hover:bg-gray-200   rounded text-white mr-2 h-7 w-20" >Ver más</button> -->
                            <form action="{{ route('divisiones.activate', $division->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-[#03A696] hover:bg-green-500 text-white py-2 px-4  mr-2 rounded">Activar</button>
                            </form>
                            <a href="{{ route('divisiones.edit', $division->id) }}"><button
                                    class="bg-[#03A696] hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 mb-2">Editar</button></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4 border-gray-300">
            @endforeach
        </div>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            hideMessage('successMessage');
            hideMessage('errorMessage');
        });

        function hideMessage(elementId) {
            var element = document.getElementById(elementId);
            if (element) {
                setTimeout(function() {
                    element.style.display = "none";
                }, 3000);
            }
        }

        document.getElementById("searchButton").addEventListener("click", function() {
            var searchText = document.getElementById("searchInput").value.toLowerCase();
            var divisions = document.querySelectorAll(".card__division");

            divisions.forEach(function(division) {
                var name = division.getAttribute("data-name").toLowerCase();
                var description = division.getAttribute("data-description").toLowerCase();

                if (name.includes(searchText) || description.includes(searchText)) {
                    division.style.display = "block";
                } else {
                    division.style.display = "none";
                }
            });
        });
    </script>

@endsection
