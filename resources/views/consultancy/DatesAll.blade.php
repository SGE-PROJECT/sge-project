@extends('layouts.panelUsers')

@section('titulo', 'Asesorias')

@section('js')
    @vite('resources/js/asesoriasAll.js')
@endsection

@section('css')
    @vite('resources/css/advisory/asesorias.css')
@endsection

@section('contenido')
    @if ($slug !== auth()->user()->slug)
        {{abort(404);}}
    @endif
    <main class="vista_asesorias">
        @php
            $projectsData = $Projects->mapWithKeys(function ($project) {
                return [
                    $project->id => [
                        'id' => $project->id,
                        'nombre' => $project->name,
                        'descripcion' =>$project->description,
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
            <div class="BtnCrearDivisions botonVereventos todas  w-full " id="contbtnCitas2">
                <h3>Todas las citas</h3>
                <span class="gap-5 flex">
                <button class="Btn_divisions bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors"
                    id="botonCitas3">
                    <span class="Btntext_divisions">Agregar cita</span>
                    <span class="svgIcon_divisions">
                        <i class="nf nf-oct-diff_added"></i>
                    </span>
                </button>
                <a href="{{ route('asesorias', ['id' => auth()->user()->slug ]) }}" class="Btn_divisions bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors"
                    id="botonCitas2">
                    <span class="Btntext_divisions">Calendario</span>
                    <span class="svgIcon_divisions">
                        <i class="nf nf-oct-arrow_switch"></i>
                    </span>
                </a>
            </span>
            </div>
        </header>

        <div id="myModal" class="modal-background">
            <form class="asesorias-formulario w-[40%] m-[20px] mt-[10px] max-w-[400px]" id="asesorias-formulario"
                action="{{ route('asesorias.store') }}" method="POST">
                @csrf
                <span class="close5">&times;</span>
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
        </div>

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

        </span>
        <div id="eventosContainer2" class="mt-[50px] md:m-[20px]">
            <span>
                <table id="tablaEventos2">
                    <thead>
                        <tr>
                            <th>
                                <div>Proyecto</div>
                            </th>
                            <th>
                                <div>Alumnos</div>
                            </th>
                            <th>
                                <div>Asunto</div>
                            </th>
                            <th>
                                <div>Hora</div>
                            </th>
                            <th>
                                <div>Fecha</div>
                            </th>
                            <th>
                                <div>Accion</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
        </div>
        </span>

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
