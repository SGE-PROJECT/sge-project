@extends('layouts.panel')

@section('titulo', 'Asesorias')

@section('contenido')
<main class="vista_asesorias">
    @php
    $projectsData = $Projects->mapWithKeys(function ($project) {
    return [$project->id => [
    'id' => $project->id,
    'nombre' => $project->name,
    'descripcion' => json_decode($project->general_information)->detail ?? 'Descripción no disponible',
    'alumnos' => $project->students->pluck('id')->all(),
    'imagen' => $project->image,
    ]];
    });
    @endphp
    <script>
        var proyectos = @json($projectsData);
    </script>
    @php
    use Carbon\Carbon;
    $sessionsData = collect($sessions)->map(function ($session) {
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
    })->toJson();
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

    <div class="BtnCrearDivisions botonVereventos relative lg:absolute mr-[20px] lg:mr-[75px]" id="student-contbtnCitas">
        <button class="Btn_divisions bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors"
            id="student-cambiarCita">
            <span class="Btntext_divisions">Cambiar<b>-</b>cita</span>
            <span class="svgIcon_divisions">
                <i class="nf nf-md-update"></i>
            </span>
        </button>
    </div>
    <div id="student-myModal3" class="modal-background">
        <form class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias">
            <span class="close3">&times;</span>
            @csrf
            <h2>Solicitar cambio de cita</h2>
            <div class="form-group">
                <label for="solitAsunto">Asunto:</label>
                <input name="asunto" maxlength="250" id="student-solitAsunto" placeholder="Asunto de la solicitud">
            </div>
            <div class="form-group">
                <label for="solitMensaje">Mensaje:</label>
                <textarea name="mensaje" maxlength="250" id="student-solitMensaje"
                    placeholder="Justificacion de la solicitud"></textarea>
            </div>
            <button class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors" type="submit"
                id="student-solicitar">Solicitar cambio</button>
        </form>
    </div>
    <div class="calendar-container w-full lg:w-[60%] relative z-20" id="student-calendario">
        <select id="student-month" class="select-mes text-[30px] md:text-[40px]">
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
        <select id="student-year" class="select-mes text-[30px] md:text-[40px]">
            <!-- Los años se generarán dinámicamente -->
        </select>
        <div id="student-calendar" class=""></div>
    </div>

    <div class="ocultar w-[100%] sm:w-[65%] flex flex-wrap relative py-10 justify-center" id="student-dia">
        <button class="absolute top-0 md:top-[0px] lg:top-[10px] left-[20px] font-bold text-[20px] md:text-[25px]"
            id="student-volverButton"><i class="nf nf-cod-arrow_left text-[20px]"></i></button>
        <h3 class="w-full select-mes text-center text-[30px] md:text-[40px]" id="student-hora"></h3>
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

    <div id="student-eventosContainer"
        class="w-full md:w-[20%] lg:w-[30%] ml-[20px] mr-[20px] mt-[20px] mb-[20px] lg:ml-[0px] lg:mr-[20px] lg:mt-[85px]">
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
                    <td>{{ $session->proyect->name ?? 'Proyecto no especificado' }}</td>
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
    </span>
    </span>

    @php

    $sessionsData = $sessions->map(function ($session) {
    $sessionDate = Carbon::parse($session->session_date);

    return [
    'proyectoId' => $session->proyect->id ?? null,
    'nombreProyecto' => $session->proyect->name ?? 'Proyecto no especificado',
    'alumnos' => optional($session->proyect->students)->pluck('name')->all() ?? [],
    'motivo' => $session->description ?? '',
    'fecha' => $sessionDate->format('Y-m-d'),
    'hora' => $sessionDate->format('H:i'),
    'id' => $session->id,
    ];
    })->toArray();
    @endphp

    <script>
        var sessions = @json($sessionsData, JSON_PRETTY_PRINT);
    </script>
</main>
@endsection