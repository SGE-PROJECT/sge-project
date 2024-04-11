@extends('layouts.panel')
@section('titulo', 'Usuarios')
@section('contenido')

    <h1 class="text-3xl font-bold text-center mt-5">Usuarios</h1>

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
                    <label for="Option1" id="option1" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>
                        <div>
                            <strong class="font-medium text-gray-900"> PDF </strong>
                        </div>
                    </label>

                    <label for="Option2" id="option2" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>

                        <div>
                            <strong class="font-medium text-gray-900"> Excel </strong>
                        </div>
                    </label>

                    <label for="Option3" id="option3" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>

                        <div>
                            <strong class="font-medium text-gray-900"> Imprimir </strong>
                        </div>
                    </label>

                </div>
            </div>
        </div>
    </div>

    <div class="tabla-project">
        <div class="tabla-cont-project ">
            <table id="tabla-usuarios" class="rounded-lg">
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

    <!-- SCRIPTS DE JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SCRIPTS DE DATA TABLES Y DATA TABLE BUTTONS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <!-- SCRIPTS PARA HACER FUNCIONAR LOS BOTONES -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- SCRIPT DE LA DATA TABLE -->
        <script>
            $(document).ready(function() {
        var table = $('#tabla-usuarios').DataTable({
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

    <!--SCRIPT DE LA GRAFICA-->
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Super Administrador', 'Administrador de División',
                    'Asesor Académico', 'Estudiante', 'Presidente Académico', 'Asistente de Dirección'],
                    datasets: [{
                        label: 'Estado del proyecto',
                        data: [
                        {{ $superAdminCount }},
                        {{ $managmentAdminCount }},
                        {{ $adviserCount }},
                        {{ $studentCount }},
                        {{ $presidentCount }},
                        {{ $secretaryCount }}
                    ],
                    backgroundColor: [
                        'rgba(38, 55, 212, 0.5)', // Super Administrador
                        'rgba(163, 31, 225, 0.5)', // Administrador de División
                        'rgba(239, 165, 52, 0.5)', // Asesor Académico
                        'rgba(106, 235, 195, 0.5)', // Estudiante
                        'rgba(0, 255, 255, 0.5)', // Presidente Académico
                        'rgba(255, 0, 255, 0.5)' // Asistente de Dirección
                    ],
                    borderColor: [
                        'rgba(38, 55, 212, 1)', // Super Administrador
                        'rgba(163, 31, 225, 1)', // Administrador de División
                        'rgba(239, 165, 52, 1)', // Asesor Académico
                        'rgba(106, 235, 195, 1)', // Estudiante
                        'rgba(0, 255, 255, 1)', // Presidente Académico
                        'rgba(255, 0, 255, 1)' // Asistente de Dirección
                    ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 5
                        }
                    }
                }
            });
        });
    </script>
@endsection
