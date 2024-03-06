@extends('layouts.panel')

@section('titulo', 'Profile')

@section('contenido')
    <div class="container mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-xl">
            <!-- Perfil de Usuario -->
            <div class="flex flex-col md:flex-row justify-center md:items-start m-8">
                <!-- Imagen de perfil -->
                <div class="m-6 md:mb-0">
                    <img alt="Profile Picture" src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" class="w-48 h-48 rounded-full border-4 border-white shadow-xl">
                </div>
                <!-- Información de perfil -->
                <div>
                    <div class="mb-4">
                        <h2 class="text-3xl font-bold text-teal-600">Rafael Villegas</h2>
                        <!-- Botones de seguimiento, mensaje, etc. -->
                        <div class="mt-2 flex">
                            <button class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-full mr-4 transition duration-300 ease-in-out">Seguir</button>
                            <button class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out">Mensaje</button>
                        </div>
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

            {{-- PROYECTOS --}}
            <div class="border-t border-blueGray-200 m-8 pt-8">
                <h1 class="text-2xl font-bold text-teal-600 mb-4 ml-4 md:ml-10">Proyectos</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Proyectos -->
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="bg-gray-100 rounded-lg p-4 flex flex-col justify-between transition duration-300 ease-in-out transform hover:shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-800">Proyecto {{ $i }}</h3>
                            <p class="text-sm text-gray-600 mt-2">Descripción del proyecto {{ $i }}.</p>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
