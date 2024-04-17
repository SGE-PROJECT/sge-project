@extends('layouts.panelUsers')

@section('titulo', 'Asesorias')

@section('js')
    @vite('resources/js/asesoriasStudent.js')
@endsection

@section('css')
    @vite('resources/css/advisory/asesoriasStudents.css')
@endsection

@section('contenido')
    @if ($slug !== auth()->user()->slug)
        {{ abort(404) }}
    @endif
    @if (session('success'))
        <div class="bg-[#14B8A6c0] block md:inline text-white text-center p-2 fixed bottom-10 rounded right-0 md:right-10 z-50 shadow-lg noti"
            id="noti">
            <i class="nf nf-fa-check_circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif
    <script>
        setTimeout(() => {
            document.getElementById("noti").classList.add("ocultarNoti");
        }, 4000);
    </script>
    <main class="vista_asesorias">
        @if (!$advisor)
        <div
        class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
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


        @php
            if ($advisor) {
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
            }
        @endphp
        @if ($advisor)
            <script>
                var proyectos = @json($projectsData);
            </script>
        @endif

        @php
            use Carbon\Carbon;
            if ($advisor) {
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
            }

        @endphp
        @if ($advisor)
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
        @endif

        @if ($advisor)
            <header class="asesorias-opciones block md:flex">
                <span class="fechas-asesorias">
                    <select id="student-month" class="select-books-sd bg-[#00ab84]  select-asesorias">
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
                    <select id="student-year" class="select-books-sd bg-[#00ab84]  select-asesorias">
                        <!-- Los años se generarán dinámicamente -->
                    </select>
                </span>
                <span class="hora-asesorias ocultar">
                    <button
                        class="top-0 md:top-[0px] bg-[#00ab84] rounded px-2 text-[#fff] font-bold text-[20px] md:text-[25px]  transition-colors flex items-center"
                        id="student-volverButton"><i class="nf nf-cod-arrow_left text-[20px]"></i></button>
                    <h3 class="w-full select-mes text-center text-[30px]" id="student-hora"></h3>
                </span>

                <div class="BtnCrearDivisions botonVereventos " id="student-contbtnCitas">
                    <button
                        class="Btn_divisions bg-[#00ab84]  text-white px-2 py-1 rounded transition-colors"
                        id="student-cambiarCita">
                        <span class="Btntext_divisions">Cambiar<b>-</b>cita</span>
                        <span class="svgIcon_divisions">
                            <i class="nf nf-md-update"></i>
                        </span>
                    </button>
                </div>
            </header>

            <div id="student-myModal3" class="modal-background">
                <form action="{{ route('asesoriasEnviar', ['id' => auth()->user()->id]) }}" method="POST"
                    class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias" id="enviar">
                    <span class="close3" id="close3">&times;</span>
                    @csrf
                    <h2>Solicitar cambio de cita</h2>
                    <div class="form-group">
                        <label for="solitMensaje">Mensaje:</label>
                        <textarea name="message" maxlength="250" id="student-solitMensaje" placeholder="Justificacion de la solicitud"></textarea>
                        <span id="editContador">0/250</span>
                    </div>

                    <p id="error2">Error</p>
                    <button class="bg-[#00ab84]  text-white px-2 py-1 rounded transition-colors"
                        type="button" onclick="eliminarEvento2()">Solicitar cambio</button>
                </form>
            </div>
            <script>
                function eliminarEvento2() {
                    var error = document.getElementById("error2");
                    error.style.display = "none";
                    if (document.getElementById('student-solitMensaje').value.length === 0) {
                        error.style.display = "block";
                        error.innerHTML = "Es necesario agregar la justificacion.";
                        return;
                    }
                    var formulario = document.getElementById('enviar');
                    document.getElementById("student-myModal3").style.display = "none";
                    formulario.submit();
                    var formularios = document.querySelectorAll("form");
                    formularios.forEach(function(formulario) {
                        var botones = formulario.querySelectorAll("button");
                        botones.forEach(function(boton) {
                            boton.disabled = true;
                        });
                    });
                }
            </script>
            <div class="calendar-container w-full lg:w-[65%] relative z-20" id="student-calendario">
                <div id="student-calendar" class=""></div>
            </div>

            <div class="ocultar w-[100%] sm:w-[65%] flex flex-wrap relative justify-center" id="student-dia">
                <div id="student-dia2">
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

            <div id="student-eventosContainer" class="w-full lg:w-[20%] ">
                <h2>Citas próximas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <div>Fecha</div>
                            </th>
                            <th>
                                <div>Hora</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sessionsThisWeek as $session)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($session->session_date)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($session->session_date)->format('h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No hay eventos esta semana.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            </span>
            </span>
        @endif



        @php
            if ($advisor) {
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
            }

        @endphp
        @if ($advisor)
            <script>
                var sessions = @json($sessionsData, JSON_PRETTY_PRINT);
            </script>
        @endif


    </main>
@endsection
