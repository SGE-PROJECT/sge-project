@extends('layouts.panel')

@section('titulo', 'Empresas')

@section('contenido')
{{-- tabla de empresas --}}
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 ml-5 uppercase">Empresas</h1>

        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center ml-5 pr-5">

            <!-- Formulario de búsqueda -->
            <div class="mb-4 flex flex-col md:flex-row items-start md:items-center mr-5">
                <input type="text" placeholder="Buscar empresa..." class="border p-2 rounded mr-2">
                <button class="bg-[#03A696] text-white py-2 px-4 rounded">Buscar</button>
            </div>

            <!-- Detalles del filtro -->
            <div class="absolute mb-4 right-9">
                <details class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden w-full max-w-md">
                    <summary class="flex cursor-pointer items-center justify-between gap-2 bg-white py-2.5 px-4 text-gray-900 transition">
                        <span class="text-sm font-medium">Filtrar</span>
                        <span class="transition group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </summary>

                    <div class="border-t border-gray-200 bg-white">
                        <header class="flex items-center justify-between p-2">
                            <span class="text-sm text-gray-700">Ordenar por</span>
                            <button type="button" class="text-sm text-gray-900 underline underline-offset-2">Borrar</button>
                        </header>

                        <ul class="space-y-1 border-t border-gray-200 p-2">
                            <li>
                                <label for="OrderByAlphabet" class="inline-flex items-center gap-2">
                                    <input type="radio" id="OrderByAlphabet" name="orderBy"
                                        class="size-5 rounded border-gray-300" />
                                    <span class="text-sm font-medium text-gray-700">Orden alfabético</span>
                                </label>
                            </li>
                            <li>
                                <label for="OrderByDate" class="inline-flex items-center gap-2">
                                    <input type="radio" id="OrderByDate" name="orderBy"
                                        class="size-5 rounded border-gray-300" />
                                    <span class="text-sm font-medium text-gray-700">Ordenar por fecha</span>
                                </label>
                                <select class="text-sm border rounded p-1 ml-6">
                                    <option value="recent">Recientes</option>
                                    <option value="old">Más antiguos</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </details>
            </div>

            <!-- Botón para agregar usuario -->
            <div class="mr-28 mb-4">
                <button type="submit"
                    class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">Agregar
                    Usuario</button>
            </div>
        </div>


        <!-- Tabla de empresas -->
        <table class="project-table">
            <thead>
                <tr>
                    <th>Logotipo</th>
                    <th>Empresa</th>
                    <th>Descripción</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>
                            @if ($company->companiesImage)
                                <img src="{{ $company->companiesImage->image_path }}" alt="Logotipo" class="h-16 w-auto inline-block mr-2 rounded-full">
                            @else
                            @endif
                        </td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->description }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->contact_phone }}</td>
                        <td>{{ $company->contact_email }}</td>
                        <td>
                            <!-- Agrega aquí tus enlaces o botones para editar, ver y eliminar -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
