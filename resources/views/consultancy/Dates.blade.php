@extends('layouts.panel')

@section('titulo', 'Asesorias')

@section('contenido')
<main class="vista_asesorias">
    <div id="myModal" class="modal-background">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Seleccione un alumno:</p>
            <select id="nombre">
                <option value="22393172">Alonso</option>
                <option value="22393173">Juan</option>
                <option value="22393174">Emma</option>
                <option value="22393175">Cochi</option>
                <option value="22393176">Leyva</option>
            </select>
        </div>
    </div>
    <div class="calendar-container" id="calendario">
        <select id="month" class="select-mes text-[30px] md:text-[40px]">
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
        <select id="year" class="select-mes text-[30px] md:text-[40px]">
            <!-- Los años se generarán dinámicamente -->
        </select>
        <div id="calendar"></div>
    </div>

    <div class="ocultar w-[100%] sm:w-[65%] flex flex-wrap relative py-5 justify-center" id="dia">
        <button class="absolute top-0 md:top-[0px] lg:top-[10px] left-[20px] font-bold text-[20px] md:text-[25px]" id="volverButton"><i class="nf nf-cod-arrow_left"></i></button>
        <h3 class="w-full select-mes text-center text-[30px] md:text-[40px]" id="hora"></h3>
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
                        <th class="horas">12:00 P.M</th>
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

    <div class="asesorias-formulario w-[90%] sm:w-[20%]">
        <h4>Agregar una sesion de asesoria</h4>
        <p>Fecha</p>
        <input type="date" id="fecha">
        <p>Hora</p>
        <input type="time" id="horas">
        <p>Matricula</p>
        <input type="number" id="matricula" maxlength="10">
        <p>Motivo de asesoria</p>
        <input type="text" id="motivo" maxlength="250">
        <p id="error">Error</p>
        <button id="agregarEventoButton">Crear sesion</button>
    </div>
    <div id="eventosContainer">
        <h2>Eventos Programados</h2>
        <span>
            <table id="tablaEventos">
            <thead>
                <tr>
                    <th><div>Matrícula</div></th>
                    <th><div>Nombre</div></th>
                    <th><div>Motivo</div></th>
                    <th><div>Hora</div></th>
                    <th><div>Fecha</div></th>
                    <th><div>Acción</div></th> <!-- Nuevo encabezado para el botón de eliminar -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
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
</main>
@endsection