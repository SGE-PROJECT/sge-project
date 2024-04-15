@extends('layouts.panel')

@section('titulo')
    Todos los grupos
@endsection

@section('contenido')
    <div class="flex flex-col mt-20 justify-center items-center">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden border-gray-300 bg-white">
                    <table class="w-11/12 divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-white uppercase">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-white uppercase">
                                    División
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-white uppercase">
                                    Carrera
                                </th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-white uppercase">
                                    <!-- Intentionally left empty for layout -->
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach ($groups as $group)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        {{ $group->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ $group->program->division->name ?? 'Sin división'}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                        {{ $group->program->name ?? 'Sin programa' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-bold">
                                        <button type="button"
                                            class="bg-blue-800 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                            <i class='bx bx-edit-alt'></i>
                                            Editar
                                        </button>
                                        <button type="button"
                                            class="ml-1 bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                            <i class='bx bx-trash'></i>
                                            Eliminar
                                        </button>
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
