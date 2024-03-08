@extends('layouts.panel')

@section('titulo', 'DashboardProjects')

@section('contenido')
    <div class="container-ProyectDashboard">
        <!-- Moví el enlace a la hoja de estilo dentro de la sección head -->
        <link rel="stylesheet" href="{{ asset('css/projects/projectDashboardStyle.css') }}">

        <div class="performance-meter">
            <a href="/vistaproyectos">
                <div class="carta-payment">
                    <div class="carta-header">
                        <div class="amount">

                            <div class="gauge">
                                <div class="gauge__body">
                                    <div class="gauge__fill"></div>
                                    <div class="gauge__cover"></div>
                                </div>
                            </div>
                            <h2 class="ctitulo">Proyectos</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="project-status">
            <!-- Título -->
            <div class="seccion-proyectos">
                <div class="seccion-titulo">
                    <span>Proyectos</span>
                    <hr>
                </div>

                <div class="num-proyectos">

                    <div class="estatus1">
                        <div class="estatus-indicador"></div>
                        <span>Activos</span>
                        <div class="barra-progreso-contenedor">
                            <div class="barra-progreso-relleno"></div>
                            <!-- Este es el que lleva el color y representa el progreso -->
                        </div>

                        <span class="estatus-numero">49</span>
                    </div>

                    <div class="estatus2">
                        <div class="estatus-indicador"></div>
                        <span>En proceso</span>
                        <div class="barra-progreso-contenedor">
                            <div class="barra-progreso-relleno"></div>
                            <!-- Este es el que lleva el color y representa el progreso -->
                        </div>

                        <span class="estatus-numero">49</span>
                    </div>

                    <div class="estatus3">
                        <div class="estatus-indicador"></div>
                        <span>Rechazados</span>
                        <div class="barra-progreso-contenedor">
                            <div class="barra-progreso-relleno"></div>
                            <!-- Este es el que lleva el color y representa el progreso -->
                        </div>

                        <span class="estatus-numero">49</span>
                    </div>

                    <div class="estatus4">
                        <div class="estatus-indicador"></div>
                        <span>Aceptados</span>
                        <div class="barra-progreso-contenedor">
                            <div class="barra-progreso-relleno"></div>
                            <!-- Este es el que lleva el color y representa el progreso -->
                        </div>

                        <span class="estatus-numero">49</span>
                    </div>

                </div>
            </div>
        </div>

        <h1 class="proyect-table-title">Proyectos</h1>
        <button class="Add-Proyect">Agregar</button>

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
                <tr>
                    <td><img src="{{ asset('images/avatar.jpg') }}" alt="Icono de Carpeta"
                            class="h-6 w-6 inline-block mr-2"> Project System
                    </td>
                    <td>Josue Chan, Guillermo Díaz</td>
                    <td><span class="status approved">Aprobado</span></td>
                    <td>Rafael Villegas</td>
                    <td>Software</td>
                    <td>SAT</td>
                    <td>
                        <!-- Íconos de acción -->
                        <div class="flex">
                            <i><img class="iconImage h-7 w-7" src="images/projects/edit.png"></i>
                            <i><img class="iconImage h-7 w-7" src="images/projects/view.png"></i>
                            <i><img class="iconImage h-7 w-7" src="images/projects/delete.png"></i>
                            <i class="icon download"></i>
                            <i class="icon more-options"></i>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
