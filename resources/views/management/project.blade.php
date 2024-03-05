@extends('layouts.panel')
@section('contenido')
<div class="grid-container">
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
    <button class="bg-[#03A696] hover:bg-[#025b52] text-white font-bold py-2 px-4 rounded ml-8 mt-10">
        Agregar
    </button>
    <div class="tabla-project">
        <div class="tabla-cont-project ">
            <table>
                <thead class="text-white font-bold bg-blue-003E61">
                    <tr>
                        <th>Proyecto</th>
                        <th>Equipo</th>
                        <th>Estado</th>
                        <th>Asesor A/E</th>
                        <th>Carrera</th>
                        <th>Empresa</th>
                    </tr>
                </thead>
                <tr>
                    <td>ProjectSync</td>
                    <td>SM53</td>
                    <td>Activo</td>
                    <td>Rafael Villegas</td>
                    <td>TSU Desarrollo de Software</td>
                    <td>DotNet</td>
                </tr>
                <tr>
                    <td>Green Garden</td>
                    <td>Dinamita</td>
                    <td>En proceso</td>
                    <td>Mayra Fuentes</td>
                    <td>TSU Desarrollo de Software</td>
                    <td>Turicun</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
