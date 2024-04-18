@extends('layouts.panel')

@section('titulo')
    Gestión De Usuarios
@endsection


@section('contenido')
    <div class="flex flex-col mt-10 justify-center items-center">
        <h1 class="text-2xl font-bold mb-2 uppercase">Usuarios</h1>

        <div class="-m-1.5 overflow-x-auto items-center">
            <div class="px-1.5 flex justify-start w-full">
                <a href="{{ route('users.cruduser.create') }}"
                    class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear
                    usuario</a>
                <a href="{{ route('users.masiveadd.index') }}"
                    class="ml-2 mb-4 bg-[#03A696] text-white font-medium w-72 h-10 rounded-md flex justify-center items-center">Crear
                    usuarios masivamente</a>

            </div>

            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden border-gray-300 bg-white">
                    <table class="divide-y divide-gray-700">
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
@vite('resources/css/users/cruduser.css')

<h1 class="fondo text-center font-bold pt-10 pb-12">Lista de Usuarios</h1>

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

    <a  href="{{ route('users.cruduser.create')}}" class="bg-teal-500 text-white px-2 py-1 hover:bg-teal-600 transition-colors font-bold py-2 px-4 focus:outline-none focus:shadow-outline mb-2 mr-4 sm:mb-0 sm:mr-0 md:mr-2 lg:mr-2 ml-4">Agregar usuario </a>
    <a  href="{{ route('users.masiveadd.index')}}" class="bg-teal-500 text-white px-2 py-1 hover:bg-teal-600 transition-colors font-bold py-2 px-4 focus:outline-none focus:shadow-outline mb-2 mr-8 sm:mb-0 md:mb-0 lg:mb-2 ml-2">Agregar usuarios </a>
</div>


<div class="tabla-project rounded-t-lg">
    <div class="tabla-cont-project rounded-t-lg">
        <table class="rounded-lg bg-gray-50" id="dataTable">
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
