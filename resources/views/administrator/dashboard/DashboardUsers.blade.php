@extends('layouts.panel')
@section('titulo', 'Usuarios')
@section('contenido')

    <div class="p-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @include('administrator.graphs.graph-anteprojects', ['isActive' => Route::is('Dashboard-Anteproyectos')])
        @include('administrator.graphs.graph-projects', ['isActive' => Route::is('Dashboard-Proyectos')])
        @include('administrator.graphs.graph-users', ['isActive' => Route::is('Dashboard-Usuarios')])
    </div>

    <div class="p-6 grid sm:grid-cols-1 lg:grid-cols-2 gap-5">
        <!-- Gráfica de barras a la izquierda -->
        <div class="flex flex-col lg:flex-row items-stretch w-full lg:w-auto">
            <div id="barChartContainer"
                class="seccion-projects p-12 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 w-full shadow-lg rounded-xl font-sans">
                <canvas id="barChart" class="mt-5"
                    style="display: block; box-sizing: border-box; height: 300px; width: 400px;"></canvas>
            </div>
        </div>
        <!-- Componente administrator.section-projects a la derecha -->
        <div class="flex flex-col lg:flex-row items-stretch gap-5 w-full">
            @include('administrator.section-users')
        </div>
    </div>

    <div class="flex items-baseline align-middle">
        <button class="bg-[#03A696] hover:bg-[#025b52] text-white font-bold py-2 px-4 rounded ml-8 mt-10 mr-5 w-32" onclick="window.location.href = '{{ route('dashboardProjects') }}'">
            Ir a Agregar
        </button>
        @include('administrator.filter')

        <!--Buscador-->
        <div class="relative ml-5 w-55 z-10 flex items-center">
            <label for="Search" class="sr-only">Buscar</label>
            <input type="text" id="Search" placeholder="Buscar"
                class="w-full rounded border-gray-200 py-2.5 px-4 sm:text-sm h-full outline-none" />
            <span class="absolute rounded inset-y-0 end-0 grid w-10 place-content-center bg-teal-500 text-white h-full">
                <button type="button" class="text-gray-500 hover:text-gray-700 h-full">
                    <span class="sr-only bg-white text-white">Buscar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </span>
        </div>

        <!--Boto de exportar-->
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
                        <th>Correo electrónico</th>
                        <th>No. Teléfono</th>
                        <th>Rol</th>
                        <th>División</th>
                        <th>Estado</th>

                    </tr>
                </thead>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>
                    @foreach ($user->roles as $role)
                        <span>{{ $role->name }}</span>
                    @endforeach</td>
                    <td>{{$user->division_name}}</td>
                    <td>{{$user->isActive == 1 ? 'Activo' : 'Inactivo'}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-1">
            {{ $users->links() }}
        </div>

    </div>
@endsection
