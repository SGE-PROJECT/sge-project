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
        <aside class="proyectos">
            @forelse($students as $student)
                <div>
                    <article>
                        <img src={{ "/images/".$student->user->avatar }} class="icono" alt="imagen" />
                        <h3>{{$student->user->name}}</h3>
                        <p class="des">Matricula: {{ $student->registration_number }}</p>
                        <p class="des">Grupo: {{ $student->group->name }}</p>
                        <p class="des">Proyecto: {{ $student->projects[0]->name_project }} </p>
                        <span class="elem">
                            <a href="" class="rojo">Sancionar</a>
                            <a href={{ route('reporte', ['id' => auth()->user()->slug,'alumno' => $student->user->slug]) }}>Calificar</a>
                        </span>
                    </article>
                </div>
            @empty
                <h3 class="text-[27px]">No tienes ningun asesorado</h3>
            @endforelse


        </aside>
    </main>
@endsection
