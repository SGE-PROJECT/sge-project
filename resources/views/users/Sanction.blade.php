@extends('layouts.panelUsers')

@section('titulo')
    Gestión De Sanciones (GS)
@endsection

@section('contenido')
@vite('resources/css/users/sanction.css')

<div class="container mx-auto px-4 sm:px-8">
    <h1 class="fondo text-center font-bold pt-4 pb-12">
        Mis Asesorados
    </h1>
    </div>
    <div class="tabla-project">
        <div class="tabla-cont-project ">
            <table class="rounded-lg">
                <thead class="bg-[#293846] text-white font-bold">
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
                    <tr class="bg-white  dark:bg-gray-100 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            SM-53
                        </td>
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
                            <button id="abrir-modal-1" class="abrir-modal bg-[#03A696] text-white font-bold py-2 px-4 rounded ml-8  mr-5 w-32">
                                Sancionar
                            </button>
                        </td>
                    </tr>
                    <!-- Repetir para cada fila de datos -->
                    <tr class="bg-white dark:bg-gray-100 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            SM-53
                        </td>
                        <td class="px-6 py-4">
                            22393205
                        </td>
                        <td class="px-6 py-4">
                            Anthony
                        </td>
                        <td class="px-6 py-4">
                            Williams
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button id="abrir-modal-2" class="abrir-modal bg-[#03A696] text-white font-bold py-2 px-4 rounded ml-8 mr-5 w-32">
                                Sancionar
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white  dark:bg-gray-100 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            SM-53
                        </td>
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
                            <button id="abrir-modal-4" class="abrir-modal bg-[#03A696] text-white font-bold py-2 px-4 rounded ml-8  mr-5 w-32">
                                Sancionar
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white  dark:bg-gray-100 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            SM-53
                        </td>
                        <td class="px-6 py-4">
                            22394139
                        </td>
                        <td class="px-6 py-4">
                            Maria Jose
                        </td>
                        <td class="px-6 py-4">
                            Lopez
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button id="abrir-modal-4" class="abrir-modal bg-[#03A696] text-white font-bold py-2 px-4 rounded ml-8  mr-5 w-32">
                                Sancionar
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-100 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            SM-53
                        </td>
                        <td class="px-6 py-4">
                            22394248
                        </td>
                        <td class="px-6 py-4">
                            Victoria
                        </td>
                        <td class="px-6 py-4">
                            Cruz
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button id="abrir-modal-4" class="abrir-modal bg-[#03A696] text-white font-bold py-2 px-4 rounded ml-8  mr-5 w-32">
                                Sancionar
                            </button>
                        </td>
                    </tr>
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
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-24 w-24 rounded-full bg-green-400 sm:mx-0 sm:h-16 sm:w-16">
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
            <div class="crd bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="cancel-button" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
                <button id="abrir-modal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Sancionar
                </button>
            </div>
        </div>
    </div>
</div>

<section class="fixed inset-x-0 bottom-0 flex justify-end items-end p-5">
    <button class="Agendar">
        <div class="svg-wrapper-memo">
          <div class="svg-wrapper-si">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter "><path d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z"></path><path d="m15.628 12.183-1.8-1.799 1.37-1.371 1.8 1.799zm-7.623 4.018V18h1.799l4.976-4.97-1.799-1.799z"></path></svg>
          </div>
        </div>
        <div class="text">Agendar</div>
      </button>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('model-component-container');
    var botonesAbrir = document.querySelectorAll('.abrir-modal');
    var btnCancel = document.getElementById('cancel-button');
    var modalContent = document.querySelector('#model-component-container > .flex');
    // Agregar evento de clic a todos los botones
    botonesAbrir.forEach(function(boton) {
        boton.addEventListener('click', function(event) {
            event.preventDefault();
            modal.classList.remove('hidden');
        });
    });
    btnCancel.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
    modalContent.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});
</script>

@endsection
