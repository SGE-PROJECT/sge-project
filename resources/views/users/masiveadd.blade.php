@extends('layouts.panel')

@section('titulo')
    Gestión Masiva De Usuarios
@endsection

@section('contenido')
    <div class="flex flex-col  justify-center items-center">
        <h1 class="text-2xl font-bold mb-4 uppercase">Gestión masiva de usuarios</h1>
        <div class="  items-center">
            <div class=" flex justify-start w-full">
                <a href="{{ route('users.exportCsv') }}"
                    class="mb-4 bg-[#03A696] text-white font-medium w-60 h-10 rounded-md flex justify-center items-center">Descargar
                    todos los usuarios</a>
                <a href="{{ route('users.exportTemplate') }}"
                    class="ml-2 mb-4 bg-[#03A696] text-white font-medium w-60 h-10 rounded-md flex justify-center items-center">Descargar
                    plantilla estudiantes</a>
                <a href="{{ route('users.exportTemplateUsers') }}"
                    class="ml-2 mb-4 bg-[#03A696] text-white font-medium w-60 h-10 rounded-md flex justify-center items-center">Descargar
                    plantilla usuarios</a>


                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="flex">
                    @csrf
                    <label for="user_file"
                        class="ml-2 mb-4 bg-[#03A696] text-white font-medium w-60 h-10 rounded-md flex justify-center items-center"
                        id="subir">Subir excel de usuarios</label>
                    <input type="file" class="hidden" id="user_file" name="file" required>
                    <button type="submit"
                        class="ml-2 mb-4 bg-[#03A696] text-white font-medium px-2 h-10 rounded-md hidden justify-center items-center"
                        id="importar">Importar
                        Usuarios: </button>
                </form>
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



            </div>

            <div class=" mx-5 inline-block align-middle">
                <div class="rounded-lg overflow-hidden border-gray-300 bg-white">
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
                                    <td class="text-center px-6 py-4 text-sm font-medium text-black">
                                        {{ $user->name }}

                                    </td>
                                    <td class="text-center px-6 py-4  text-sm text-black">
                                        {{ $user->email }}

                                    </td>
                                    <td class="text-center px-6 py-4 text-sm text-black">
                                        {{ $user->division_name ?? 'Sin división' }}

                                    </td>
                                    <td class="text-center px-6 py-4  text-sm text-black">
                                        {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}
                                    </td>
                                    <td class="px-6 py-4  text-end text-sm font-bold flex">
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





<div class="tabla-project rounded-t-lg">
    <div class="tabla-cont-project rounded-t-lg">
        <table class="rounded-lg">
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
                        <a href="{{ route('users.cruduser.edit', $user->id) }}" class="modal-button bg-teal-500 text-white font-bold py-2 px-4 mb-2 sm:mb-0 md:mb-2 lg:mb-0">Editar</a>
                        <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="modal-button bg-teal-500 text-white font-bold py-2 px-4 mb-2 sm:mb-0 md:mb-2 lg:mb-0 hover:underline" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
