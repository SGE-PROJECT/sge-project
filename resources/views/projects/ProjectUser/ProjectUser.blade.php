@extends('layouts.panel')

@section('titulo', 'UserProject')

@vite('resources/css/projects/projectuser.css')

@section('contenido')
    <div class="contenedor">
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 flex justify-center">
                <div class="bg-white w-11/12 rounded overflow-hidden shadow-lg mt-6 h-full relative card"
                    onclick="toggleCard(this)">
                    <img class="w-full h-40 object-cover" src="images/projects/projectuser/proyecto.jpg" alt="Imagen de la tarjeta">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/projects/projectuser/proyecto_icono.png"
                            alt="Imagen circular">
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mt-10 mb-2 text-center">Proyecto</div>
                    </div>
                </div>
            </div>


            <div class="w-full md:w-1/2 flex justify-center">
                <div class="bg-white w-11/12 rounded overflow-hidden shadow-lg mt-6 h-full relative card"
                    onclick="toggleCard(this)">
                    <img class="w-full h-40 object-cover" src="images/projects/projectuser/equipo.jpg" alt="Imagen de la tarjeta">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/projects/projectuser/equipo_icono.png"
                            alt="Imagen circular">
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mt-10 mb-2 text-center">Equipo</div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <h1 class="text-center text-4xl"><b>Invitación</b></h1>

        <div class="invitation">
            <div class="text">

                <h2><b>Selecciona un compañero de equipo:</b></h2>
                <ul >
                    <li class="users">
                        <img class="porfile"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="text">
                        <p class="text_user">Juan Diego Villegas Gutierrez</p>
                        <p class="text_state text-green-600">Disponible</p>
                    </li>
                    <li class="users">
                        <img class="porfile"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <p class="text_user">Juan Diego Villegas Gutierrez</p>
                        <p class="text_state text-green-600">Disponible</p>
                    </li>
                    <li class="users">
                        <img class="porfile"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <p class="text_user">Juan Diego Villegas Gutierrez</p>
                        <p class="text_state text-green-600">Disponible</p>
                    </li>
                    <li class="users">
                        <img class="porfile"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <p class="text_user">Juan Diego Villegas Gutierrez</p>
                        <p class="text_state text-red-500">En equipo</p>
                    </li>
                </ul>
            </div>
            <div class="card_invitation">
                <h2 class="text_invitation"><b>Alumno seleccionado</b></h2>
                <div class="content_invitation">
                    <img class="porfile"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="user_invitation">
                        <p class="">Juan Diego Villegas Gutierrez</p>
                        <p class="">22393183</p>
                    </div>
                </div>
                <div>
                <button class="buttons"><b>Invitar</b></button>
                <button class="buttons"><b>Cancelar</b></button>
                </div>
            </div>
        </div>
    @endsection
