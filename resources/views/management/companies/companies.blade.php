@extends('layouts.panel')

@section('titulo', 'Empresas')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 ml-5 uppercase">Empresas</h1>
        <div class="inline-flex ml-5 pr-40 mt-7">
            <div class=" mr-20 mb-4 ">
                <input type="text" placeholder="Buscar empresa..." class="border p-2 rounded mr-2">
                <button class="bg-[#03A696] text-white py-2 px-4 rounded">Buscar</button>
            </div>
            <div class="space-y-2 mr-3 mb-5">
                <details
                    class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden w-full max-w-md">
                    <summary
                        class="flex cursor-pointer items-center justify-between gap-2 bg-white py-2.5 px-4 text-gray-900 transition">
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
                            <button type="button"
                                class="text-sm text-gray-900 underline underline-offset-2">Borrar</button>
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



        </div>

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
                @php
                    $empresas = [
                        [
                            'nombre' =>
                                'INSTALACIÓN Y MANTENIMIENTO, PLOMERÍA, ELECTRICIDAD, SISTEMAS DE RIEGO Y ALBERCAS (GRUPO IMPERA)',
                            'imagen' => asset('images/companies/sge.jpg'),
                            'descripcion' =>
                                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque id nisl aliquam pharetra. Maecenas a consectetur nibh. Suspendisse potenti.',
                            'direccion' => 'Av. Kabah SM53 L65 Calle la UT',
                            'telefono' => '123456789',
                            'correo' => 'empresa@example.com',
                        ],
                        [
                            'nombre' => 'Otra Empresa',
                            'imagen' => asset('images/companies/sge.jpg'),
                            'descripcion' =>
                                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque id nisl aliquam pharetra. Maecenas a consectetur nibh. Suspendisse potenti.',
                            'direccion' => 'Calle Principal, Ciudad',
                            'telefono' => '987654321',
                            'correo' => 'otraempresa@example.com',
                        ],
                    ];
                @endphp

                @foreach ($empresas as $empresa)
                    <tr>
                        <td>
                            <img src="{{ $empresa['imagen'] }}" alt="Icono de Carpeta"
                                class="h-16 w-auto inline-block mr-2 rounded-full">
                        </td>
                        <td>
                            {{ $empresa['nombre'] }}
                        </td>
                        <td>{{ $empresa['descripcion'] }}</td>
                        <td>{{ $empresa['direccion'] }}</td>
                        <td>{{ $empresa['telefono'] }}</td>
                        <td>{{ $empresa['correo'] }}</td>
                        <td>
                            <div class="flex">
                                <i><img class="iconImage h-7 w-7" src="images/projects/edit.png"></i>
                                <i><img class="iconImage h-7 w-7" src="images/projects/view.png"></i>
                                <i><img class="iconImage h-7 w-7" src="images/projects/delete.png"></i>
                                <i class="icon download"></i>
                                <i class="icon more-options"></i>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
