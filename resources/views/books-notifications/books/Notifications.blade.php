@extends('layouts.panel')

@section('titulo')
    Notificaciones
@endsection

@section('contenido')
    <div style="display: flex; flex-direction: column; align-items: center;"> <!-- Contenedor principal -->
        <h1 class="title-books"> - Notificaciones -</h1> <!-- Centrando el título -->
        <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
        
        <!-- Notificaciones -->
        <div class="notification" style="display: flex; align-items: center; justify-content: space-between; width: 60%;"> <!-- Utilizando Flexbox -->
            <div class="notification-text" style="margin-right: 10px;"> <span style="color: #A569BD; font-weight: bold;">Rafael Villegas</span> ha dado a favorito tu <span style="color: #A569BD; font-weight: bold;">Proyecto</span> </div>
            <div class="notification-text" style="margin-right: 10px;">2 horas atras</div>
            <div style="display: flex; align-items: center;"> <!-- Contenedor de imagen y botón -->
                <img src="{{ asset('images/books/love-books.png') }}" alt="Imagen del libro" style="max-width: 50px; margin-right: 20px;"> 
                <button class="button-notifications" style="font-weight: bold; color: #2E86C1;">Ver</button>
            </div>
        </div>


        <div class="notification" style="display: flex; align-items: center; justify-content: space-between; width: 60%;"> <!-- Utilizando Flexbox -->
            <div class="notification-text" style="margin-right: 10px;"> <span style="color: #A569BD; font-weight: bold;">Rafael Villegas</span> forma parte de tu equipo de trabajo</div> <!-- Ajustando el margen derecho -->
            <div class="notification-text" style="margin-right: 10px;">2 horas atras</div>
            <div style="display: flex; align-items: center;"> <!-- Contenedor de imagen y botón -->
                <img src="{{ asset('images/books/teams-books.png') }}" alt="Imagen del libro" style="max-width: 50px; margin-right: 20px;">
                <button class="button-notifications" style="font-weight: bold; color: #2E86C1;">Ver</button>
            </div>
        </div>

        <div class="notification" style="display: flex; align-items: center; justify-content: space-between; width: 60%;"> <!-- Utilizando Flexbox -->
            <div class="notification-text" style="margin-right: 10px;"><span style="color: #A569BD; font-weight: bold;">Rafael Villegas</span> tienes un comentario sin resolver</div> <!-- Ajustando el margen derecho -->
            <div class="notification-text" style="margin-right: 10px;">2 horas atras</div>
            <div style="display: flex; align-items: center;"> <!-- Contenedor de imagen y botón -->
                <img src="{{ asset('images/books/warning-books.png') }}" alt="Imagen del libro" style="max-width: 50px; margin-right: 20px;"> <!-- Ajustando el tamaño de la imagen y aumentando el margen derecho -->
                <button class="button-notifications" style="font-weight: bold; color: #2E86C1;">Ver</button>
            </div>
        </div>

        <div class="notification" style="display: flex; align-items: center; justify-content: space-between; width: 60%;"> <!-- Utilizando Flexbox -->
            <div class="notification-text" style="margin-right: 10px;"><span style="color: #A569BD; font-weight: bold;">Rafael Villegas</span> ha dejado un comentario a tu <span style="color: #A569BD; font-weight: bold;">Proyecto</span> </div> <!-- Ajustando el margen derecho -->
            <div class="notification-text" style="margin-right: 10px;">2 horas atras</div>
            <div style="display: flex; align-items: center;"> <!-- Contenedor de imagen y botón -->
                <img src="{{ asset('images/books/comment-books.png') }}" alt="Imagen del libro" style="max-width: 50px; margin-right: 20px;"> <!-- Ajustando el tamaño de la imagen y aumentando el margen derecho -->
                <button class="button-notifications" style="font-weight: bold; color: #2E86C1;">Ver</button>
            </div>
        </div>

        <div class="notification" style="display: flex; align-items: center; justify-content: space-between; width: 60%;"> <!-- Utilizando Flexbox -->
            <div class="notification-text" style="margin-right: 10px;"><span style="color: #A569BD; font-weight: bold;">Rafael Villegas</span> se ha enviado correctamente tu <span style="color: #A569BD; font-weight: bold;">Proyecto</span> </div> <!-- Ajustando el margen derecho -->
            <div class="notification-text" style="margin-right: 10px;">2 horas atras</div>
            <div style="display: flex; align-items: center;"> <!-- Contenedor de imagen y botón -->
                <img src="{{ asset('images/books/send-books.png') }}" alt="Imagen del libro" style="max-width: 50px; margin-right: 20px;">
                <button class="button-notifications" style="font-weight: bold; color: #2E86C1;">Ver</button>
            </div>
        </div>

        <div class="notification" style="display: flex; align-items: center; justify-content: space-between; width: 60%;"> <!-- Utilizando Flexbox -->
        <div class="notification-text" style="margin-right: 10px;"><span style="color: #A569BD; font-weight: bold;">Rafael Villegas Velasco</span> <span style="color: red; font-weight: bold;"> estas en recursamiento</span></div>
            <div class="notification-text" style="margin-right: 10px;">2 horas atras</div>
            <div style="display: flex; align-items: center;"> <!-- Contenedor de imagen y botón -->
                <img src="{{ asset('images/books/dead-books.png') }}" alt="Imagen del libro" style="max-width: 50px; margin-right: 20px;">
                <button class="button-notifications" style="font-weight: bold; color: #2E86C1;">Ver</button>
            </div>
        </div>

        <div class="notification" style="display: flex; align-items: center; justify-content: space-between; width: 60%;"> <!-- Utilizando Flexbox -->
            <div class="notification-text" style="margin-right: 10px;"> <span style="color: #A569BD; font-weight: bold;">Rafael Villegas Velasco</span> <span style="color: #27AE60; font-weight: bold;">ha dado like a tu </span> <span style="color: #A569BD; font-weight: bold;">Proyecto</span> </div>
            <div class="notification-text" style="margin-right: 10px;">2 horas atras</div>
            <div style="display: flex; align-items: center;"> <!-- Contenedor de imagen y botón -->
                <img src="{{ asset('images/books/like-books.png') }}" alt="Imagen del libro" style="max-width: 50px; margin-right: 20px;">
                <button class="button-notifications" style="font-weight: bold; color: #2E86C1;">Ver</button>
            </div>
        </div>

        
    </div>
@endsection
