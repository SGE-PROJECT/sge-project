@extends('layouts.panelUsers')

@section('titulo', 'Actividades')

@section('css')
    @vite('resources/css/advisory/asesoriasStudents.css')
@endsection

@section('contenido')
    <main class="vista_asesorias">
        <div id="myModal" class="modal-background">
            <form class="asesorias-formulario relative w-[40%] m-[20px] mt-[10px] max-w-[400px]" id="asesorias-formulario"
                action="{{ route('activitiesCreate') }}" method="POST">
                @csrf
                <span class="close5" onclick="cerrarAgregar()">&times;</span>
                <h4>Agregar una actividad</h4>
                <p>Fecha</p>
                <input type="date" id="fecha" name="date">
                <input type="number" class="hidden" name="id_advisor_id"
                    value="{{ auth()->user()->academicAdvisor->id }}" />
                <p>Nombre</p>
                <span class="motivo mb-3">
                    <input id="name" name="name" maxlength="250"></input>
                </span>
                <p id="error">Error</p>
                <button type="button" id="agregarEventoButton" onclick="agregarGuardar()"
                    class="bg-[#00ab84] text-white px-2 py-1 mt-3 rounded transition-colors">Crear actividad</button>
            </form>
        </div>

        <div id="myModal2" class="modal-background">
            <form action="#" method="POST"
                class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias" id="editarCita">
                <span class="close2" onclick="cerrarEdit()">&times;</span>
                @csrf
                <h2>Editar actividad</h2>
                <p>Fecha</p>
                <input type="date" id="fechaEdit" name="date">
                <input type="number" class="hidden" name="id_advisor_id"
                    value="{{ auth()->user()->academicAdvisor->id }}" />
                <p>Nombre</p>
                <span class="motivo mb-3">
                    <input id="nameEdit" name="name" maxlength="250"></input>
                </span>
                <p id="error2">Error</p>
                <button class="bg-[#00ab84] text-white px-2 py-1 rounded transition-colors" type="button"
                    id="guardarEventoButton" onclick="editarGuardar()">Guardar Cambios</button>
            </form>
        </div>
        <script>
            var actionUrlTemplate = '{{ route('activitiesEdit', ':id') }}';
        </script>
        <div id="myModal4" class="modal-background">
            <form action="#" method="POST"
                class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias" id="borrarCita">
                <span class="close4" onclick="cerrarDelete()">&times;</span>
                @csrf
                <h2 class="pb-[20px]">¿Esta seguro?</h2>
                <button class="bg-[#00ab84] text-white px-2 py-1 rounded transition-colors" type="button"
                    onclick="eliminarGuardar()" id="borrarEventoBoton">Borrar cita</button>
            </form>
        </div>
        <script>
            var actionDeleteUrlTemplate = '{{ route('activitiesDelete', ':id') }}';
        </script>
        <header class="asesorias-opciones block md:flex">
            <span class="hora-asesorias ">
                <a href="{{ route('asesorados', ['id' => auth()->user()->slug]) }}"
                    class="top-0 md:top-[0px] bg-[#00ab84] rounded px-2 text-[#fff] font-bold text-[20px] md:text-[25px]  transition-colors flex items-center"
                    id="student-volverButton"><i class="nf nf-cod-arrow_left text-[20px]"></i></a>
                <h3 class="w-full select-mes text-center text-[30px]" id="student-hora">Actividades</h3>
            </span>
            <div class="BtnCrearDivisions botonVereventos " id="student-contbtnCitas">
                <button onclick="agregar()"
                    class="Btn_divisions bg-[#00ab84]  text-white px-2 py-1 rounded transition-colors"
                    id="student-cambiarCita">
                    <span class="Btntext_divisions">Agregar<b>-</b>actividad</span>
                    <span class="svgIcon_divisions">
                        <i class="nf nf-oct-diff_added"></i>
                    </span>
                </button>
            </div>
        </header>
        <div class=" w-[100%] sm:w-[65%] flex flex-wrap relative justify-center" id="student-dia">
            <div id="student-dia2">
                <table>
                    <thead>
                        <tr>
                            <th>Actividad</th>
                            <th class="horas">Fecha</th>
                            <th class="horas">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Carbon\Carbon;
                        @endphp
                            @forelse ($activities as $activitie)
                                @php
                                    $Date = Carbon::parse($activitie->date);
                                    $fecha = $Date->format('d-m-Y');
                                @endphp
                                <tr>
                                    <td>{{ $activitie->name }}</td>
                                    <td class="w-[100px]">{{ $fecha }}</td>
                                    <td >
                                        <div class="block md:flex px-2 py-2 gap-2">
                                            <button href="" type="button"
                                                onclick="editar('{{ $activitie->date }}', '{{ $activitie->name }}', '{{ $activitie->id }}')"
                                                class="bg-blue-500 mb-2 md:mb-0 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                                <i class='bx bx-edit-alt'></i>
                                                Editar
                                            </button>
                                            <button type="button" onclick="eliminar({{ $activitie->id }})"
                                                class=" bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none">
                                                <i class='bx bx-trash'></i>
                                                Eliminar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        @empty
                            <tr>
                                <td colspan="3"><p class="p-3">Ninguna actividad encontrada</p></td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>

            </div>
        </div>
    </main>
    <script>
        var fecha = "",
            nombre = "",
            id = "";

        function agregar() {
            document.getElementById("myModal").style.display = "flex";
        }

        function cerrarAgregar() {
            document.getElementById("myModal").style.display = "none";
            document.getElementById("fecha").value = " ";
            document.getElementById("name").value = " ";
            let error = document.getElementById("error");
            error.style.display = "none";
        }

        function agregarGuardar() {
            document.getElementById("agregarEventoButton").disabled = true;
            let error = document.getElementById("error");
            let form = document.getElementById("asesorias-formulario");
            error.style.display = "none";
            let fecha = document.getElementById('fecha').value.trim();
            let nombre = document.getElementById('name').value.trim();
            if (!fecha || !nombre) {
                error.style.display = "block";
                error.innerHTML = "Por favor, complete todos los campos.";
                document.getElementById("agregarEventoButton").disabled = false;
                return;
            }
            if (!/^\d{4}-\d{2}-\d{2}$/.test(fecha)) {
                error.style.display = "block";
                error.innerHTML = "Por favor, ingrese una fecha válida en formato AAAA-MM-DD.";
                document.getElementById("agregarEventoButton").disabled = false;
                return;
            }
            let now = new Date();
            let currentYear = now.getFullYear();
            let currentMonth = now.getMonth() + 1;
            let currentDay = now.getDate();
            let currentHour = now.getHours();
            let currentMinute = now.getMinutes();
            let eventDate = new Date(fecha);
            let eventYear = eventDate.getFullYear();
            let eventMonth = eventDate.getMonth() + 1;
            let eventDay = eventDate.getDate();
            if (eventYear < currentYear || (eventYear === currentYear && eventMonth < currentMonth) ||
                (eventYear === currentYear && eventMonth === currentMonth && eventDay < currentDay)) {
                error.style.display = "block";
                error.innerHTML = "La fecha de la actividad no puede ser anterior a la fecha actual.";
                document.getElementById("agregarEventoButton").disabled = false;
                return;
            }
            form.submit();
        }

        function editar(fech, nom, i) {
            fecha = fech;
            nombre = nom;
            id = i;
            document.getElementById("fechaEdit").value = fech;
            document.getElementById("nameEdit").value = nom;
            document.getElementById("myModal2").style.display = "flex";
        }

        function editarGuardar() {
            let fecha1 = document.getElementById("fechaEdit").value;
            let nombre1 = document.getElementById("nameEdit").value;
            let error = document.getElementById("error2");
            nombre1 = nombre1.trim();
            if (!fecha1 || !nombre1) {
                error.style.display = "block";
                error.innerHTML = "Por favor, complete todos los campos.";
                return;
            }
            if (!/^\d{4}-\d{2}-\d{2}$/.test(fecha1)) {
                error.style.display = "block";
                error.innerHTML = "Por favor, ingrese una fecha válida en formato AAAA-MM-DD.";
                return;
            }
            let now = new Date();
            let currentYear = now.getFullYear();
            let currentMonth = now.getMonth() + 1;
            let currentDay = now.getDate();
            let currentHour = now.getHours();
            let currentMinute = now.getMinutes();
            let eventDate = new Date(fecha1);
            let eventYear = eventDate.getFullYear();
            let eventMonth = eventDate.getMonth() + 1;
            let eventDay = eventDate.getDate();
            if (eventYear < currentYear || (eventYear === currentYear && eventMonth < currentMonth) ||
                (eventYear === currentYear && eventMonth === currentMonth && eventDay < currentDay)) {
                error.style.display = "block";
                error.innerHTML = "La fecha de la actividad no puede ser anterior a la fecha actual.";
                document.getElementById("agregarEventoButton").disabled = false;
                return;
            }
            if (fecha1 == fecha && nombre1 == nombre) {
                error.style.display = "block";
                error.innerHTML = "Los datos de la actividad son identicos.";
                return;
            }
            var formulario = document.getElementById('editarCita');
            var actionUrl = actionUrlTemplate.replace(':id', id);
            formulario.action = actionUrl;
            error.style.display = "none";
            formulario.submit();
            document.getElementById("myModal2").style.display = "flex";
        }

        function cerrarEdit() {
            document.getElementById("myModal2").style.display = "none";
            document.getElementById("error2").style.display = "none";
        }

        function eliminar(i) {
            id = i;
            document.getElementById("myModal4").style.display = "flex";
        }

        function eliminarGuardar() {
            var formulario = document.getElementById('borrarCita');
            var actionUrl = actionDeleteUrlTemplate.replace(':id', id);
            formulario.action = actionUrl;
            document.getElementById("myModal4").style.display = "none";
            formulario.submit();
        }

        function cerrarDelete() {
            document.getElementById("myModal4").style.display = "none";
        }
    </script>
@endsection
