@extends('layouts.panelUsers')

@section('titulo', 'Asesorados')

@section('css')
    @vite('resources/css/advisory/asesorados.css')
@endsection

@section('contenido')
    <main class="vista_asesorados">
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
                        <img src={{ "/images/".$student->user->avatar }} class="icono" alt="imagen" />
                        <h3>{{$student->user->name}}</h3>
                        <p class="des">Matricula: {{ $student->registration_number }}</p>
                        <p class="des">Grupo: {{ $student->group->name }}</p>
                        <p class="des">Proyecto: {{ $student->projects[0]->name_project }} </p>
                        <span class="elem">
                            <a href="" class="rojo" tabindex="1">Sancionar</a>
                            <a tabindex="1" href={{ route('reporte', ['id' => auth()->user()->slug,'alumno' => $student->user->slug]) }} >Calificar</a>
                        </span>
                    </article>
                </div>
            @empty
                <h3 class="text-[27px]">No tienes ningun asesorado</h3>
            @endforelse


        </aside>
        <script>
            function llenarContenedor() {
                var contenedor = document.getElementById('proyecto');
                var contenedorWidth = contenedor.clientWidth;
                var hijos = contenedor.children;
                var numHijos = hijos.length;
                var espacioDisponible = contenedorWidth - ((numHijos ) * 40) - (numHijos * 300) - 40;
                if (espacioDisponible > 0) {
                    var numDivs = Math.floor(espacioDisponible / 300);
                    for (var i = 0; i < numDivs; i++) {
                        var divOculto = document.createElement('div');
                        divOculto.style.opacity = '0';
                        divOculto.style.width = '100%';
                        contenedor.appendChild(divOculto);
                    }
                }
            }

            // Llama a la función cuando la página se carga o cuando el tamaño de la ventana cambia
            window.addEventListener('load', llenarContenedor);
            window.addEventListener('resize', llenarContenedor);
        </script>
    </main>
@endsection
