@extends('layouts.panel')

@section('titulo', 'Divisiones')

@section('contenido')
    <!-- Container First -->
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
    <div class="BtnCrearDivisions">
        <a href="{{ route('divisiones.create') }}"
            class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">Agregar División</a>
    </div>

    <!-- Container of Rows for Six -->
    <div class="contenedor_divisions">
        @foreach ($divisions as $division)
            <div class="card__division" data-name="{{ $division->name }}" data-description="{{ $division->description }}">
                <p class="Titulo">{{ $division->name }}</p>
                @if ($division->divisionImage)
                    <img src="{{ asset($division->divisionImage->image_path) }}" alt="{{ $division->description }}">
                @else
                    <img src="{{ asset('images/divisions/SinImagen.jpg') }}" alt="Imagen no disponible">
                @endif
                <div class="card__content">
                    <p class="card__title">{{ $division->name }}</p>
                    <p class="card__description">{{ $division->description }}</p>
                    <button class="bg-gray-200 p-1 mb-1 rounded-sm" >Ver más</button>
                    <form action="{{ route('divisiones.destroy', $division->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white p-1 rounded-sm mb-2 ">Eliminar</button>
                    </form>
                    <a href="{{ route('divisiones.edit', $division->id) }}" class="bg-blue-500 text-white p-1 rounded-sm px-3" >Editar</a>
                </div>
            </div>
        @endforeach
    </div>

    <script>
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
