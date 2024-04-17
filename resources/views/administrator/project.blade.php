<!-- SECCION PROYECTOS -->
@extends('layouts.panel')
@section('titulo', 'Proyectos')
@section('contenido')

    <h1 class="text-3xl font-bold text-center mt-5">Proyectos</h1>
    <!-- SECCIÓN QUE CONTIENE LA TARJETA Y LA GRÁFICA -->

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
                @include('administrator.sections.section-projects')
            </div>
        </div>

    <!-- SECCIÓN QUE CONTIENE LOS BOTONES -->
    <div class="flex items-end align-middle">
        <!-- BOTÓN QUE DIRIGE AL CRUD -->
        <button type="submit"
            class="relative bg-teal-500 text-white px-4 py-2 ml-8 mr-5 rounded hover:bg-teal-600 transition-colors h-full"
            onclick="window.location.href = '{{ route('dashboardProjects') }}'">Ir a Agregar</button>

        <!-- SE AGREGA EL FILTRO -->
        {{-- <div x-data="{ isActive: false }" class="relative">
            <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                <a class="w-full border-e px-4 py-3 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    Filtrar
                </a>
                <button x-on:click="isActive = !isActive"
                    class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    <span class="sr-only">Menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="absolute end-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu"
                x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false"
                x-on:keydown.escape.window="isActive = false">
                <div class="p-2" id="">
                    <strong class="block p-2 text-xs font-medium uppercase text-gray-400"> Estado </strong>
                    <label for="Option1" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                            <input type="checkbox" class="size-4 rounded border-gray-300" id="enDesarrollo"
                                value="En desarrollo" />
                        </div>
                        <div>
                            <strong class="font-medium text-gray-900">En desarrollo</strong>
                        </div>
                    </label>
                    <label for="Option2" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                            <input type="checkbox" class="size-4 rounded border-gray-300" id="completado"
                                value="Completado" />
                        </div>

                        <div>
                            <strong class="font-medium text-gray-900">Completado</strong>
                        </div>
                    </label>
                    <label for="Option3" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                            <input type="checkbox" class="size-4 rounded border-gray-300" id="reprobado"
                                value="Reprobado" />
                        </div>

                        <div>
                            <strong class="font-medium text-gray-900">Reprobado</strong>
                        </div>
                    </label>
                    <strong class="block p-2 text-xs font-medium uppercase text-gray-400"> Carrera </strong>
                </div>
            </div>
        </div> --}}

        <!-- SE AÑADE EL BÚSCADOR -->
        <div class="relative ml-5 w-55 z-10 flex items-center">
            <label for="Search" class="sr-only">Search</label>
            <input type="text" id="Search" placeholder="Buscar"
                class="w-full rounded border-gray-200 py-2.5 px-4 sm:text-sm h-full outline-none" />
            <span class="absolute rounded inset-y-0 end-0 grid w-10 place-content-center bg-teal-500 text-white h-full">
                <button type="button" class="text-gray-500 hover:text-gray-700 h-full">
                    <span class="sr-only bg-white text-white">Search</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </span>
        </div>
        <!-- BOTÓN QUE NOS SIRVE PARA EXPORTAR LOS ARCHIVOS -->
        <div x-data="{ isActive: false }" class="relative ml-auto mr-8">
            <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                <a class="w-full border-e px-4 py-3 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    Exportar
                </a>
                <button x-on:click="isActive = !isActive"
                    class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    <span class="sr-only">Menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 01-1.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="absolute right-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu"
                x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false"
                x-on:keydown.escape.window="isActive = false">
                <div class="p-2">
                    <strong class="block p-2 text-xs font-medium uppercase text-gray-400"> Opciones </strong>
                    <label for="option1" id="option1" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>
                        <a href="{{ route('export.projects.pdf') }}">
                            <strong class="font-medium text-gray-900"> PDF </strong>
                        </a>
                    </label>

                    <label for="option2" id="option2" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>

                        <a href="{{ route('export.projects.excel') }}">
                            <strong class="font-medium text-gray-900"> Excel </strong>
                        </a>
                    </label>

                </div>
            </div>
        </div>
    </div>
    <!-- CONTENEDOR DE LA TABLA -->
    <div id="tabla-container" class="tabla-project rounded-t-lg">
        <div class=" rounded-t-lg">
            <table id="tabla-proyectos" class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table ">
                <thead>
                    <tr>
                        <th class="uppercase">Proyecto</th>
                        <th class="uppercase">Estudiante</th>
                        <th class="uppercase">División</th>
                        <th class="uppercase">Grupo</th>
                        <th class="uppercase">Carrera</th>
                        <th class="uppercase">Asesor Académico</th>
                        <th class="uppercase">Empresa</th>
                        <th class="uppercase">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Projects as $project)
                    <tr>
                        <td>{{ $project->name_project }}</td>
                        <td>
                            @foreach ($project->students as $student)
                                {{ $student->user->name }} ({{ $student->registration_number }})
                                @if (!$loop->last)
                                    ,<br>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($project->students as $student)
                                {{ $student->group->program->division->name ?? 'Sin División' }}
                                @if (!$loop->last)
                                    ,<br>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($project->students as $student)
                                {{ $student->group->name }}
                                @if (!$loop->last)
                                    ,<br>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($project->students as $student)
                                {{ $student->group->program->name }}
                                @if (!$loop->last)
                                    ,<br>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($project->students as $student)
                                {{ $student->academicAdvisor->user->name ?? 'No asignado' }} ({{ $student->academicAdvisor->payrol ?? 'N/A' }})
                                @if (!$loop->last)
                                    ,<br>
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $project->company_name }}</td>
                        <td><span class="project-status">{{ $project->status }}</span></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div id="no-results" class="alert alert-warning" style="display: none; text-align: center;">
                No se encontraron resultados.
            </div>
            <div class="mt-1">
                {{$Projects->links()}}
            </div>
        </div>
    </div>
    <!-- SCRIPTS DE JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- SCRIPTS PARA LA GRÁFICA -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('js/tableproject.js') }}"></script>
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['En curso', 'Reprobados', 'Finalizados'],
                    datasets: [{
                        label: 'Estado del proyecto',
                        data: [
                            {{ $enCursoCount }},
                            {{ $reprobadosCount }},
                            {{ $finalizadosCount }}
                        ],
                        backgroundColor: [
                            'rgba(234, 179, 8, 0.5)',
                            'rgba(248, 113, 113, 0.5)',
                            'rgba(161, 161, 161, 0.5)'
                        ],
                        borderColor: [
                            'rgba(234, 179, 8, 0.5)',
                            'rgba(248, 113, 113, 0.5)',
                            'rgba(161, 161, 161, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

@endsection
