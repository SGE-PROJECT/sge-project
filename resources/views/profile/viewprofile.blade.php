@extends('layouts.panel')

@section('titulo', 'Profile')

@section('contenido')
    <div class="container mx-auto ">
        <div class="bg-white p-8  rounded-lg shadow-xl">
            <!-- Perfil de Usuario -->
            <div class="flex flex-col md:flex-row justify-center md:items-start m-8">
                <!-- Imagen de perfil -->
                <div class="m-6 md:mb-0 profile-picture-container" onclick="openModal()">
                    <img alt="Profile Picture" src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg"
                        class="w-48 h-48 rounded-full border-4 border-white shadow-xl" onclick="openModal()">
                    <div class="profile-picture-overlay">
                        <p>Ver foto de perfil</p>
                    </div>
                </div>
                <!-- Modal -->
                <div id="myModal" class="modal absolute bottom-0 left-0 right-0 top-0 bg-black bg-opacity-50 hidden ">
                  <!-- Contenido del modal -->
                    <div class="modal-content">
                        <span class="close p-0" onclick="closeModal()">&times;</span>
                        <img src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg">
                    </div>
                </div>
                <!-- Información de perfil -->
                <div>
                    <div class="mb-4">
                        <h2 class="text-3xl font-bold text-teal-600">Rafael Villegas</h2>
                    </div>
                    <p class="text-lg text-blueGray-700 mb-2">Profesor académico en 2024, programador web</p>
                    <p class="text-lg font-bold text-teal-600 mb-4">Grupo: SM-53</p>
                    <!-- Detalles adicionales -->
                    <div class="flex flex-col">
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-teal-600"></i>
                            <span>Quintana Roo, Cancún</span>
                        </div>
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-envelope mr-2 text-teal-600"></i>
                            <span style="text-transform: lowercase;">pollitochicken@example.com</span>
                        </div>
                        <div class="flex items-center text-sm text-blueGray-600 mb-2">
                            <i class="fas fa-briefcase mr-2 text-teal-600"></i>
                            <span>Profesor - Programación web</span>
                        </div>
                        <div class="flex items-center text-sm text-blueGray-600">
                            <i class="fas fa-university mr-2 text-teal-600"></i>
                            <span>Universidad Tecnológica de Cancún</span>
                        </div>
                    </div>
                </div>
            </div>

    {{-- PROYECTOS Y EQUIPOS --}}
<div class="border-t border-blueGray-200 m-8 pt-8">
    <div class="grid md:grid-cols-2 gap-10 ml-4">
        <h1 class="text-2xl font-bold text-teal-600 mb-4 ml-4 md:ml-10">Proyecto</h1>
        <h1 class="text-2xl font-bold text-teal-600 mb-4 ml-4 md:ml-10">Equipo</h1>
    </div>
   
    <div class="grid md:grid-cols-2 gap-10 ml-4">
        <!-- Proyecto -->
        <div class="bg-gray-100 rounded-lg p-4 flex flex-col justify-between transition duration-300 ease-in-out transform hover:shadow-lg h-full">
            <h3 class="text-lg font-semibold text-gray-800">Nombre del Proyecto</h3>
            <p class="text-sm text-gray-600 mt-2">Descripción del proyecto.</p>
        </div>
        <!-- Equipos -->
        <div>
            
            <!-- Tarjeta de Equipo -->
            <div class="bg-gray-100 rounded-lg p-4 flex flex-col justify-between transition duration-300 ease-in-out transform hover:shadow-lg h-full">
                <h3 class="text-lg font-semibold text-gray-800">Nombre del Equipo</h3>
                <p class="text-sm text-gray-600 mt-2">Descripción del equipo.</p>
            </div>
        </div>
    </div>
</div>




        </div>
    </div>

    <script>
        // Función para abrir el modal
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        // Función para cerrar el modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        // Cierra el modal si se hace clic fuera del contenido
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <style>
        .profile-picture-container {
            position: relative;
            display: inline-block;
        }

        .profile-picture-container img {
            display: block;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .profile-picture-container:hover img {
            transform: scale(1.1);
        }

        .profile-picture-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .profile-picture-container:hover .profile-picture-overlay {
            opacity: 1;
        }

        .profile-picture-overlay p {
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        /* Estilos para el modal */
        .modal {
            display: none;
            /* Por defecto, el modal está oculto */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Habilita el desplazamiento si es necesario */
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo negro con opacidad */
        }

        /* Contenido del modal */
        .modal-content {
            margin: auto;
            display: block;
            width: 50%;
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Imagen dentro del modal */
        .modal-content img {
            width: auto%;
            height: auto;
            border-radius: 5px;
        }

        /* Botón de cierre del modal */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #333;
            font-size: 24px;
            cursor: pointer;
        }
    </style>

@endsection
