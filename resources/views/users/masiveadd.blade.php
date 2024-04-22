@extends('layouts.panel')

@section('titulo')
    Gestión Masiva De Usuarios
@endsection

@section('contenido')
    <div class="flex flex-col mt-10 justify-center items-center">
        <h1 class="text-2xl font-bold mb-4 uppercase">Gestión masiva de usuarios</h1>
        <div class="-m-1.5 overflow-x-auto items-center">
        <div class="px-1.5 flex justify-start w-full">

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="flex">
                    @csrf
                    <label for="user_file"
                        class="ml-2 mb-4 bg-[#03A696] text-white font-medium w-60 h-10 rounded-md flex justify-center items-center cursor-pointer"
                        id="subir">Subir excel de usuarios</label>
                    <input type="file" class="hidden" id="user_file" name="file" required>
                    <button type="submit"
                        class="ml-2 mb-4 bg-[#03A696] text-white font-medium px-2 h-10 rounded-md hidden justify-center items-center"
                        id="importar">Importar
                        Usuarios: </button>
            </form>

            <!-- Formulario de Selección -->
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="flex">
                    @csrf
                    <div class="relative flex ml-4 mr-40">
                        <div class="absolute">
                            <details class="overflow-hidden rounded border border-gray-200 [&_summary::-webkit-details-marker]:hidden w-full max-w-md">
                                <summary class="flex cursor-pointer items-center justify-between gap-2 bg-white py-2.5 px-6 text-gray-900 transition">
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
            </form>

             <!-- Formulario de búsqueda -->
             <div class="flex items-center ml-auto">
                    <span class="flex">
                        <input id="searchInput" class="search_divisions px-3 outline-none border-l-5" type="text" placeholder="Buscar...">
                        <button id="searchButton" class="search-btn" onclick="searchTable()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </span>
                 </div>
                  
                <script>
                    document.getElementById('user_file').addEventListener('change', function() {
                        if (this.files.length > 0) {
                            document.getElementById('importar').innerHTML = "Importar usuarios: " + this.files[0].name;
                            document.getElementById('subir').style.display = "none";
                            document.getElementById('importar').style.display = "flex";
                        } else {
                            console.log("No se ha seleccionado ningún archivo.");
                        }
                    });
                </script>

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

            </div>

            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden border-gray-300 bg-white">
                    <table class="divide-y divide-gray-700" id="dataTable">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    Correo electrónico
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    División
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    Rol
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    Acciones
                                    <!-- Intentionally left empty for layout -->
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">


                            @foreach ($users as $index => $user)
                                <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        {{ $user->name }}

                                    </td>
                                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ $user->email }}

                                    </td>
                                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ $user->division_name ?? 'Sin división' }}

                                    </td>
                                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-bold">
                                        <a href="{{ route('users.cruduser.edit', $user->id) }}" type="button"
                                            class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                            <i class='bx bx-edit-alt'></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');"
                                                class="ml-1 bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                                <i class='bx bx-trash'></i>
                                                Eliminar
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <h1 class="fondo text-center font-bold text-4xl py-4 text-black">Registro de usuarios</h1>

<a  href="{{ route('users.exportCsv')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white">Descargar Todos Los Usuarios</a>
<a  href="{{ route('users.exportTemplate')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white">Descargar Estudiantes</a>
<a  href="{{ route('users.exportTemplateUsers')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white">Descargar Usuarios</a>
<a  href="{{ route('users.store')}}" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white">Subir Excell</a>

<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="user_file" class="ml-8 p-2.5 bg-blue-gray-900 font-bold py-4 text-base">Archivo de Usuarios:</label>
    <input type="file" id="user_file" name="file" required>
    <button type="submit" class="Btn_divisions modal-button ml-8 p-2.5 bg-teal-500 text-white">Importar Usuarios</button>

</form>



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

@endsection --}}
