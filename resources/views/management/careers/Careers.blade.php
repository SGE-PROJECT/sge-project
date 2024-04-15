@extends('layouts.panel')

@section('titulo', 'Carreras')

@section('contenido')
<div class="flex flex-col mt-10 justify-center items-center">
    <h1 class="text-2xl font-bold mb-2 uppercase">Carreras</h1>

    <div class="-m-1.5 overflow-x-auto">
        <div class="px-1.5 flex justify-start w-full">
            <a href="{{ route('carreras.create') }}" class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear carrera</a>
        </div>


        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg overflow-hidden border-gray-300 bg-white">
                <table class="w-11/12 divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                Imagen
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                División
                            </th>

                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                Acciones
                                <!-- Intentionally left empty for layout -->
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">

                        @foreach ($programs as $index => $program)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                    <img class="w-10 h-10 rounded-full" src={{ asset($program->programImage->image_path) }} alt="Sin imagen">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    {{ $program->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    {{ $program->division->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-bold flex items-center">
                                    <a href="{{ route('carreras.edit', $program->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                        <i class='bx bx-edit-alt'></i>
                                        Editar
                                    </a>

                                    <form action="{{ route('carreras.destroy', $program->id) }}" method="POST" class="ml-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta carrera?')"
                                            class="bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
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




    {{-- @if (Auth::check() && Auth::user()->hasAnyRole(['Super Administrador']))
        <div class="ml-7 mb-8">
            <a href="{{ route('carreras.create') }}"
                class="bg-teal-500 text-white mt-8 px-6 py-2 rounded hover:bg-teal-600 transition-colors">Agregar
                Carrera</a>
        </div>
    @endif
    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>Logotipo</th>
                    <th>Nombre carrera</th>
                    <th>División</th>
                    <th>Descripción</th>
                    @if (auth()->user()->hasRole(['Super Administrador']))
                    <th>Acción</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>
                            @if ($program->programImage)
                                <img src="{{ asset($program->programImage->image_path) }}" alt="Logotipo de la carrera"
                                    class="h-16 w-16 object-cover">
                            @else
                                <span>Sin Imagen</span>
                            @endif
                        </td>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->division->name }}</td>
                        <td>{{ $program->description }}</td>
                        <td>

                            @if (auth()->user()->hasRole(['Super Administrador']))
                            <div class="flex">
                                <a href="{{ route('carreras.edit', $program->id) }}"
                                    class="bg-[#03A696] hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 mb-2 ">Editar</a>
                                <form action="{{ route('carreras.destroy', $program->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta carrera?')"
                                        class="bg-[#03A696] hover:bg-red-600 text-white py-2 px-4 rounded">Eliminar</button>
                                </form>

                            </div>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div> --}}

@endsection
