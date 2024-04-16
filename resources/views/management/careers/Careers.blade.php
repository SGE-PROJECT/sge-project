@extends('layouts.panel')

@section('titulo', 'Carreras')

@section('contenido')
    <div class="flex flex-col mt-10 justify-center items-center">
        <h1 class="text-2xl font-bold mb-2 uppercase">Carreras</h1>

        <div class="-m-1.5 overflow-x-auto">
            <div class="px-1.5 flex justify-start w-full">
                <a href="{{ route('carreras.create') }}"
                    class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear
                    carrera</a>
                <div class="mb-4 flex flex-col md:flex-row items-start md:items-center rounded-md ml-auto ">
                    <span class="flex">
                        <input id="searchInput" class="search_divisions px-3 outline-none border-l-5 rounded-md"
                            type="text" placeholder="Buscar Carreras...">
                        <button id="searchButton" class="search-btn mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                                stroke="currentColor" class="w-6 h-5 rounded-md">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>

                    </span>
                </div>
            </div>

            @php
                $activas = $programs->where('isActive', true);
            @endphp
            @if ($activas->isNotEmpty())
                <h2 class="text-2xl font-bold mt-8 ml-2 uppercase">Carreras Activas:</h2>
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden border-gray-300 bg-white">
                        <table id="empresaTable" class="w-11/12 divide-y divide-gray-700">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                        Imagen
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                        División
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                        Acciones
                                        <!-- Intentionally left empty for layout -->
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">

                                @foreach ($programs as $index => $program)
                                    @if ($program->isActive)
                                        <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                                @if ($program->programImage)
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset($program->programImage->image_path) }}"
                                                        alt="Imagen de la carrera">
                                                @else
                                                    <span>Sin imagen</span>
                                                @endif
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                                {{ $program->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                                {{ $program->division->name }}
                                            </td>

                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-end text-sm font-bold flex items-center">
                                                <a href="{{ route('carreras.edit', $program->id) }}"
                                                    class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                                    <i class='bx bx-edit-alt'></i>
                                                    Editar
                                                </a>

                                                <form action="{{ route('carreras.destroy', $program->id) }}" method="POST"
                                                    class="ml-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta carrera?')"
                                                        class="bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                                        <i class='bx bx-trash'></i>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>

                    </div>
            @endif

            @php
                $activas = $programs->where('isActive', false);
            @endphp

            @if ($activas->isNotEmpty())
                <h2 class="text-2xl font-bold mt-8 uppercase">Carreras Inactivas:</h2>
                <div class="border rounded-lg overflow-hidden border-gray-300 bg-white">
                    <table class="w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col" class="px-2 py-1 text-center text-xs font-bold text-white uppercase">
                                    Imagen
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    División
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    Acciones
                                    <!-- Intentionally left empty for layout -->
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach ($programs as $index => $program)
                                @if (!$program->isActive)
                                    <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                            @if ($program->programImage)
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ asset($program->programImage->image_path) }}"
                                                    alt="Imagen de la carrera">
                                            @else
                                                <span>Sin imagen</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-black">
                                            {{ $program->name }}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-black">
                                            {{ $program->division->name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-center whitespace-nowrap text-sm font-bold flex items-center justify-center">
                                            @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                                                <div class="inline-flex">
                                                    <form action="{{ route('carreras.activate', $program->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="bg-[#03A696] hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none mr-2 mb-2">
                                                            <i class='bx bx-up-arrow'></i>
                                                            Activar
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
        </div>
    </div>
    </div>
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
            var searchText = document.getElementById("searchInput").value.trim().toLowerCase();
            var rows = document.querySelectorAll("#empresaTable tbody tr");

            rows.forEach(function(row) {
                var name = row.cells[1].textContent.trim().toLowerCase();
                var division = row.cells[2].textContent.trim().toLowerCase();

                if (name.includes(searchText) || division.includes(searchText)) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>

@endsection
