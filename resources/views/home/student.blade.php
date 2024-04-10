@extends('layouts.panelUsers')

@section('titulo')
    Estudiantes
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
    <main>
        @if ($advisor)
            <div class="container mx-auto px-4 mt-20">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Tarjeta 1 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1]  py-2 px-4">
                            <h2 class="text-xl font-semibold text-white mb-2">
                                @if (!$Project->is_project)
                                    Mi anteproyecto
                                @else
                                    Mi proyecto
                                @endif
                            </h2>
                        </div>
                        <div class="p-4">

                            <div class="w-full max-w-sm bg-white">

                                <div class="flex flex-col items-center pb-10">
                                    <i class='bx bxs-briefcase mb-3 text-[30px] text-[#00ab84]'></i>

                                    <h5 class="mb-1 text-xl font-semibold text-[#00ab84]">

                                        {{ $Project->name_project }}</h5>

                                    @php
                                        $status = $Project->status;
                                        $bgColor = '';
                                        $textColor = '';

                                        switch ($status) {
                                            case 'Registrado':
                                                $bgColor = 'bg-blue';
                                                $textColor = 'text-blue';
                                                break;
                                            case 'En Revisión':
                                                $bgColor = 'bg-yellow';
                                                $textColor = 'text-yellow';
                                                break;
                                            case 'Rechazado':
                                                $bgColor = 'bg-red';
                                                $textColor = 'text-red';
                                                break;
                                            case 'Aprobado':
                                                $bgColor = 'bg-green';
                                                $textColor = 'text-green';
                                                break;
                                            default:
                                                $bgColor = 'bg-gray';
                                                $textColor = 'text-gray';
                                        }
                                    @endphp




                                    <h2 class="mb-2 mr-4 text-gray-500 dark:text-gray-600 font-bold">Integrantes</h2>
                                    <div class="flex items-center">

                                        <div class="group hs-tooltip inline-block">
                                            <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img"
                                                src={{ Auth()->user()->photo }} alt="Image Description">
                                            <span
                                                class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                                                role="tooltip">
                                                {{ Auth()->user()->name }}
                                            </span>
                                        </div>
                                        <div class="group hs-tooltip inline-block">
                                            <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img "
                                                src="fotos/gabo.jpg" alt="Image Description">
                                            <span
                                                class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                                                role="tooltip">
                                                Gabriel
                                            </span>
                                        </div>

                                        <div class="group hs-tooltip inline-block">
                                            <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img "
                                                src="fotos/alonso.jpg" alt="Image Description">
                                            <span
                                                class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                                                role="tooltip">
                                                Alonso
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap mt-3 mb-[-10px]">
                                        <div class="w-full md:w-1/2 lg:w-auto">
                                            <span
                                                class="mr-2 inline-flex items-center bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                <span class="me-1 text-orange-900"> <i class='bx bxs-comment'></i>
                                                    Comentarios: {{ $Project->comments()->count() }}
                                                </span>
                                            </span>
                                        </div>
                                        <div class="w-full md:w-1/2 lg:w-auto">
                                            <span
                                                class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                <span class="me-1 text-yellow-900"> <i class='bx bxs-like'></i>
                                                    Me gusta: {{ $Project->likes->count() }}
                                                </span>
                                            </span>
                                        </div>
                                    </div>



                                    <div class="flex mt-4 md:mt-6">


                                        <a href="#"
                                            class="py-2 px-4 ms-2 text-sm font-bold focus:outline-none bg-[#00ab84] rounded-lg border border-gray-200 h hover: focus:z-10 focus:ring-4 focus:ring-gray-100 text-white">Ver
                                            más información</a>
                                    </div>
                                </div>

                            </div>

                            <span
                                class="inline-flex items-center {{ $bgColor }}-100 {{ $textColor }}-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 me-1 {{ $bgColor }}-500 rounded-full"></span>
                                {{ $status }}
                            </span>



                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-2 px-4">
                            <h2 class="text-xl font-semibold text-white mb-2">Mi asesor académico</h2>
                        </div>
                        <div class="p-4">


                            <div class="w-full max-w-sm bg-white">

                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                        src={{ $AcademicAdvisor->User->photo }} alt="Bonnie image" />
                                    <h5 class="mb-1 text-xl font-semibold text-[#00ab84]">
                                        {{ $AcademicAdvisor->User->name }}</h5>
                                    <span class="text-lg text-gray-500">{{ $AcademicAdvisor->User->email }}</span>
                                    <div class="flex mt-4 md:mt-6">

                                        <a href="#"
                                            class="py-2 px-4 ms-2 text-sm font-bold focus:outline-none bg-[#00ab84] rounded-lg border border-gray-200 h hover: focus:z-10 focus:ring-4 focus:ring-gray-100 text-white">Ver
                                            perfil</a>
                                    </div>
                                </div>
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

                @php
                    $projectsData = $Projects->mapWithKeys(function ($project) {
                        return [
                            $project->id => [
                                'id' => $project->id,
                                'nombre' => $project->name,
                                'descripcion' => $project->description,
                                'alumnos' => [$project->students->first()->id],
                                'imagen' => $project->image,
                            ],
                        ];
                    });
                @endphp
                <script>
                    var proyectos = @json($projectsData);
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

                <a href={{ route('asesoriasStudent', [Auth()->user()->slug]) }}>
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
        @else
<div class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
    <div class="xl:pt-2 w-full xl:w-1/2 relative pb-12 lg:pb-0">
        <div class="relative">
            <div class="absolute">
                <div class="">
                    <h1 class="my-2 text-gray-800 font-bold text-2xl">
                        ¡Aún no cuentas con un asesor académico!
                    </h1>
                    <p class="my-2 text-gray-800">
                        No te preocupes, pronto te asignarán uno para comenzar con tu anteproyecto.
                    </p>

                </div>
            </div>

        </div>
    </div>
    <div>
        <img class="w-96" src="Icons/graduacion.png" />
    </div>
</div>
        @endif
    </main>
@endsection
