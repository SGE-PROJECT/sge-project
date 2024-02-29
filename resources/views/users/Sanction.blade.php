@extends('layouts.panel')

@section('titulo')
    Gestión De Sanciones (GS)
@endsection

@section('contenido')
<div class="container mx-auto px-4 sm:px-8">
    <h1 class="text-center font-bold pt-4 pb-12">
        Mis Asesorados
    </h1>

    <div class="flex justify-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-s-3xl pt-4">
            <table class="w-fit h-fit text-sm text-left rtl:text-right text-gray-900 dark:text-gray-900">
                <thead class="text-xs text-white uppercase bg-[#03A696] dark:bg-[#03A696] dark:text-white w-fit h-fit">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Grupo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Matrícula
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre(s)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellido(s)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            SM-53
                        </th>
                        <td class="px-6 py-4">
                            22393204
                        </td>
                        <td class="px-6 py-4">
                            Guillermo
                        </td>
                        <td class="px-6 py-4">
                            Garcia
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button id="abrir-modal" class="bg-teal-500 px-4 py-2 text-white uppercase tracking-wider cursor-pointer rounded-lg border-2 border-transparent hover:border-teal-500 hover:bg-white hover:text-teal-500 active:bg-teal-200 transition duration-400 ease-in-out shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50">
                                Sancionar
                            </button>
                                                    </td>
                    </tr>
                    <!-- Repetir para cada fila de datos -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="model-component-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Fondo del modal -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Contenedor del modal -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Modal -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <!-- Contenido del modal -->
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <!-- Icono o imagen para el modal -->
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Aquí podría ir un ícono o imagen -->
                        <svg class="size-1/2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    </div>
                    <!-- Texto del modal -->
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Sancionar Alumno
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                ¿Seguro que quieres sancionar este alumno?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Botones de acción del modal -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="cancel-button" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Sancionar
                </button>
            </div>
        </div>
    </div>
</div>

<section class="fixed inset-x-0 bottom-0 flex justify-end items-end p-5">
    <button
      class="relative group flex justify-center p-5 rounded-md drop-shadow-xl bg-teal-500 text-white font-semibold hover:translate-y-1 hover:rounded-full transition-all duration-500 mr-5"
    >
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="w-5 h-5">
        <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/>
      </svg>
      <span class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700">
        Agendar cita
      </span>
    </button>
</section>
  
<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('model-component-container');
    var btnAbrir = document.getElementById('abrir-modal');
    var btnCancel = document.getElementById('cancel-button');
    // Selector para el contenido principal del modal que queremos excluir del evento de clic para cerrar
    var modalContent = document.querySelector('#model-component-container > .flex');

    btnAbrir.addEventListener('click', function(event) {
        event.preventDefault(); // Previene el comportamiento por defecto
        modal.classList.remove('hidden');
    });

    btnCancel.addEventListener('click', function() {
        modal.classList.add('hidden');
    });

    window.addEventListener('click', function(event) {
        // Verifica si el clic fue directamente en el modal (fondo), pero no en el contenido
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Esta es una medida extra para prevenir el cierre cuando se hace clic en el contenido del modal.
    modalContent.addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el evento de clic se propague al contenedor padre
    });
});

    </script>
    
@endsection
