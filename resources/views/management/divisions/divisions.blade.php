@extends('layouts.panel')

@section('titulo', 'Divisiones')

@section('contenido')
    <div class="">
        <h1 class="mt-4 text-center text-font_divisions font-bold">Divisiones:</h1>

        <div class="px-5 flex w-full">
            <a href="{{ route('divisiones.create') }}"
                class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear
                División</a>

                <div class="mb-4 flex flex-col md:flex-row items-start md:items-center rounded-md ml-auto mr-3">
                    <span class="flex">
                        <input id="searchInput" class="search_divisions px-3 outline-none border-l-5 rounded-md" type="text"
                            placeholder="Buscar División...">
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

        <!-- Mostrar mensajes -->
        @if (session('success'))
            <div id="successMessage"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 ml-5 mr-7 mb-4 rounded relative"
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
            <h2 class="text-lg font-bold text-gray-800 mt-5 mb-2 uppercase ml-5">Divisiones Activas:</h2>
            <table id="empresaTable"
                class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table ">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">IMAGEN</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Division
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Descripción
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Presidente(s)
                            Academico(s)</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Director(a)
                        </th>
                        @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Acciones
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisions->where('isActive', true) as $division)
                        <tr>
                            <td>
                                @if ($division->divisionImage)
                                    <img src="{{ asset($division->divisionImage->image_path) }}"
                                        alt="{{ $division->description }}" class="h-10 w-10 inline-block mr-2 rounded-full">
                                @else
                                    <img src="{{ asset('images/divisions/SinImagen.jpg') }}" alt="Imagen no disponible"
                                        class="h-10 w-10 inline-block mr-2 rounded-full">
                                @endif
                            </td>
                            <td class="py-4 text-sm text-black">{{ $division->name }}</td>
                            <td class="py-4 text-sm text-black">{{ $division->description }}</td>
                            <td class="py-4 text-sm text-black">
                                @if (isset($academicDirectors[$division->id]) && !$academicDirectors[$division->id]->isEmpty())
                                    @foreach ($academicDirectors[$division->id] as $academicDirector)
                                        {{ $academicDirector->user->name }}
                                        <br>
                                    @endforeach
                                @else
                                    No hay presidente académico asignado
                                @endif
                            </td>
                            <td class="py-4 text-sm text-black">
                                @if (isset($managementAdmin[$division->id]) && !$managementAdmin[$division->id]->isEmpty())
                                    @foreach ($managementAdmin[$division->id] as $admin)
                                        {{ $admin->user->name }}
                                        <br>
                                    @endforeach
                                @else
                                    No hay director de división asignado
                                @endif
                            </td>
                            <td class="py-4 text-sm text-black">
                                @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                                    <div class="inline-flex">
                                        <a href="{{ route('divisiones.edit', $division->id) }}"
                                            class="mr-2 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none mb-2">
                                            <i class='bx bx-edit-alt'></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('divisiones.destroy', $division->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('¿Estás seguro de que deseas desactivar esta división?')"
                                                class="bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none mr-2 mb-2">
                                                <i class='bx bx-trash'></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif


        <!-- Divisiones Inactivas -->
        @php
            $activas = $divisions->where('isActive', false);
        @endphp
        @if ($activas->isNotEmpty())
            <h2 class="text-lg font-bold text-gray-800 mt-8 mb-2 uppercase ml-5">Divisiones Desactivadas:</h2>
            <table id="empresaTable"
                class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table ">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">IMAGEN
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Division
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            Descripción</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Presidente(s)
                            Academico(s)</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Director(a)
                        </th>
                        @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisions->where('isActive', false) as $division)
                        <tr>
                            <td>
                                @if ($division->divisionImage)
                                    <img src="{{ asset($division->divisionImage->image_path) }}"
                                        alt="{{ $division->description }}"
                                        class="h-10 w-10 inline-block mr-2 rounded-full">
                                @else
                                    <img src="{{ asset('images/divisions/SinImagen.jpg') }}" alt="Imagen no disponible"
                                        class="h-10 w-10 inline-block mr-2 rounded-full">
                                @endif
                            </td>
                            <td class="py-4 text-sm text-black">{{ $division->name }}</td>
                            <td class="py-4 text-sm text-black">{{ $division->description }}</td>
                            <td class="py-4 text-sm text-black">
                                @if (isset($academicDirectors[$division->id]) && !$academicDirectors[$division->id]->isEmpty())
                                    @foreach ($academicDirectors[$division->id] as $academicDirector)
                                        {{ $academicDirector->user->name }}
                                        <br>
                                    @endforeach
                                @else
                                    No hay presidente académico asignado
                                @endif
                            </td>
                            <td class="py-4 text-sm text-black">
                                @if (isset($managementAdmin[$division->id]) && !$managementAdmin[$division->id]->isEmpty())
                                    @foreach ($managementAdmin[$division->id] as $admin)
                                        {{ $admin->user->name }}
                                        <br>
                                    @endforeach
                                @else
                                    No hay director de división asignado
                                @endif
                            </td>
                            <td class="py-4 text-sm text-black">
                                @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                                    <div class="inline-flex">
                                        <form action="{{ route('divisiones.activate', $division->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-[#03A696] hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none mr-2 mb-2 ">
                                                <i class='bx bx-up-arrow'></i>
                                                Activar
                                            </button>

                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                var searchText = document.getElementById("searchInput").value.trim().toLowerCase();
                var rows = document.querySelectorAll("#empresaTable tbody tr");

                rows.forEach(function(row) {
                    var name = row.cells[1].textContent.trim().toLowerCase();
                    var description = row.cells[2].textContent.trim().toLowerCase();

                    if (name.includes(searchText) || description.includes(searchText)) {
                        row.style.display = "table-row";
                    } else {
                        row.style.display = "none";
                    }
                });
            });
        </script>

    @endsection
