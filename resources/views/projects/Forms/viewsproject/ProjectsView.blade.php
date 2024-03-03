@extends('layouts.panel')

@section('titulo', 'vista de Proyectos')

@section('contenido')

    <div class="project-container">
        <!-- Imagen del Proyecto -->
        <div class="project-image">
            <img src="{{ asset('images/divisions/ec.png') }}" alt="Imagen del Proyecto">
        </div>
        <!-- Project Header -->
        <div class="project-header">
            <h2>Nombre del Proyecto</h2>
            <p>Estado del proyecto: Aprobado</p>
        </div>



        <!-- Project Body -->
        <div class="project-body">
            <p>Descripción</p>
            <textarea class="project-description"></textarea>

            <!-- Reaction buttons -->
            <div class="project-reactions">
                <button id="like-btn">&#x2764;</button> <!-- Heart emoji -->
                <button id="star-btn">&#x2B50;</button> <!-- Star emoji -->
                <button id="comment-btn">&#x1F4AC;</button> <!-- Comment emoji -->
            </div>

        @endsection
