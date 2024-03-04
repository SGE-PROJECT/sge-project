@extends('layouts.panel')

@section('titulo')
    Configuración de la Cuenta
@endsection

@section('contenido')
    <div class=" flex justify-center pt-6 p-6">
        <div class="bg-white rounded-lg p-6 shadow-xl w-full max-w-6xl mx-auto">
            <div class="md:flex md:flex-row md:justify-between">
                <!-- Sección de foto de perfil -->
                <div class="md:w-1/2 lg:w-1/3 xl:w-1/4 mb-6 md:mb-0 text-center md:text-left md:border-r md:pr-6">
                    <h2 class="text-2xl font-semibold text-center mb-4">Foto de perfil</h2>
                    <p class="text-gray-600 text-center mb-4">Sube tu foto.</p>
                    <img class="w-40 h-40 rounded-full mx-auto mb-4" src="https://via.placeholder.com/150"
                        alt="Profile picture">
                    <button class="bg-teal-500 text-white px-6 w-full py-2 rounded hover:bg-teal-600 transition-colors">
                        Subir foto de perfil
                    </button>
                    <p class="text-xs text-center text-gray-500 mt-2">*Mínimo 600x600</p>
                </div>

                <!-- Sección de datos de usuario -->
                <div class="md:w-1/2 lg:w-2/3 xl:w-3/4 pl-6">
                    <h2 class="text-2xl font-semibold mb-4">Datos de usuario</h2>
                    <p class="text-gray-600 mb-4">Añade o actualiza tus datos de contacto</p>
                    <form class="space-y-4">
                        <div>
                            <input type="text" autocomplete="off" name="text" class="input" placeholder="Nombre">
                        </div>
                        <div>
                            <input type="text" autocomplete="off" name="text" class="input" placeholder="Apellidos">

                        </div>
                        <div>
                            <input type="text" autocomplete="off" name="text" class="input" placeholder="Correo Electrónico">

                        </div>
                        <button type="submit"
                            class="w-full bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">
                            Actualizar datos
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
