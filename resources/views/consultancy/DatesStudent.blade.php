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
        {{abort(404);}}
    @endif
    <main class="vista_asesorias">
        @if (!$advisor)
        <h2 style="color: #293846; font-size: 24px; font-weight: bold; text-align: left; width: 80%; margin-top:50px;">Opss... parece que aun no tienes un asesor designado...</h2>
        <h2 style="color: #293846; font-size: 24px; font-weight: bold; text-align: left; width: 80%;">Lo sentimos, puedes contactar con servicios estudiantiles para que se te asigne un asesor, numero: 235 103 5581.</h2>
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
                <select id="student-month" class="select-books-sd bg-teal-500 select-asesorias">
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
                <select id="student-year" class="select-books-sd bg-teal-500 select-asesorias">
                    <!-- Los años se generarán dinámicamente -->
                </select>
            </span>
            <span class="hora-asesorias ocultar">
                <button
                    class="top-0 md:top-[0px] bg-teal-500 rounded px-2 text-[#fff] font-bold text-[20px] md:text-[25px] hover:bg-teal-600 transition-colors flex items-center"
                    id="student-volverButton"><i class="nf nf-cod-arrow_left text-[20px]"></i></button>
                <h3 class="w-full select-mes text-center text-[30px]" id="student-hora"></h3>
            </span>

            <div class="BtnCrearDivisions botonVereventos " id="student-contbtnCitas">
                <button class="Btn_divisions bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors"
                    id="student-cambiarCita">
                    <span class="Btntext_divisions">Cambiar<b>-</b>cita</span>
                    <span class="svgIcon_divisions">
                        <i class="nf nf-md-update"></i>
                    </span>
                </button>
            </div>
        </header>

        <div id="student-myModal3" class="modal-background">
            <form action="{{ route('asesoriasEnviar', ['id' => auth()->user()->id]) }}" method="POST" class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias" id="enviar">
                <span class="close3" id="close3">&times;</span>
                @csrf
                <h2>Solicitar cambio de cita</h2>
                <div class="form-group">
                    <label for="solitMensaje">Mensaje:</label>
                    <textarea name="message" maxlength="250" id="student-solitMensaje" placeholder="Justificacion de la solicitud"></textarea>
                    <span id="editContador">0/250</span>
                </div>

                <p id="error2">Error</p>
                <button class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors" type="button"
                    onclick="eliminarEvento2()">Solicitar cambio</button>
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
