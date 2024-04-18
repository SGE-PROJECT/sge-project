@extends('layouts.panelUsers')

@section('titulo', 'Asesorados')

@section('css')
    @vite('resources/css/advisory/asesorados.css')
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
    @if (session('delete'))
        <div class="bg-[#EF4444f0] block md:inline text-white text-center p-2 fixed bottom-10 rounded right-0 md:right-10 z-50 shadow-lg noti"
            id="noti">
            <i class="nf nf-fa-check_circle mr-2"></i>
            {{ session('delete') }}
        </div>
    @endif
    <script>
        setTimeout(() => {
            document.getElementById("noti").classList.add("ocultarNoti");
        }, 4000);
    </script>
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
                <input type="number" id="horas" name="horas"
                    class="hidden rounded border-gray-300 text-indigo-600 shadow-sm border-2 px-1 py-1"
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
            <span class="w-full md:w-fit flex flex-wrap gap-3">
                <a href="{{route('activities')}}" class="bg-[#00ab84] w-full md:w-fit text-white px-2 py-1 rounded transition-colors flex items-center justify-center">Actividades</a>
                <a href="{{ route('exportarReporte', ['correo' => auth()->user()->email]) }}"
                    onclick='() => {
                        var formularios = document.querySelectorAll("form");
                        formularios.forEach(function(formulario) {
                            var botones = formulario.querySelectorAll("button");
                            botones.forEach(function(boton) {
                                boton.disabled = true;
                            });
                        });
                    }'
                    class="font-bold inline-block w-full md:w-fit h-[37px] text-center bg-[#4ea24e] text-white px-6 py-2 rounded hover:bg-[#389738] transition-colors">Generar
                    reporte</a>
            </span>
        </header>
        <aside class="proyectos" id="proyecto">
            @php
                use App\Models\Report;
            @endphp

            @forelse($students as $student)
                <div class="bg-white shadow-md rounded-lg w-full overflow-hidden">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-2 px-4">
                        <a href="{{ route('profile.student', ['userId' => $student->user->id]) }}">
                            <h2 class="text-xl font-semibold text-white mb-2">{{ $student->user->name }}
                                </h2>
                        </a>
                    </div>
                    <div class="p-4 flex wrap justify-center ">
                        @php
                            $color = 'bg-lime-100 ';
                            $colorLetra = 'text-[#444]';
                            $colorFondo = 'bg-lime-200';
                            $colorIcono = 'text-lime-500 nf-fa-check_circle';
                            $color2 = 'bg-lime-100 ';
                            $colorLetra2 = 'text-[#pb444]';
                            $colorFondo2 = 'bg-lime-200';
                            $colorIcono2 = 'text-lime-500 nf-fa-check_circle';
                            $academic = $student->sanction_advisor;
                            $company = $student->sanction_company;
                            if ($academic > 0) {
                                $color = 'bg-yellow-100';
                                $colorFondo = 'bg-yellow-200';
                                $colorIcono = 'text-yellow-500 nf-fa-warning girar';
                            }
                            if ($academic > 1) {
                                $color = 'bg-red-100';
                                $colorFondo = 'bg-red-200';
                                $colorIcono = 'text-red-500 nf-fa-warning girar';
                            }
                            if ($academic > 2) {
                                $color = 'bg-gray-100';
                                $colorFondo = 'bg-gray-200';
                                $colorIcono = 'text-gray-500 nf-fa-skull';
                                $colorLetra = 'text-gray-800';
                            }
                            if ($company > 0) {
                                $color2 = 'bg-yellow-100';
                                $colorFondo2 = 'bg-yellow-200';
                                $colorIcono2 = 'text-yellow-500 nf-fa-warning girar';
                            }
                            if ($company > 1) {
                                $color2 = 'bg-red-100';
                                $colorFondo2 = 'bg-red-200';
                                $colorIcono2 = 'text-red-500 nf-fa-warning girar';
                            }
                            if ($company > 2) {
                                $color2 = 'bg-gray-100';
                                $colorFondo2 = 'bg-gray-200';
                                $colorIcono2 = 'text-gray-500 nf-fa-skull';
                                $colorLetra2 = 'text-gray-800';
                            }
                        @endphp


                        <div class="w-full max-w-sm bg-white">

                            <div class="flex flex-col items-center">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src={{ '/' . $student->user->photo }}
                                    alt="Bonnie image" />
                                <a href="{{ route('profile.adviser', ['id' => 1]) }}">
                                    <h5 class="mb-1 text-xl font-semibold text-[#00ab84]">
                                        @if (!empty($student->projects) && count($student->projects) > 0)
                                            {{ $student->projects[0]->name_project }}
                                        @else
                                            Ningun proyecto
                                        @endif
                                    </h5>
                                </a>
                                <span class="text-lg text-gray-500 mb-2">{{ $student->group->name }} - {{ $student->registration_number }}</span>

                                <div id="toast-default"
                                    class="flex items-center w-full p-2 text-gray-500 {{ $color }} rounded-lg shadow mb-3"
                                    role="alert">
                                    <div
                                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 {{ $colorFondo }} rounded-lg ">

                                        <i class='nf {{ $colorIcono }}' id="asesor"></i>
                                        <span class="sr-only">Fire icon</span>
                                    </div>
                                    <div class="ms-3 text-sm font-normal {{ $colorLetra }}">Tiene
                                        {{ $student->sanction_advisor }}
                                        {{ $student->sanction_advisor == 1 ? 'sancion academica.' : 'sanciones academicas.' }}
                                    </div>


                                </div>
                                <div id="toast-default"
                                    class="flex items-center w-full mb-3 p-2 text-gray-500 {{ $color2 }} rounded-lg shadow "
                                    role="alert">
                                    <div
                                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 {{ $colorFondo2 }} rounded-lg ">
                                        <i class='nf {{ $colorIcono2 }} ' id="empresa"></i>
                                        <span class="sr-only">Icon</span>
                                    </div>
                                    <div class="ms-3 text-sm font-normal {{ $colorLetra2 }}">Tiene
                                        {{ $student->sanction_company }}
                                        {{ $student->sanction_company == 1 ? 'sancion empresarial.' : 'sanciones empresariales.' }}
                                    </div>
                                </div>
                                <span class="elem mb-3">
                                    @if ($student->sanction_advisor < 3 || $student->sanction_company < 3)
                                        <button
                                            onclick="sancionar({{ $student->id }}, {{ $student->sanction_advisor }}, {{ $student->sanction_company }})"
                                            href="" class="rojo" tabindex="1">Sancionar</button>
                                    @endif
                                    <a tabindex="1"
                                        href={{ route('reporte', ['id' => auth()->user()->slug, 'alumno' => $student->user->slug]) }}>Calificar</a>
                                </span>

                            </div>
                        </div>

                    </div>
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
                if (((asesor === 1 && radio1.checked) || (empresarial === 1 && radio2.checked)) && document.getElementById(
                        'horas').value.length === 0) {
                    error.style.display = "block";
                    error.innerHTML = "Es necesario agregar las horas.";
                    return;
                }
                if (parseInt(document.getElementById('horas').value) < 10 || parseInt(document.getElementById('horas').value) >
                    20) {
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
                    inputNumeroHoras.value = null;
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
