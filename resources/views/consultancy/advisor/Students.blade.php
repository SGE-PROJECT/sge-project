@extends('layouts.panelUsers')

@section('titulo', 'Asesorados')

@section('css')
    @vite('resources/css/advisory/asesorados.css')
@endsection

@section('contenido')
    @if ($slug !== auth()->user()->slug)
        {{ abort(404) }}
    @endif
    <main class="vista_asesorados">
        <div id="myModal" class="modal-background">
            <form action="#" method="POST"
                class="asesorias-formulario w-[90%] sm:w-[20%] m-[20px] md:mt-[85px] modal-asesorias" id="borrarCita">
                <span class="close">&times;</span>
                @csrf
                @method('PUT')
                <h2 class="pb-[10px]">¿Esta seguro?</h2>
                <p class="">Una vez sancionado un alumno la sancion no se podra eliminar.</p>
                <textarea id="editMotivo" name="message" maxlength="250" placeholder="Motivo de la sancion"></textarea>
                <span id="editContador">0/250</span>

                <div class="mt-2">
                    <div id="opcion1">
                        <label for="tradicional" class="inline-flex items-center">
                            <input type="radio" id="tradicional" name="tipo" value="asesor" checked
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                            <span class="ml-2 text-sm text-gray-700">Asesor Academico</span>
                        </label>
                    </div>

                    <div id="opcion2">
                        <label for="excelencia" class="inline-flex items-center">
                            <input type="radio" id="excelencia" name="tipo" value="empresarial"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                            <span class="ml-2 text-sm text-gray-700">Asesor Empresarial</span>
                        </label>
                    </div>
                </div>
                <input type="number" id="horas" name="horas" class="hidden rounded border-gray-300 text-indigo-600 shadow-sm border-2 px-1 py-1"
                    placeholder="Numero de horas de servicio" min="10" max="20">
                    <p id="error2">Error</p>
                <button class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors" type="button"
                    id="borrarEventoBoton" onclick="eliminarEvento2()">Sancionar</button>
            </form>
        </div>
        <script>
            var actionDeleteUrlTemplate = '{{ route('sancionar', ':id') }}';
        </script>
        <header class="asesorias-opciones block md:flex">
            <h3 class="titulo">Tus asesorados:</h3>

        </header>
        <aside class="proyectos" id="proyecto">
            @php
                use App\Models\Report;
            @endphp
            @forelse($students as $student)
                <div>
                    <article>
                        <img src={{ '/' . $student->user->photo }} class="icono" alt="imagen" />
                        <h3><a
                                href="{{ route('profile.student', ['userId' => $student->user->id]) }}">{{ $student->user->name }}</a>
                        </h3>
                        <p class="des">Matricula: {{ $student->registration_number }}</p>
                        <p class="des">Grupo: {{ $student->group->name }}</p>
                        <p class="des">Proyecto: @if (!empty($student->projects) && count($student->projects) > 0)
                                {{ $student->projects[0]->name_project }} </p>
                    @else
                        Ningun proyecto
            @endif
            <p class="des">No. Sanciones Academicas: {{ $student->sanction_advisor }} </p>
            <p class="des">No. Sanciones Empresariales: {{ $student->sanction_company }} </p>
            <span class="elem mb-3">
                @if ($student->sanction_advisor < 3 || $student->sanction_company < 3)
                    <button
                        onclick="sancionar({{ $student->id }}, {{ $student->sanction_advisor }}, {{ $student->sanction_company }})"
                        href="" class="rojo" tabindex="1">Sancionar</button>
                @endif
                <a tabindex="1"
                    href={{ route('reporte', ['id' => auth()->user()->slug, 'alumno' => $student->user->slug]) }}>Calificar</a>
            </span>
            @php
                $report = Report::where('correo_asesor', auth()->user()->email)
                    ->where('matricula', $student->registration_number)
                    ->get();
            @endphp
            @if (!$report->isEmpty())
                <a href="{{ route('exportarReporte', ['correo' => auth()->user()->email, 'matricula' => $student->registration_number]) }}"
                    onclick='() => {
                            var formularios = document.querySelectorAll("form");
                            formularios.forEach(function(formulario) {
                                var botones = formulario.querySelectorAll("button");
                                botones.forEach(function(boton) {
                                    boton.disabled = true;
                                });
                            });
                        }'
                    class="font-bold inline-block w-full h-[37px] text-center bg-[#4ea24e] text-white px-6 py-2 rounded hover:bg-[#389738] transition-colors">Generar
                    reporte</a>
            @endif
            </article>
            </div>
        @empty
            <h3 class="text-[27px]">No tienes ningun asesorado</h3>
            @endforelse


        </aside>
        <script>
            var eliminarId = 1;
            var asesor = 0;
            var empresarial = 0;

            function llenarContenedor() {
                var contenedor = document.getElementById('proyecto');
                var contenedorWidth = contenedor.clientWidth;
                var hijos = contenedor.children;
                for (var i = hijos.length - 1; i >= 0; i--) {
                    if (hijos[i].style.opacity === '0') {
                        contenedor.removeChild(hijos[i]);
                    }
                }
                var numHijos = contenedor.children.length;
                var espacioDisponible = contenedorWidth - ((numHijos) * 40) - (numHijos * 300) - 40;
                if (espacioDisponible > 0) {
                    var numDivs = Math.floor(espacioDisponible / 300);
                    for (var j = 0; j < numDivs; j++) {
                        var divOculto = document.createElement('div');
                        divOculto.style.opacity = '0';
                        divOculto.style.width = '100%';
                        contenedor.appendChild(divOculto);
                    }
                }
            }

            function closeModal() {
                document.getElementById("myModal").style.display = "none";
                document.getElementById("editMotivo").value = "";
                document.getElementById("editContador").textContent = 0 + "/250";
                let error = document.getElementById("error2");
                error.style.display = "none";
            }

            function sancionar(id, sasesor, sempresarial) {
                eliminarId = id;
                empresarial = sempresarial;
                asesor = sasesor;
                var inputNumeroHoras = document.getElementById("horas");
                if (asesor > 2) {
                    document.getElementById("opcion1").style.display = "none";
                    document.getElementById("excelencia").checked = true;
                }
                if (empresarial > 2) {
                    document.getElementById("opcion2").style.display = "none";
                    document.getElementById("tradicional").checked = true;
                }
                if (asesor === 1) {
                    inputNumeroHoras.style.display = "block";
                }
                if (empresarial === 1 && asesor > 2) {
                    inputNumeroHoras.style.display = "block";
                }
                document.getElementById("myModal").style.display = "flex";
            }

            function eliminarEvento2() {
                let id = eliminarId;
                var error = document.getElementById("error2");
                error.style.display = "none";
                if (document.getElementById('editMotivo').value.length === 0) {
                    error.style.display = "block";
                    error.innerHTML = "Es necesario agregar el motivo.";
                    return;
                }
                let radio1 = document.getElementById("tradicional");
                let radio2 = document.getElementById("excelencia");
                if(((asesor === 1 && radio1.checked)||(empresarial===1 && radio2.checked))&& document.getElementById('horas').value.length === 0){
                    error.style.display = "block";
                    error.innerHTML = "Es necesario agregar las horas.";
                    return;
                }
                if (parseInt(document.getElementById('horas').value) < 10 || parseInt(document.getElementById('horas').value) > 20) {
                    error.style.display = "block";
                    error.innerHTML = "Solo se pueden agregar de 10 a 20 horas de servicio.";
                    return;
                }
                var formulario = document.getElementById('borrarCita');
                var actionUrl = actionDeleteUrlTemplate.replace(':id', id);
                formulario.action = actionUrl;
                document.getElementById("myModal").style.display = "none";
                formulario.submit();
                desactivarBotones();
            }

            window.addEventListener('load', () => {
                llenarContenedor();
                document.getElementById("editContador").textContent = 0 + "/250";
                document.querySelector('.close').addEventListener('click', closeModal);
                document.getElementById('editMotivo').addEventListener('input', function() {
                    this.value = this.value.replace(/^[\W_]+|^ <>/, '');
                    var contador = document.getElementById("editContador");
                    if (this.value.length > 250) {
                        this.value = this.value.slice(0, 250);
                    }
                    contador.textContent = document.getElementById('editMotivo').value.length + "/250";
                });
            });
            window.addEventListener('resize', () => llenarContenedor());

            function desactivarBotones() {
                var formularios = document.querySelectorAll('form');
                formularios.forEach(function(formulario) {
                    var botones = formulario.querySelectorAll('button');
                    botones.forEach(function(boton) {
                        boton.disabled = true;
                    });
                });
            }
            var radios = document.querySelectorAll('input[type=radio][name="tipo"]');
            radios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    var inputNumeroHoras = document.getElementById("horas");
                    inputNumeroHoras.value=null;
                    if (this.value === "asesor" && asesor === 1) {
                        inputNumeroHoras.style.display = "block";
                    } else if (this.value === "empresarial" && empresarial === 1) {
                        inputNumeroHoras.style.display = "block";
                    } else {
                        inputNumeroHoras.style.display = "none";
                    }
                });
            });
        </script>
    </main>
@endsection
