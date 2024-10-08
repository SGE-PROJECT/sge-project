@extends('layouts.panelUsers')

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
        </div>

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
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
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
