@extends('layouts.panelUsers')

@section('titulo')
    Gestión De Sanciones (GS)
@endsection
@vite('resources/css/projects/projectuser.css')
@section('contenido')
    <div class="contenedor">
        <div class="modal-invitation">
            <button class="button-modal bg-[#00ab84]" id="openModalBtn" onclick="openModal()">Invitar Alumno</button>
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 flex justify-center">
                <a href="{{ route('projectform') }}" class="w-11/12 ">
                    <div class="bg-white rounded overflow-hidden shadow-lg mt-6 h-full relative card-invitation"
                        onclick="toggleCard(this)">
                        <img class="w-full h-40 object-cover" src="images/projects/projectuser/proyecto.jpg"
                            alt="Imagen de la tarjeta">
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <img class="w-24 h-24 rounded-full bg-white shadow-lg"
                                src="images/projects/projectuser/proyecto_icono.png" alt="Imagen circular">
                        </div>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mt-10 mb-2 text-center">Proyectos</div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="w-full md:w-1/2 flex justify-center">
                <a href="{{ route('projectteams') }}" class="w-11/12">
                    <div class="bg-white rounded overflow-hidden shadow-lg mt-6 h-full relative card-invitation">
                        <img class="w-full h-40 object-cover" src="images/projects/projectuser/equipo.jpg"
                            alt="Imagen de la tarjeta">
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <img class="w-24 h-24 rounded-full bg-white shadow-lg"
                                src="images/projects/projectuser/equipo_icono.png" alt="Imagen circular">
                        </div>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mt-10 mb-2 text-center">Equipos</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <br><br>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- Contenido del modal -->
            <span class="close" onclick="closeModal()">&times;</span>
            <h1 class="text-center text-4xl"><b>Invitación</b></h1>

            <div class="invitation">
                <div class="text">

                    <h2><b>Selecciona un compañero para invitar:</b></h2>
                    <br>
                    <button class="button" id="mostrar-button" onclick="toggleCajas()">Mostrar más</button>
                    <button id="ocultar-button" onclick="toggleCajas()"
                        style="display: none;
                    background-color: #394C5F;
                    border-radius: 10px;
                    width: 120px;
                    height: 40px;
                    color: white;">Ocultar</button>
                    <br><br>
                    <div class="cajas">
                        <ul>
                            <li class="users">
                                <img class="porfile"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="text">
                                <p class="text_user">Juan Diego Villegas Gutierrez</p>
                                <p class="text_state text-green-600">Disponible</p>
                                <button class="button-invitation" id="mostrar-invitacion"
                                    onclick="invitation()">Seleccionar</button>
                            </li>
                            <li class="users">
                                <img class="porfile"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                                <p class="text_user">Juan Diego Villegas Gutierrez</p>
                                <p class="text_state text-red-500">En equipo</p>
                                <button class="button-invitation" id="mostrar-invitacion"
                                    onclick="invitation()">Seleccionar</button>
                            </li>
                            <li class="users">
                                <img class="porfile"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                                <p class="text_user">Juan Diego Villegas Gutierrez</p>
                                <p class="text_state text-green-600">Disponible</p>
                                <button class="button-invitation" id="mostrar-invitacion"
                                    onclick="invitation()">Seleccionar</button>
                            </li>
                            <div class="caja oculto">
                                <li class="user">
                                    <img class="porfile"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <p class="text_user">Juan Diego Villegas Gutierrez</p>
                                    <p class="text_state text-red-500">En equipo</p>
                                    <button class="button-invitation" id="mostrar-invitacion"
                                        onclick="invitation()">Seleccionar</button>
                                </li>
                                <li class="user">
                                    <img class="porfile"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <p class="text_user">Juan Diego Villegas Gutierrez</p>
                                    <p class="text_state text-green-600">Disponible</p>
                                    <button class="button-invitation" id="mostrar-invitacion"
                                        onclick="invitation()">Seleccionar</button>
                                </li>
                                <li class="user">
                                    <img class="porfile"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <p class="text_user">Juan Diego Villegas Gutierrez</p>
                                    <p class="text_state text-green-600">Disponible</p>
                                    <button class="button-invitation" id="mostrar-invitacion"
                                        onclick="invitation()">Seleccionar</button>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="card_invitation invitacion">

                    <h2 class="text_invitation"><b>Alumno seleccionado</b></h2>
                    <div class="content_invitation">
                        <div class="user_invitation">
                            <p class="">Juan Diego Villegas Gutierrez</p>
                            <p class="">22393183</p>
                            <div class="pt-1.5">
                                <select class="bg-white rounded-lg cursor-pointer">
                                    <option value="" disabled selected>Equipo a invitar</option>
                                    <option value="integrantes">Sm-52</option>
                                    <option value="integrantes">Sm-53</option>
                                    <option value="integrantes">Sm-54</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="pt-1.5">
                        <button class="buttons" id="ocultar-invitacion" onclick="invitation()"><b>Invitar</b></button>
                        <button class="buttons" id="ocultar-invitacion" onclick="invitation()"><b>Cancelar</b></button>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleCajas() {
            var cajas = document.querySelectorAll('.caja');
            var mostrarButton = document.getElementById('mostrar-button');
            var ocultarButton = document.getElementById('ocultar-button');

            cajas.forEach(function(caja) {
                if (caja.style.display === 'none' || caja.style.display === '') {
                    caja.style.display = 'block';
                    mostrarButton.style.display = 'none';
                    ocultarButton.style.display = 'inline-block';
                } else {
                    caja.style.display = 'none';
                    mostrarButton.style.display = 'inline-block';
                    ocultarButton.style.display = 'none';
                }
            });
        }

        function invitation() {
            var cajas = document.querySelectorAll('.invitacion');
            var mostrarButton = document.getElementById('mostrar-invitacion');
            var ocultarButton = document.getElementById('ocultar-invitacion');

            cajas.forEach(function(caja) {
                if (caja.style.display === 'none' || caja.style.display === '') {
                    caja.style.display = 'block';
                    mostrarButton.style.display = 'inline-block';
                    ocultarButton.style.display = 'inline-block';
                } else {
                    caja.style.display = 'none';
                    mostrarButton.style.display = 'inline-block';
                    ocultarButton.style.display = 'none';
                }
            });
        }

        function openModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        // Función para cerrar el modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        // Cerrar el modal haciendo clic fuera del contenido
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
