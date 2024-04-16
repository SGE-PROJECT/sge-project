@extends('layouts.panel')

@section('titulo')
    Todos los grupos
@endsection

@section('contenido')
    <div class="flex flex-col mt-10 justify-center items-center">
        <h1 class="text-2xl font-bold mb-2 uppercase">Grupos</h1>

        <div class="-m-1.5 overflow-x-auto items-center">
            <div class="px-1.5 flex justify-start w-full">
                <a href="{{ route('grupos.create') }}" class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Crear grupo</a>
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
                                    Carrera
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">
                                    Acciones
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
                                        
                                        <a href="{{ route('grupos.edit', $group->id) }}" type="button"
                                            class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                            <i class='bx bx-edit-alt'></i>
                                            Editar
                                        </a>
                                        
                                        <form action="{{ route('grupos.destroy', $group->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este grupo?');">
                                            @csrf
                                            @method('DELETE') <!-- Directiva Blade para incluir un campo oculto con el método DELETE -->
                                            <button type="submit" class="ml-1 bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
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
