@extends('layouts.panel')

@vite('resources/css/administrator/dashboard.css')

@section('titulo', 'Dashboard')

@section('contenido')

<div class="flex flex-wrap justify-center items-center gap-5 p-5">
@include('administrator.card', ['number' => 12, 'name' => 'Proyectos'])
@include('administrator.card', ['number' => 86, 'name' => 'Usuarios'])
@include('administrator.card', ['number' => 79, 'name' => 'Empresas'])
@include('administrator.card', ['number' => 34, 'name' => 'Libros'])
</div>


<!--SECCION CARRERAS-->
<div class="flex flex-wrap gap-5 justify-center p-5">
    
    <div class="seccion-carreras">

        <div class="seccion-titulo">
            <span>Carreras</span>
            <hr>
        </div>

        <div class="cartas-carreras">
            <div class="carta-carrera">
                <h5>TI Desarrollo Software Multiplataforma</h5>
            </div>

            <div class="carta-carrera">
                <h5>TI Desarrollo Software Multiplataforma</h5>
            </div>

        </div>

    </div>

</div>

@endsection