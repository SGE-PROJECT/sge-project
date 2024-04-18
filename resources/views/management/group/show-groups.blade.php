@extends('layouts.panel')

@section('titulo')
    Todos los grupos
@endsection

@section('contenido')
    <div class="flex flex-col mt-4 justify-center items-center">
        <h1 class="text-2xl font-bold mb-2 uppercase">Grupos</h1>

        <div class="px-5 flex w-full">
            <a href="{{ route('grupos.create') }}" class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear Grupo</a>

            <div class="mb-4 flex flex-col md:flex-row items-start md:items-center rounded-md ml-auto mr-3">
                <span class="flex">
                    <input id="searchInput" class="search_divisions px-3 outline-none border-l-5 rounded-md" type="text"
                        placeholder="Buscar Grupo...">
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
    </div>
        @php
            $activas = $groups->where('IsActive', false)
        @endphp
        @if ($activas->isNotEmpty())
        <h2 class="text-lg font-bold text-gray-800 mt-5 mb-2 uppercase ml-5">Grupos Activos:</h2>
            <table id="activeGroupsTable" class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table">
                <thead class="bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            División
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            Carrera
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            Acciones
                            <!-- Intentionally left empty for layout -->
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($groups as $index => $group)
                        @if (!$group->IsActive)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                    {{ $group->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    {{ $group->program->division->name ?? 'Sin división'}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    {{ $group->program->name ?? 'Sin programa'}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-bold">
                                    <div class="inline-flex">
                                        <a href="{{ route('grupos.edit', $group->id) }}"
                                            class="mr-2 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                            <i class='bx bx-edit-alt'></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('grupos.destroy', $group->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este grupo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                                <i class='bx bx-trash'></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif

        @php
            $activas = $groups->where('IsActive', true)
        @endphp
        @if ($activas->isNotEmpty())
        <h2 class="text-lg font-bold text-gray-800 mt-5 mb-2 uppercase ml-5">Grupos Inactivos:</h2>
            <table id="inactiveGroupsTable" class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table">
                <thead class="bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            División
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            Carrera
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                            Acciones
                            <!-- Intentionally left empty for layout -->
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($groups as $index => $group)
                        @if ($group->IsActive)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                    {{ $group->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    {{ $group->program->division->name ?? 'Sin división'}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    {{ $group->program->name ?? 'Sin programa'}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-bold">
                                    <div class="inline-flex">
                                        <a href="{{ route('grupos.edit', $group->id) }}"
                                            class="mr-2 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                            <i class='bx bx-edit-alt'></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('grupos.destroy', $group->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este grupo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                                <i class='bx bx-trash'></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@section('scripts')
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

            // Buscar en la tabla de grupos activos
            var activeRows = document.querySelectorAll("#activeGroupsTable tbody tr");
            activeRows.forEach(function(row) {
                var name = row.cells[0].textContent.trim().toLowerCase();
                if (name.includes(searchText)) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });

            // Buscar en la tabla de grupos inactivos
            var inactiveRows = document.querySelectorAll("#inactiveGroupsTable tbody tr");
            inactiveRows.forEach(function(row) {
                var name = row.cells[0].textContent.trim().toLowerCase();
                if (name.includes(searchText)) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
@endsection
