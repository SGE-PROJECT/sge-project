@extends('layouts.panelUsers')

@section('titulo', 'Asesorados')

@section('css')
    @vite('resources/css/advisory/asesorados.css')
@endsection

@section('contenido')
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
            <div class="BtnCrearDivisions botonVereventos" id="contbtnCitas">
                <a href="{{ route('asesoriasTodas', ['id' => auth()->user()->slug]) }}"
                    class="Btn_divisions bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-600 transition-colors flex items-center"
                    id="">
                    <span class="Btntext_divisions">Reporte de asesorias</span>
                </a>
            </div>
        </header>
        <aside class="proyectos" id="proyecto">
            @forelse($students as $student)
                <div>
                    <article>
                        <img src={{ "/".$student->user->photo }} class="icono" alt="imagen" />
                        <h3>{{$student->user->name}}</h3>
                        <p class="des">Matricula: {{ $student->registration_number }}</p>
                        <p class="des">Grupo: {{ $student->group->name }}</p>
                        <p class="des">Proyecto: {{ $student->projects[0]->name_project }} </p>
                        <p class="des">No. Sanciones: {{ $student->sanction }} </p>
                        <span class="elem">
                            @if ($student->sanction < 6)
                            <button onclick="sancionar({{ $student->id }})" href="" class="rojo" tabindex="1">Sancionar</button>
                            @endif
                            <a tabindex="1" href={{ route('reporte', ['id' => auth()->user()->slug,'alumno' => $student->user->slug]) }} >Calificar</a>
                        </span>
                    </article>
                </div>
            @empty
                <h3 class="text-[27px]">No tienes ningun asesorado</h3>
            @endforelse


        </aside>
        <script>
            var eliminarId = 1;
            function llenarContenedor() {
                var contenedor = document.getElementById('proyecto');
                var contenedorWidth = contenedor.clientWidth;
                console.log(contenedorWidth);
                var hijos = contenedor.children;
                for (var i = hijos.length - 1; i >= 0; i--) {
                    if (hijos[i].style.opacity === '0') {
                        contenedor.removeChild(hijos[i]);
                    }
                }
                var numHijos = contenedor.children.length;
                var espacioDisponible = contenedorWidth - ((numHijos ) * 40) - (numHijos * 300) - 40;
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
            function sancionar(id) {
                eliminarId = id;
                document.getElementById("myModal").style.display = "flex";
            }

            function eliminarEvento2() {
                let id = eliminarId;
                var error = document.getElementById("error2");
                error.style.display = "none";
                if (document.getElementById('editMotivo').value.length === 0 ) {
                    error.style.display = "block";
                    error.innerHTML = "Es necesario agregar el motivo.";
                    return;
                }
                var formulario = document.getElementById('borrarCita');
                var actionUrl = actionDeleteUrlTemplate.replace(':id', id);
                formulario.action = actionUrl;
                document.getElementById("myModal").style.display = "none";
                formulario.submit();
            }

            // Llama a la función cuando la página se carga o cuando el tamaño de la ventana cambia
            window.addEventListener('load', ()=>{
                llenarContenedor();
                document.getElementById("editContador").textContent = 0 + "/250";
                document.querySelector('.close').addEventListener('click', closeModal);
                document.getElementById('editMotivo').addEventListener('input', function () {
                this.value = this.value.replace(/^[\W_]+|^ <>/, '');
                var contador = document.getElementById("editContador");
                if (this.value.length > 250) {
                    this.value = this.value.slice(0, 250);
                }
                contador.textContent = document.getElementById('editMotivo').value.length + "/250";
            });
            });
            window.addEventListener('resize', ()=>llenarContenedor());
        </script>
    </main>
@endsection
