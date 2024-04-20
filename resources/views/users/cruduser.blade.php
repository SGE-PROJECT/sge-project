@extends('layouts.panel')

@section('titulo')
    Gestión De Usuarios
@endsection

@section('contenido')
    <div class="flex mt-10 ">
        <!-- Contenido Principal -->
        <div class="flex-1 mx-6">
            <h1 class="text-2xl font-bold mb-2 uppercase">Usuarios</h1>

            <div class="px-1.5 flex justify-start">
                <a href="{{ route('users.cruduser.create') }}" class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear usuario</a>
                <a href="{{ route('users.masiveadd.index') }}" class="ml-2 mb-4 bg-[#03A696] text-white font-medium w-72 h-10 rounded-md flex justify-center items-center">Crear usuarios masivamente</a>
            </div>

            <div class="max-w-full  flex ">
                <table class="  ">
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
                            <th scope="col" class="px-6 py-3 text-center text-xs   font-bold text-white uppercase">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($users as $index => $user)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="text-center px-6 py-4  text-sm font-medium text-black">
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
                                <td class="px-6 py-4 text-end text-sm font-bold flex">
                                    <a href="{{ route('users.cruduser.edit', $user->id) }}" type="button" class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                        <i class='bx bx-edit-alt'></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('users.cruduser.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');" class="ml-1 bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
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
@endsection
