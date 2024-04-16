@extends('layouts.panel')

@section('titulo', 'Carreras')

@section('contenido')
    <div class="flex flex-col mt-10 justify-center items-center">
        <h1 class="text-2xl font-bold mb-2 uppercase">Academias</h1>

        <div class="-m-1.5 overflow-x-auto">
            <div class="px-1.5 flex justify-start w-full">
                <a href="{{ route('academias.create') }}"
                    class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear academia</a>
            </div>


            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden border-gray-300 bg-white">
                    <table class="w-11/12 divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>

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

                            @php
                            $programs = [
                                ['name' => 'SM53', 'division' => 'Ingeniería y Tecnología', 'career' => 'Desarrollo de software multiplataforma'],
                                ['name' => 'LV84', 'division' => 'Ciencias Sociales', 'career' => 'Psicología'],
                                ['name' => 'LV84', 'division' => 'Ciencias Sociales', 'career' => 'Psicología'],
                                ['name' => 'LV84', 'division' => 'Ciencias Sociales', 'career' => 'Psicología'],
                                ['name' => 'LV84', 'division' => 'Ciencias Sociales', 'career' => 'Psicología'],
                                ['name' => 'LV84', 'division' => 'Ciencias Sociales', 'career' => 'Psicología'],
                                // Añade más grupos según sea necesario
                            ];
                            @endphp

                            @foreach ($academies as $index => $academy)
                                <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ $academy->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                         {{ $division->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-bold flex items-center">
                                        <a href="{{ route('academias.edit', $academy->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                            <i class='bx bx-edit-alt'></i>
                                            Editar
                                        </a>

                                         <form action="{{ route('academias.destroy', $academy->id) }}" method="POST"
                                            class="ml-1">
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



@endsection
