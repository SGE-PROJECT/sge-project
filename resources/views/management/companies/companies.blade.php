@extends('layouts.panel')



@section('titulo', 'Empresas')

@section('contenido')
    {{-- tabla de empresas --}}
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 ml-5 uppercase">Empresas</h1>

        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center ml-5 pr-5">

            <!-- Formulario de búsqueda -->
            <div class="mb-4 flex flex-col md:flex-row items-start md:items-center mr-5">
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

            <!-- Detalles del filtro -->
            <div class="absolute mb-4 right-9">
                <details
                    class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden w-full max-w-md">
                    <summary
                        class="flex cursor-pointer items-center justify-between gap-2 bg-white py-2.5 px-4 text-gray-900 transition">
                        <span class="text-sm font-medium">Filtrar</span>
                        <span class="transition group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </summary>

                    <div class="border-t border-gray-200 bg-white">
                        <header class="flex items-center justify-between p-2">
                            <span class="text-sm text-gray-700">Ordenar por</span>
                            <button type="button"
                                class="text-sm text-gray-900 underline underline-offset-2">Borrar</button>
                        </header>

                        <ul class="space-y-1 border-t border-gray-200 p-2">
                            <li>
                                <label for="OrderByAlphabet" class="inline-flex items-center gap-2">
                                    <input type="radio" id="OrderByAlphabet" name="orderBy"
                                        class="size-5 rounded border-gray-300" />
                                    <span class="text-sm font-medium text-gray-700">Orden alfabético</span>
                                </label>
                            </li>
                            <li>
                                <label for="OrderByDate" class="inline-flex items-center gap-2">
                                    <input type="radio" id="OrderByDate" name="orderBy"
                                        class="size-5 rounded border-gray-300" />
                                    <span class="text-sm font-medium text-gray-700">Ordenar por fecha de afiliación</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </details>
            </div>

            @if (Auth::check() && Auth::user()->hasAnyRole(['Super Administrador']))
                <!-- Botón para agregar usuario -->
                <div class="mr-28 mb-4">
                    <a href="{{ route('empresas.create') }}"
                        class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">Agregar
                        Empresa</a>
                </div>
            @endif
        </div>
        @if (session('success'))
        <div id="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 ml-6 mr-4 mb-4 rounded relative" role="alert">
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
        @endif
        <h2 class="text-2xl font-bold mt-8 mb-8 ml-5 uppercase">Empresas Vinculadas</h2>

        <!-- Tabla de empresas -->
        <table id="empresaTable" class="project-table ">
            <thead>
                <tr>
                    <th>Logotipo</th>
                    <th>Empresa</th>
                    <th>Descripción</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Afiliación</th>
                    @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($companies->where('is_active', true) as $company)
                    <tr>
                        <td>
                            @if ($company->companiesImage)
                                <img src="{{ $company->companiesImage->image_path }}" alt="Logotipo"
                                    class="h-16 w-16 inline-block mr-2 rounded-full">
                            @else
                            @endif
                        </td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->description }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->contact_phone }}</td>
                        <td>{{ $company->contact_email }}</td>
                        <td>{{ $company->affiliation_date }}</td>
                        <td>
                            @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                                <div class="inline-flex">
                                    <a href="{{ route('empresas.edit', $company->id) }}"
                                        class="bg-[#03A696] hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 mb-2 ">Editar</a>
                                    <form action="{{ route('empresas.destroy', $company->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta empresa?')"
                                            class="bg-[#03A696] hover:bg-red-600 text-white py-2 px-4 rounded">Desactivar</button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2 class="text-2xl font-bold mt-8 mb-8 ml-5 uppercase">Empresas Inactivas</h2>
        <table id="empresaTable" class="project-table ">
            <thead>
                <tr>
                    <th>Logotipo</th>
                    <th>Empresa</th>
                    <th>Descripción</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Afiliación</th>
                    @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($companies->where('is_active', false) as $company)
                    <tr>
                        <td>
                            @if ($company->companiesImage)
                                <img src="{{ $company->companiesImage->image_path }}" alt="Logotipo"
                                    class="h-16 w-16 inline-block mr-2 rounded-full">
                            @else
                            @endif
                        </td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->description }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->contact_phone }}</td>
                        <td>{{ $company->contact_email }}</td>
                        <td>{{ $company->affiliation_date }}</td>
                        <td>
                            @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                                <div class="inline-flex">
                                    <form action="{{ route('empresas.activate', $company->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="bg-[#03A696] hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 mb-2">Activar</button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            var filter, table, tr, td, i, txtValue;
            filter = this.value.toUpperCase();
            table = document.getElementById("empresaTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Columna de nombre de empresa
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        });

        document.getElementById('OrderByAlphabet').addEventListener('click', function() {
            sortTable('empresaTable', 1);
        });

        document.getElementById('OrderByDate').addEventListener('click', function() {
            sortTable('empresaTable', 6);
        });

        function sortTable(tableId, columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById(tableId);
            switching = true;

            while (switching) {
                switching = false;
                rows = table.getElementsByTagName('tr');

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName('td')[columnIndex];
                    y = rows[i + 1].getElementsByTagName('td')[columnIndex];

                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
@endsection
