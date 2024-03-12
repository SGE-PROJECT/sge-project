@extends('layouts.panel')
@section('contenido')
    <h1 class="text-3xl font-bold text-center mt-5 mb-8">Usuarios</h1>
    <div class="flex flex-wrap justify-center gap-5 p-5">
        <div class="flex lg:flex-nowrap justify-center items-center gap-5 mr-10">
            @include('administrator.card', ['number' => 13, 'name' => 'Usuarios'])
        </div>
        <div class="flex flex-wrap flex-col gap-5 mr-10">
            <!--SECCION PROYECTOS-->
            @include('administrator.section-usuers')
        </div>
    </div>

    <div class="flex items-baseline align-middle">
        <button class="bg-[#03A696] hover:bg-[#025b52] text-white font-bold py-2 px-4 rounded ml-8 mt-10 mr-5 w-32" onclick="window.location.href = '{{ route('dashboardProjects') }}'">
            Ir a Agregar
        </button>
        @include('administrator.filter')
        <div class="relative ml-2 w-55">
            <label for="Search" class="sr-only">Search</label>
            <input type="text" id="Search" placeholder="Buscar"
                class="w-full rounded border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />
            <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                <button type="button" class="text-gray-600 hover:text-gray-700">
                    <span class="sr-only">Search</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </span>
        </div>
        <a
            class="group flex items-center justify-between gap-4 rounded border border-[#03A696] bg-[#03A696] px-5 py-1 transition-colors hover:bg-[#025b52] focus:outline-none focus:ring ml-auto mr-8 w-38">
            <span class="font-medium text-white transition-colors group-hover:text-white group-active:text-white">
                Exportar
            </span>

            <span
                class="shrink-0 rounded-full border border-current bg-white p-2 text-[#03A696] group-active:text-indigo-500">
                <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </span>
        </a>
    </div>

    <div class="tabla-project">
        <div class="tabla-cont-project ">
            <table class="rounded-lg">
                <thead class="bg-[#003E61] text-white font-bold bg-blue-003E61">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Estado</th>
                        <th>Correo Electronico</th>
                        <th>No. Telefono</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tr>
                    <td>Noely</td>
                    <td>Aguilar</td>
                    <td>Activos</td>
                    <td>Noely@gmail.com</td>
                    <td>36263262</td>
                    <td>Administrador</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
