@extends('layouts.panel')

@section('titulo')
Gestión Masiva De Usuarios
@endsection

@section('contenido')
@vite('resources/css/users/masiveadd.css')
<h1 class="fondo text-center font-bold text-4xl py-4 text-black">Registro de usuarios</h1>

<div class="btn-container flex justify-between items-start mb-2">
    <!-- Formulario de búsqueda -->
    <div class="flex flex-col md:flex-row items-start md:items-center ml-8 mr-auto">
        <span class="flex">
            <input id="searchInput" class="search_divisions px-3 outline-none border-l-5" type="text" placeholder="Buscar...">
            <button id="searchButton" class="search-btn" onclick="searchTable()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </span>
    </div>
</div>

<div class="btn-container flex justify-between items-start ml-2 mr-8">
    <!-- Archivo de usuarios -->
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="mr-auto">
        @csrf
        <label for="user_file" class="ml-4 mr-2 p-2.5 bg-blue-gray-900 font-bold py-4 text-base">Archivo de Usuarios:</label>
        <input type="file" id="user_file" name="file" required>
    </form>

    <div class="btn-container flex justify-between items-start mb-2">
    <!-- Detalles de la selección -->
    <div class="relative flex ml-4 mr-40">
    <div class="absolute">
        <details class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden w-full max-w-md">
            <summary class="flex cursor-pointer items-center justify-between gap-2 bg-white py-2.5 px-4 text-gray-900 transition">
                <span class="text-sm font-medium ml-auto mr-2">Seleccionar</span>
                <span class="transition group-open:-rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </summary>

            <div class="border-t border-gray-100 bg-white">
                <header class="flex items-center justify-between p-2">
                    <span class="text-sm text-gray-700">Descargar</span>
                </header>

                <ul class="divide-y divide-gray-200">
                    <li>
                        <a href="{{ route('users.exportCsv')}}" class="block py-3 px-4 text-sm text-gray-900 hover:bg-gray-100 transition duration-200">Todos Los Usuarios</a>
                    </li>
                    <li>
                        <a href="{{ route('users.exportTemplate')}}" class="block py-3 px-4 text-sm text-gray-900 hover:bg-gray-100 transition duration-200">Solo los Estudiantes</a>
                    </li>
                    <li>
                        <a href="{{ route('users.exportTemplateUsers')}}" class="block py-3 px-4 text-sm text-gray-900 hover:bg-gray-100 transition duration-200">Solo los Usuarios</a>
                    </li>
                </ul>
            </div>
        </details>
    </div>
</div>

      <!-- Botones -->
      <div class="ml-auto">
        <a href="{{ route('users.store')}}" class="Btn_divisions modal-button p-2.5 bg-teal-500 text-white hover:bg-teal-600">Subir Excel</a>
        <button type="submit" class="Btn_divisions modal-button p-2.5 bg-teal-500 text-white hover:bg-teal-600">Importar Usuarios</button>
    </div>
</div>
</div>

<div class="tabla-project rounded-t-lg">
    <div class="tabla-cont-project rounded-t-lg">
        <table class="rounded-lg" id="dataTable">
            <thead>
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nombre
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        División
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Roles
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr >
                    <td class="py-4 px-6">
                        {{ $user->name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $user->email }}
                    </td>
                    <td class="py-4 px-6">
                        {{$user->division_name ?? 'Sin división'}}
                    </td>
                    <td class="py-4 px-6">
                        {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('users.cruduser.edit', $user->id) }}" class="modal-button bg-[#03A696] hover:bg-blue-600 text-white font-bold py-2 px-4 my-2 mb-2 sm:mb-0 md:mb-2 lg:mb-0  focus:outline-none focus:shadow-outline">Editar</a>                                                                                                     
                        <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="modal-button bg-[#03A696] hover:bg-red-600 text-white font-bold py-2 px-4 my-2 mb-2 sm:mb-0 md:mb-2 lg:mb-0 focus:outline-none focus:shadow-outline hover:underline" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</button>                                                                    
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
        
    </div>
</div>

<script>
    function searchTable() {
        // Obtener el valor del input de búsqueda
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        // Iterar sobre todas las filas y ocultar las que no coincidan con la búsqueda
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

@endsection