@extends('layouts.panel')
@section('contenido')

<style>
    .container{
        margin-left: 2%;
        margin-right: 2%;
        /* border: 2px solid black; */
        border-top-left-radius:  15px;
        border-top-right-radius:  15px;
        width: 97%;
        background: #182749;

    }
    .grafica{
        width: 100%; 
        height: 100%;
    }
    .container__thead{
        
        padding-left: 10%;
        color: #000;
        display: flex;
        gap: 5%; 
    }
    .thead__p{
        padding:6px 0 6px ;
        padding:6px 4px 6px 4px;
        margin: 10px 0 10px; 
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        background: #eae7e7;
    }

    .container__datos{
        background: #fff;
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: space-between
    }
    .datos__student{
        width: 60%;
    }
    .datos_asesor{
        width: 70%;
    }
    .datos-encabezado{
        margin: 2%;
        color: #fff;
        display: flex;
        justify-content: space-evenly;
        background: #182749;
        /* padding-left: %; */
        gap: 10%;
    }
    .datos_flechas{
        display: block;
    }
</style>

{{-- <style>
    .table {
        display: table;
        border-collapse: collapse;
        width: 100%;
    }

    .row {
        display: table-row;
    }

    .cell {
        display: table-cell;
        border: 1px solid black;
        padding: 5px;
    }

    select {
        width: 100%;
        padding: 5px;
    }
</style>

<div class="table">
    <div class="row">
        <div class="cell"> <select>
            <option value="1">España</option>
            <option value="2">México</option>
            <option value="3">Argentina</option>
        </select></div>
        <div class="cell"> <select>
            <option value="1">España</option>
            <option value="2">México</option>
            <option value="3">Argentina</option>
        </select></div>
        <div class="cell"> <select>
            <option value="1">España</option>
            <option value="2">México</option>
            <option value="3">Argentina</option>
        </select></div>
    </div>
    <div class="row">
        <div class="cell">Juan</div>
        <div class="cell">25</div>
        <div class="cell">
            
        </div>
    </div>
    <div class="row">
        <div class="cell">María</div>
        <div class="cell">30</div>
        <div class="cell">
            
        </div>
    </div>
</div> --}}

{{-- Grafica --}}
<div class="ml-5 my-5">
@include('administrator.card',["number"=>12,"name"=>"equipos"])
</div>

{{-- container --}}
<div class="container">
    <div class="container__thead">
        <p class="thead__p">Carreras ^</p>
        <p class="thead__p">Empresas ^</p>
        <p class="thead__p">Integrantes ^</p>
    </div>
    {{-- datos tabla --}}
    <div class="container__datos">
        <div class="datos__student">
            <div class="datos-encabezado">
                <p>Equipo: <b>SM-53</b></p>
                <p>Proyecto: <b>Proyect Sync</b></p>
            </div>
        </div>
            <div class="datos_flechas">
               <p><--</p> 
                <p>--></p>
            </div>
        <div class="datos_asesor">
            
        </div>
    </div>
</div>


@endsection