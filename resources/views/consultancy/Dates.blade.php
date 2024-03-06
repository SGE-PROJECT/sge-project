@extends('layouts.panel')

@section('titulo', 'Asesorias')

@section('contenido')
<main class="vista_asesorias">
    <div class="BtnCrearDivisions botonVereventos relative md:absolute" id="contbtnCitas">
        <button class="Btn_divisions" id="cambiarCita">
            <span class="Btntext_divisions" >Cambiar<b>-</b>cita</span>
            <span class="svgIcon_divisions">
                <i class="nf nf-cod-mention"></i>
            </span>
        </button>
        <button class="Btn_divisions ml-[20px]" id="botonCitas">
            <span class="Btntext_divisions" >citas</span>
            <span class="svgIcon_divisions">
                <i class="nf nf-md-eye"></i>
            </span>
        </button>
    </div>
    <div class="BtnCrearDivisions botonVereventos relative md:absolute ocultar" id="contbtnCitas2">
        <button class="Btn_divisions" id="botonCitas2">
            <span class="Btntext_divisions" >Calendario</span>
            <span class="svgIcon_divisions">
                <i class="nf nf-md-eye"></i>
            </span>
        </button>
    </div>
    <div id="myModal2" class="modal-background">
        <div class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias">
            <span class="close2">&times;</span>
            <h2>Editar Cita</h2>
            <div class="form-group">
                <label for="editFecha">Fecha:</label>
                <input type="date" id="editFecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="editHora">Hora:</label>
                <input type="time" id="editHora" name="hora">
            </div>
            <div class="form-group">
                <label for="editMotivo">Motivo:</label>
                <input id="editMotivo" name="motivo" maxlength="250">
                <span id="editContador">0/250</span>
            </div>
            <p id="error2">Error</p>
            <button type="submit" id="guardarEventoButton">Guardar Cambios</button>
        </div>
    </div>
    <div id="myModal3" class="modal-background">
        <div class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias">
            <span class="close3">&times;</span>
            <h2>Solicitar cambio de cita</h2>
            <div class="form-group">
                <label for="solitAsunto">Asunto:</label>
                <input name="motivo" maxlength="250" id="solitAsunto" placeholder="Asunto de la solicitud">
            </div>
            <div class="form-group">
                <label for="solitMensaje">Mensaje:</label>
                <input  name="motivo" maxlength="250" id="solitMensaje" placeholder="Justificacion de la solicitud">
            </div>
            <p id="error2">Error</p>
            <button type="submit" id="solicitar">Solicitar cambio</button>
        </div>
    </div>
    
    <div id="myModal" class="modal-background">
        <div class="modal-content-asesorias">
            <span class="close">&times;</span>
            <p>Seleccione un proyecto:</p>
            <select id="nombre">
                <option value="22393172">Alonso</option>
                <option value="22393173">Juan</option>
                <option value="22393174">Emma</option>
                <option value="22393175">Cochi</option>
                <option value="22393176">Leyva</option>
                <option value="22393204">Guillermo</option>
            </select>
        </div>
    </div>
    <div class="calendar-container w-full lg:w-[60%]" id="calendario">
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
        <div id="calendar" class="overflow-x-scroll md:overflow-visible"></div>
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

    <div class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] ocultar" id="asesorias-formulario">
        <h4>Agregar una sesion de asesoria</h4>
        <p>Fecha</p>
        <input type="date" id="fecha">
        <p>Hora</p>
        <input type="time" id="horas">
        <p>Proyecto:</p>
            <select id="matricula">
                <option value="22393172">Alonso</option>
                <option value="22393173">Juan</option>
                <option value="22393174">Emma</option>
                <option value="22393175">Cochi</option>
                <option value="22393176">Leyva</option>
            </select>

        </datalist>
        <p>Motivo de asesoria</p>
        <span class="motivo">
            <input type="text" id="motivo" maxlength="250">
            <p id="contador"></p>
        </span>
        
        <p id="error">Error</p>
        <button id="agregarEventoButton">Crear cita</button>
    </div>
    <div id="eventosContainer" class="ml-[20px] mr-[20px] mt-[20px] mb-[20px] lg:ml-[0px] lg:mr-[20px] lg:mt-[85px] lg:mb-[0px]">
        <h2>Citas proximas</h2>
        <span>
            <table id="tablaEventos">
            <thead>
                <tr>
                    <th><div>Proyecto</div></th>
                    <th><div>Fecha</div></th>
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
    <div id="eventosContainer2" class="ocultar">
        <h2>Todas las citas</h2>
        <span>
            <table id="tablaEventos2">
            <thead>
                <tr>
                    <th><div>Proyecto</div></th>
                    <th><div>Alumnos</div></th>
                    <th><div>Asunto</div></th>
                    <th><div>Hora</div></th>
                    <th><div>Fecha</div></th>
                    <th><div>Accion</div></th>
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
</main>
@endsection
