@extends('layouts.panel')

@section('titulo', 'Vista de Proyectos')

@section('contenido')

<div class="project-container">
    <!-- Imagen del Proyecto -->
    <div class="project-image">
        <img src="{{ asset('images/divisions/ec.png') }}" alt="Imagen del Proyecto">
    </div>
    <!-- Project Header -->
    <div class="project-header">
        <h2>Nombre del Proyecto</h2>
        <div class="container-state">
            <p>Estado del proyecto:</p>
            <h1>Aprobado</h1>
        </div>
    </div>
    <!-- Project Body -->
    <div class="project-body">
        <p>Descripción</p>
        <textarea class="project-description"></textarea>

        <!-- Reaction buttons -->
        <div class="project-reactions">
            <button id="like-btn" class="unfilled">&#x2764;</button> <!-- Heart emoji -->
            <button id="star-btn">&#x2B50;</button> <!-- Star emoji -->
            <button id="comment-btn">&#x1F4AC;</button> <!-- Comment emoji -->
        </div>
    </div>
</div>

<!-- Modal para Comentarios - Fuera del .project-container -->
<div id="commentModal" class="modal">
    <!-- Contenido del modal -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-header">
            <img src="{{ asset('images/divisions/ts-profile.png') }}" alt="Avatar" class="avatar">
            <h2>Rafael Villegas Velasco</h2>
        </div>
        <textarea placeholder="Escribe un comentario..."></textarea>
        <div class="modal-footer">
            <button class="resolve-btn">Enviar</button>
        </div>
    </div>
</div>

<!-- Modal de Clasificación - Fuera del .project-container -->
<div id="starModal" class="star-modal">
    <!-- Contenido del modal -->
    <div class="star-modal-content">
        <span class="close-star">&times;</span>
        <h3>Calificación</h3>
        <!-- Contenedor de estrellas -->
        <div class="star-rating">
            @for ($i = 1; $i <= 5; $i++)
                <span class="star" data-value="{{ $i }}">&#9733;</span> <!-- Estrella -->
            @endfor
        </div>
    </div>
</div>

@endsection
