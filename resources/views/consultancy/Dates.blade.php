@extends('layouts.panelUsers')

@section('titulo', 'Asesorias')

@section('js')
    @vite('resources/js/asesorias.js')
@endsection

@section('css')
    @vite('resources/css/advisory/asesorias.css')
@endsection

@section('contenido')
    @if ($slug !== auth()->user()->slug)
        {{ abort(404) }}
    @endif
    @if (session('success'))
        <div class="bg-[#84cc16c0] block md:inline text-white text-center p-2 fixed bottom-10 rounded right-0 md:right-10 z-50 shadow-lg noti"
            id="noti">
            <i class="nf nf-fa-check_circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif
    @if (session('edit'))
        <div class="bg-[#14B8A6c0] block md:inline text-white text-center p-2 fixed bottom-10 rounded right-0 md:right-10 z-50 shadow-lg noti"
            id="noti">
            <i class="nf nf-md-clock_edit mr-2"></i>
            {{ session('edit') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="bg-[#EF4444f0] block md:inline text-white text-center p-2 fixed bottom-10 rounded right-0 md:right-10 z-50 shadow-lg noti"
            id="noti">
            <i class="nf nf-md-delete_circle mr-2"></i>
            {{ session('delete') }}
        </div>
    @endif
    <main class="vista_asesorias">

        <script>
            setTimeout(() => {
                document.getElementById("noti").classList.add("ocultarNoti");
            }, 4000);
        </script>

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
            use Carbon\Carbon;
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
        <header class="asesorias-opciones block md:flex">
            <span class="fechas-asesorias">
                <select id="month" class="select-books-sd bg-teal-500 select-asesorias">
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

                <select id="year" class="select-books-sd bg-teal-500  select-asesorias">
                    <!-- Los años se generarán dinámicamente -->
                </select>
            </span>
            <span class="hora-asesorias ocultar">
                <button
                    class="top-0 md:top-[0px] bg-teal-500 rounded px-2 text-[#fff] font-bold text-[20px] md:text-[25px] hover:bg-teal-600 transition-colors flex items-center"
                    id="volverButton"><i class="nf nf-cod-arrow_left text-[20px]"></i></button>
                <h3 class="w-full select-mes text-center text-[30px]" id="hora"></h3>
            </span>

            <div class="BtnCrearDivisions botonVereventos" id="contbtnCitas">
                <a href="{{ route('asesoriasTodas', ['id' => auth()->user()->slug]) }}"
                    class="Btn_divisions bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors flex items-center"
                    id="">
                    <span class="Btntext_divisions">Citas</span>
                    <span class="svgIcon_divisions">
                        <i class="nf nf-oct-arrow_switch"></i>
                    </span>
                </a>
            </div>
        </header>

        <div id="myModal2" class="modal-background">
            <form action="#" method="POST"
                class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias" id="editarCita">
                <span class="close2">&times;</span>
                @csrf
                @method('put')
                <h2>Editar Cita</h2>
                <div class="form-group">
                    <label for="editFecha">Fecha:</label>
                    <input type="date" id="editFecha" name="session_date">
                </div>
                <div class="form-group">
                    <label for="editHora">Hora:</label>
                    <input type="time" id="editHora" name="hora">
                </div>
                <div class="form-group">
                    <label for="editMotivo">Motivo:</label>
                    <textarea id="editMotivo" name="description" maxlength="250"></textarea>
                    <span id="editContador">0/250</span>
                </div>
                <p id="error2">Error</p>
                <button class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors" type="button"
                    id="guardarEventoButton">Guardar Cambios</button>
            </form>
        </div>
        <script>
            var actionUrlTemplate = '{{ route('asesorias.update', ':id') }}';
        </script>
        <div id="myModal4" class="modal-background">
            <form action="#" method="POST"
                class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias" id="borrarCita">
                <span class="close4">&times;</span>
                @csrf
                @method('DELETE')
                <h2 class="pb-[20px]">¿Esta seguro?</h2>
                <button class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors" type="button"
                    id="borrarEventoBoton">Borrar cita</button>
            </form>
        </div>
        <script>
            var actionDeleteUrlTemplate = '{{ route('asesorias.destroy', ':id') }}';
        </script>
        <div id="myModal" class="modal-background">
            <div class="modal-content-asesorias">
                <span class="close">&times;</span>
                <p>Seleccione un proyecto:</p>
                <select id="nombre">
                    <option value="0">-- Escoge un proyecto --</option>
                    @foreach ($Projects as $proyect)
                        <option value="{{ $proyect->id }}">{{ $proyect->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
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

        <form class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] mt-[10px] ocultar" id="asesorias-formulario"
            action="{{ route('asesorias.store') }}" method="POST">
            @csrf
            <h4>Agregar una sesion de asesoria</h4>
            <p>Fecha</p>
            <input type="date" id="fecha" name="session_date">
            <p>Hora</p>
            <input type="time" id="horas" name="hora">
            <p>Proyecto:</p>
            <select id="matricula" name="id_project_id">
                <option value="0">-- Escoge un proyecto --</option>
                @foreach ($Projects as $proyect)
                    <option value="{{ $proyect->id }}">{{ $proyect->name }}</option>
                @endforeach
            </select>
            <input type="number" class="hidden" name="id_advisor_id" value="{{ auth()->user()->id }}" />
            <p>Motivo de asesoria</p>
            <span class="motivo">
                <textarea id="motivo" name="description" maxlength="250"></textarea>
                <p id="contador"></p>
            </span>
            <p id="error">Error</p>
            <button type="button" id="agregarEventoButton"
                class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors">Crear cita</button>
        </form>
        <div id="eventosContainer" class="w-full lg:w-[20%] ">
            <h2>Citas próximas</h2>
            <table>
                <thead>
                    <tr>
                        <th>
                            <div>Proyecto</div>
                        </th>
                        <th>
                            <div>Fecha</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sessionsThisWeek as $session)
                        <tr>
                            <td>{{ $session->proyect->name_project ?? 'Proyecto no especificado' }}</td>
                            <td>{{ \Carbon\Carbon::parse($session->session_date)->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">No hay eventos esta semana.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
