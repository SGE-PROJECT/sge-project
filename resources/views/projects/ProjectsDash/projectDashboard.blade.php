@extends('layouts.panel')

@section('titulo', 'DashboardProjects')

@section('contenido')
    <div class="container-ProyectDashboard">
        <!-- Moví el enlace a la hoja de estilo dentro de la sección head -->
        <link rel="stylesheet" href="{{ asset('css/projects/projectDashboardStyle.css') }}">

        <div class="project-administrator-card">
            @include('administrator.graph-projects', ['number' => 12, 'name' => 'Proyectos'])
        </div>

        <div class="project-section-projects">
            @include('administrator.section-projects', ['number' => 12, 'name' => 'Proyectos'])
        </div>

        <h1 class="proyect-table-title">Proyectos</h1>
        <button class="project-add-Proyect"><a href="{{route('projectform')}}">Agregar</a></button>

        <table class="project-table">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Integrantes</th>
                    <th>Estado</th>
                    <th>Asesor</th>
                    <th>Carrera</th>
                    <th>Empresa</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Projects as $project)
                    <tr>
                        <td><img src="{{ asset('images/avatar.jpg') }}" alt="Icono de Carpeta"
                                class="h-6 w-6 inline-block mr-2">
                            {{ $project->name }}
                        </td>
                        <td>Josue Chan, Guillermo Díaz</td>
                        <td><span class="project-status">{{ $project->status }}</span></td>
                        <td>Rafael Villegas</td>
                        <td>Software</td>
                        <td>SAT</td>
                        <td>
                            <!-- Íconos de acción -->
                            <div class="flex">
                                <i><a href="#RUTA_EDITAR"><img class="project-iconImage h-7 w-7" src="images/projects/edit.png"></a></i>
                                <i><a href="#RUTA_VISTA_PROYECTOS"><img class="project-iconImage h-7 w-7" src="images/projects/view.png"></a></i>
                                <i><img class="project-iconImage h-7 w-7" src="images/projects/delete.png"></i>
                                <i class="icon download"></i>
                                <i class="icon more-options"></i>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="proyects-dash-links m-6">
        {{$Projects->links()}}
    </div>
@endsection
