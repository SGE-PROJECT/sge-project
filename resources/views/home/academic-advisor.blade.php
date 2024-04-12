@extends('layouts.panelUsers')

@section('titulo')
    Profesor
@endsection

@section('js')
    @vite('resources/js/asesoriasStudent.js')
@endsection

@section('css')
    @vite('resources/css/advisory/asesoriasStudents.css')
@endsection

@section('contenido')
    @php
        use Carbon\Carbon;

    @endphp
    <main class="vista_asesorias">
        <div class="container mx-auto px-4 mt-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1]  py-2 px-4">
                        <h2 class="text-xl font-semibold text-white mb-2">
                            Mis asesorados
                        </h2>
                    </div>
                    <div class="p-4">


                        <div class="max-w-2xl mx-auto">

                            <div class="p-1 max-w-md bg-white">

                                <div class="flow-root">
                                    <ul role="list" class="divide-y divide-gray-200 ">

                                        @foreach ($getStudents as $student)
                                            <li class="pt-3 pb-3 sm:pt-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-shrink-0">
                                                        <img class="w-8 h-8 rounded-full" src={{ $student->user->photo }}
                                                            alt="Thomas image">
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate ">
                                                            {{ $student->user->name }}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate">
                                                            {{ $student->user->email }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                        </div>
                        <div class="flex justify-center mt-4 md:mt-6">

                            <a href={{ route('asesorados', [Auth()->user()->slug]) }}
                                class="py-2 px-4 ms-2 text-sm font-bold focus:outline-none bg-[#00ab84] rounded-lg border border-gray-200 h hover: focus:z-10 focus:ring-4 focus:ring-gray-100 text-white">Gestionar
                                mis asesorados</a>
                        </div>

                    </div>

                </div>


                <!-- Tarjeta 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-2 px-4">
                        <h2 class="text-xl font-semibold text-white mb-2">Anteproyectos</h2>
                    </div>
                    <div class="p-4">


                        @foreach ($Projects as $project)
                            <div id="toast-default"
                                class="flex bg-white items-center w-full p-4 text-gray-500 rounded-lg shadow mb-2"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-teal-500 bg-green-50 rounded-lg">
                                    <i class='bx bxs-briefcase'></i>
                                    <span class="sr-only">Fire icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ $project->name_project }}</div>

                                <div class="ml-auto"></div>
                                <div class="mx-3">
                                    <a href={{ route('projects.show', [$project]) }}
                                        class="px-3 py-1 bg-[#00ab84] text-white text-sm font-bold rounded-lg hover:bg-teal-700">Ver
                                        cédula</a>
                                </div>
                            </div>
                        @endforeach

                        <div class="flex justify-center mt-4 md:mt-6">

                            <a href={{ route('viewanteproject') }}
                                class="py-2 px-4 ms-2 text-sm font-bold focus:outline-none bg-[#00ab84] rounded-lg border border-gray-200 h hover: focus:z-10 focus:ring-4 focus:ring-gray-100 text-white">Ver
                                todos los anteproyectos</a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-2 px-4">
                        <h2 class="text-xl font-semibold text-white mb-2">Avisos importantes</h2>
                    </div>
                    <div class="p-4">


                        <div id="toast-default"
                            class="flex bg-blue-50 items-center w-full  p-4 text-gray-500  rounded-lg shadow mb-2"
                            role="alert">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-200 rounded-lg ">
                                <i class='bx bxs-megaphone'></i>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">Fecha de finalización de las estadías será el 10 de
                                septiembre. Favor de enviar la documentación correcta.</div>

                        </div>

                        <div id="toast-default"
                            class="flex items-center w-full  p-4 text-gray-500 bg-white rounded-lg shadow mb-2"
                            role="alert">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-200 rounded-lg ">
                                <i class='bx bxs-megaphone'></i>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">Fecha de finalización de las estadías será el 10 de
                                septiembre. Favor de enviar la documentación correcta.</div>

                        </div>

                        <div id="toast-default"
                            class="flex items-center w-full mb-2 p-4 text-gray-500 bg-white rounded-lg shadow "
                            role="alert">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-200 rounded-lg ">
                                <i class='bx bxs-megaphone'></i>
                                <span class="sr-only">Icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">Fecha de finalización de las estadías será el 10 de
                                septiembre. Favor de enviar la documentación correcta.</div>
                        </div>


                    </div>
                </div>

            </div>


            <a href="{{ route('asesorias', [Auth()->user()->slug]) }}">
                <header class="asesorias-opciones block md:flex">
                    <span class="fechas-asesorias">
                        <select id="student-month" class="hidden">
                            <option value="0">Enero</option>
                            <option value="1">Febrero</option>
                            <option value="2">Marzo</option>
                            <option value="3">Abril</option>
                            <option value="4">Mayo</option>
                            <option value="5">Junio</option>
                            <option value="6">Julio</option>
                            <option value="7">Agosto</option>
                            <option value="8">Septiembre</option>
                            <option value="9">Octubre</option>
                            <option value="10">Noviembre</option>
                            <option value="11">Diciembre</option>
                        </select>
                        <select id="student-year" class="hidden">
                            <!-- Los años se generarán dinámicamente -->
                        </select>
                    </span>
                    <span class="hora-asesorias ocultar">
                        <button
                            class="top-0 md:top-[0px] bg-teal-500 rounded px-2 text-[#fff] font-bold text-[20px] md:text-[25px] hover:bg-teal-600 transition-colors flex items-center"
                            id="student-volverButton"><i class="nf nf-cod-arrow_left text-[20px]"></i></button>
                        <h3 class="w-full select-mes text-center text-[30px]" id="student-hora"></h3>
                    </span>


                </header>


                <div class="calendar-container w-full lg:w-[66%] relative z-20 ocultar-pading" id="student-calendario">
                    <div id="student-calendar" class="ocultar-pading"></div>
                </div>
            </a>

            @php

                $sessionsData = $sessions
                    ->map(function ($session) {
                        $sessionDate = Carbon::parse($session->session_date);

                        return [
                            'proyectoId' => $session->proyect->id ?? null,
                            'nombreProyecto' => $session->proyect->name ?? 'Proyecto no especificado',
                            'alumnos' =>
                                optional($session->proyect->students)
                                    ->pluck('name')
                                    ->all() ?? [],
                            'motivo' => $session->description ?? '',
                            'fecha' => $sessionDate->format('Y-m-d'),
                            'hora' => $sessionDate->format('H:i'),
                            'id' => $session->id,
                        ];
                    })
                    ->toArray();
            @endphp

            <script>
                var sessions = @json($sessionsData, JSON_PRETTY_PRINT);
            </script>




        </div>




        @php
            $projectsData = $Projects->mapWithKeys(function ($project) {
                return [
                    $project->id => [
                        'id' => $project->id,
                        'nombre' => $project->name,
                        'descripcion' => $project->description,
                        'alumnos' => $project->students,
                        'imagen' => $project->image,
                    ],
                ];
            });
            $studentsData = [];
            foreach ($allStudents as $student) {
                $studentsData[$student->id] = [
                    'nombre' => $student->name,
                    'imagen' => $student->avatar,
                    'color' => $student->color,
                ];
            }
        @endphp
        <script>
            var proyectos = @json($projectsData);
            var estudiantes = @json($studentsData);
        </script>
        @php
            $sessionsData = collect($sessions)
                ->map(function ($session) {
                    $sessionDate = Carbon::parse($session->session_date);
                    $fecha = $sessionDate->format('Y-m-d');
                    $hora = $sessionDate->format('H:i');

                    return [
                        'id' => $session->id,
                        'fecha' => $fecha,
                        'hora' => $hora,
                        'proyectoId' => $session->id_project_id,
                        'motivo' => $session->description,
                    ];
                })
                ->toJson();
        @endphp

        <script>
            var sessions = @json($sessionsData);
            var sessions = JSON.parse(sessions);
            var eventos = {};
            sessions.forEach(cita => {
                let idEvento = `${cita.fecha} ${cita.hora}`;
                eventos[idEvento] = {
                    id: cita.id,
                    fecha: cita.fecha,
                    hora: cita.hora,
                    proyectoId: cita.proyectoId,
                    motivo: cita.motivo
                };
            });
        </script>






        <div class="calendar-container w-full lg:w-[65%] relative z-20" id="calendario">
            <div id="calendar" class=""></div>
        </div>

        <div class="ocultar w-[100%] sm:w-[65%] flex flex-wrap relative justify-center" id="dia">
            <div id="dia2">
                <table>
                    <thead>
                        <tr>
                            <th class="horas">Horas</th>
                            <th>Citas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="horas">7:00 A.M</th>
                            <td data-hora="07:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">8:00 A.M</th>
                            <td data-hora="08:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">9:00 A.M</th>
                            <td data-hora="09:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">10:00 A.M</th>
                            <td data-hora="10:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">11:00 A.M</th>
                            <td data-hora="11:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">12:00 A.M</th>
                            <td data-hora="12:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">1:00 P.M</th>
                            <td data-hora="13:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">2:00 P.M</th>
                            <td data-hora="14:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">3:00 P.M</th>
                            <td data-hora="15:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">4:00 P.M</th>
                            <td data-hora="16:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">5:00 P.M</th>
                            <td data-hora="17:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">6:00 P.M</th>
                            <td data-hora="18:00"></td>
                        </tr>
                        <tr>
                            <th class="horas">7:00 P.M</th>
                            <td data-hora="19:00"></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>




        @php

            $sessionsData = $sessions
                ->map(function ($session) {
                    $sessionDate = Carbon::parse($session->session_date);

                    return [
                        'proyectoId' => $session->proyect->id ?? null,
                        'nombreProyecto' => $session->proyect->name ?? 'Proyecto no especificado',
                        'alumnos' =>
                            optional($session->proyect->students)
                                ->pluck('name')
                                ->all() ?? [],
                        'motivo' => $session->description ?? '',
                        'fecha' => $sessionDate->format('Y-m-d'),
                        'hora' => $sessionDate->format('H:i'),
                        'id' => $session->id,
                    ];
                })
                ->toArray();
        @endphp

        <script>
            var sessions = @json($sessionsData, JSON_PRETTY_PRINT);
        </script>




    </main>
@endsection