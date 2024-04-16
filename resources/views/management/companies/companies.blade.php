@extends('layouts.panel')



@section('titulo', 'Empresas')

@section('contenido')
    {{-- tabla de empresas --}}
    <div class="flex flex-col mt-10 justify-center items-center">

        <h1 class="text-2xl font-bold mb-4 uppercase">Empresas afiliadas</h1>


        <div class="px-5 flex w-full">
            <a href="{{ route('empresas.create') }}" class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear Empresa</a>

            <div class="mb-4 flex flex-col md:flex-row items-start md:items-center rounded-md ml-auto mr-5">
                <span class="flex">
                    <input id="searchInput" class="search_divisions px-3 outline-none border-l-5 rounded-md" type="text"
                        placeholder="Buscar Empresa...">
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

        @if (session('success'))
            <div id="successMessage"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 ml-6 mr-4 mb-4 rounded relative"
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
        @endif

        <!-- Tabla de empresas -->
        <table id="empresaTable" class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table ">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Logotipo</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Empresa</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Descripción</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Dirección</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Teléfono</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Correo Electrónico</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Fecha de Afiliación</th>
                    @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($companies->where('is_active', true) as $company)
                    <tr>
                        <td>
                            @if ($company->companiesImage)
                                <img src="{{ $company->companiesImage->image_path }}" alt="Logotipo"
                                    class="h-10 w-10 inline-block mr-2 rounded-full">
                            @else
                            @endif
                        </td>
                        <td class="py-4 text-sm text-black">{{ $company->company_name }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->description }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->address }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->contact_phone }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->contact_email }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->affiliation_date }}</td>
                        <td class="py-4 text-sm text-black">
                            @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                                <div class="inline-flex">
                                    <a href="{{ route('empresas.edit', $company->id) }}"
                                        class="mr-2 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none mb-2">
                                        <i class='bx bx-edit-alt'></i>
                                        Editar
                                    </a>

                                    <form action="{{ route('empresas.destroy', $company->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta empresa?')"
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
        <h2 class="text-2xl font-bold mt-8 mb-8 ml-5 uppercase">Empresas Inactivas</h2>
        <table id="empresaTable" class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table ">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Logotipo</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Empresa</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Descripción</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Dirección</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Teléfono</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Correo Electrónico</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Fecha de Afiliación</th>
                    @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($companies->where('is_active', false) as $company)
                    <tr>
                        <td>
                            @if ($company->companiesImage)
                                <img src="{{ $company->companiesImage->image_path }}" alt="Logotipo"
                                    class="h-10 w-10 inline-block mr-2 rounded-full">
                            @else
                            @endif
                        </td>
                        <td class="py-4 text-sm text-black">{{ $company->company_name }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->description }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->address }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->contact_phone }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->contact_email }}</td>
                        <td class="py-4 text-sm text-black">{{ $company->affiliation_date }}</td>
                        <td class="py-4 text-sm text-black">
                            @if (Auth::check() && Auth::user()->hasRole('Super Administrador'))
                                <div class="inline-flex">
                                    <form action="{{ route('empresas.activate', $company->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
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
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            var filter, table, tr, td, i, txtValue;
            filter = document.getElementById('searchInput').value.toUpperCase();
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

