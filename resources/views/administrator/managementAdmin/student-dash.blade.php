<!-- SECCION PROYECTOS -->
@extends('layouts.panel')
@section('titulo', 'Estudiantes')
@section('contenido')

    <h1 class="text-3xl font-bold text-center mt-5">Estudiantes de la división</h1>
    <!-- SECCIÓN QUE CONTIENE LA TARJETA Y LA GRÁFICA -->
    <div class="p-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @include('administrator.graphs.graph-anteprojectsDivision', [
            'isActive' => Route::is('Division-Anteproyectos'),
        ])
        @include('administrator.graphs.graph-projectsDivision', [
            'isActive' => Route::is('Division-Proyectos'),
        ])
        @include('administrator.graphs.graph-students-dash', ['isActive' => Route::is('student-dash')])
        @include('administrator.graphs.graph-advisor', ['isActive' => Route::is('academic-advisor')])
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
            @include('administrator.sections.section-students')
        </div>
    </div>

    <!-- SECCIÓN QUE CONTIENE LOS BOTONES -->
    <div class="flex items-end align-middle">
        <!-- BOTÓN QUE DIRIGE AL CRUD -->
        <button type="submit"
            class="relative bg-teal-500 text-white px-4 py-2 ml-5 mr-5 rounded hover:bg-teal-600 transition-colors h-full"
            onclick="window.location.href = '{{ route('student-dash') }}'">Ir a Agregar</button>


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
        <div x-data="{ isActive: false }" class="relative ml-auto mr-6">
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
                    <label for="Option1" id="option1" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>
                        <div>
                            <strong class="font-medium text-gray-900"> <a href="{{ route('export.usersDivision.pdf') }}">
                                    PDF </strong>
                        </div>
                    </label>

                    <label for="Option2" id="option2" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>

                        <div>
                            <a href="{{ route('export.usersDivision.excel') }}">
                                <strong class="font-medium text-gray-900"> Excel </strong>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENEDOR DE LA TABLA -->
    <div id="tabla-container" class=" ">
        <div class="mt-5 mr-3 mb-5 overflow-x-auto ">
            <table
                class="border rounded-lg overflow-hidden border-gray-300 divide-gray-700 project-table">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Matricula</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Nombre</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Email</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Grupo</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Asesor Académico</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase">Carrera</th>
                        </tr>
                    <tbody>
                        @foreach ($students as $student)

                                <tr>
                                    <td class="py-4 text-sm text-black">{{ $student->student_matricula }}</td>
                                    <td class="py-4 text-sm text-black">{{ $student->student_name }}</td>
                                    <td class="py-4 text-sm text-black">{{ $student->student_email }}</td>
                                    <td class="py-4 text-sm text-black">{{ $student->group_name }}</td>
                                    <td class="py-4 text-sm text-black">{{ $student->advisor_name }}</td>
                                    <td class="py-4 text-sm text-black">{{ $student->program_name }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-1">
                {{ $students->links() }}
            </div>
        </div>
    </div>
    <!-- SCRIPTS DE JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SCRIPTS PARA LA GRÁFICA -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/tableproject.js') }}"></script>
    <script type="text/javascript">
        var programsData = @json($programsData);
    </script>
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: programsData.map(function(program) {
                        return program.program_name.slice(0, 15);
                    }),
                    datasets: [{
                        label: 'Número de estudiantes',
                        data: programsData.map(function(program) {
                            return program.student_count;
                        }),
                        backgroundColor: [
                            'rgba(239, 68, 68, 0.2)', // bg-red-500
                            'rgba(59, 130, 246, 0.2)', // bg-blue-500
                            'rgba(16, 185, 129, 0.2)', // bg-green-500
                            'rgba(234, 179, 8, 0.2)', // bg-yellow-500
                            'rgba(139, 92, 246, 0.2)' // bg-purple-500
                        ],
                        borderColor: [
                            'rgba(239, 68, 68, 1)', // bg-red-500
                            'rgba(59, 130, 246, 1)', // bg-blue-500
                            'rgba(16, 185, 129, 1)', // bg-green-500
                            'rgba(234, 179, 8, 1)', // bg-yellow-500
                            'rgba(139, 92, 246, 1)' // bg-purple-500
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


    <!-- SCRIPT DE LA DATA TABLE -->
    <script>
        $(document).ready(function() {
            var table = $('#tabla-proyectos').DataTable({
                pageLength: 25,
                responsive: true,
                dom: 't', // Quitamos la 'B' para que no se muestren los botones
                buttons: [ // Inicializamos los botones manualmente
                    'pdf',
                    'excel',
                    'print'
                ]
            });

            // Creamos una nueva instancia de botones para poder usarla después
            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    'pdf',
                    'excel',
                    'print'
                ]
            });

            // Agregamos la nueva instancia de botones al datatables
            table.buttons(0, null).containers().appendTo('#buttonContainer');

            $('#option1').on('click', function() {
                table.button('.buttons-pdf').trigger();
            });

            $('#option2').on('click', function() {
                table.button('.buttons-excel').trigger();
            });

            $('#option3').on('click', function() {
                table.button('.buttons-print').trigger();
            });

            //Buscador
            $('#Search').on('input', function() {
                table.search(this.value).draw();
            });

            table.on('draw', function() {
                if (table.page.info().recordsDisplay === 0) {
                    $('.dataTables_empty').text('No se encontraron resultados');
                }
            });
        });
    </script>
@endsection
