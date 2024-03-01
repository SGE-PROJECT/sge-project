@extends('layouts.panel')
@section('contenido')
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
                        <th>Acción</th>
                    </tr>
                </thead>
                <tr>
                    <td>ProjectSync</td>
                    <td>SM53</td>
                    <td>Activo</td>
                    <td>Rafael Villegas</td>
                    <td>TSU Desarrollo de Software</td>
                    <td>DotNet</td>
                    <td>
                        <div class="small-img">
                        <img  src="{{ asset('icons/editar.svg') }}" alt="Editar">
                        <img  src="{{ asset('icons/eliminar.svg') }}" alt="Eliminar">
                        </div>
                    </td>
                </tr>                
                <tr>
                    <td>Hola</td>
                    <td>Hola</td>
                    <td>Hola</td>
                    <td>Hola</td>
                    <tbody>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection