@extends('layouts.panelUsers')

@section('titulo')
    Gestión De Sanciones (GS)
@endsection

@section('contenido')
<style>
    button.abrir-modal {
        display: inline-block;
        width: 150px;
        height: 50px;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        transition: all 0.5s ease-in;
        z-index: 1;
    }
    button.abrir-modal::before,
    button.abrir-modal::after {
        content: '';
        position: absolute;
        top: 0;
        width: 0;
        height: 100%;
        transform: skew(15deg);
        transition: all 0.5s;
        overflow: hidden;
        z-index: -1;
    }
    button.abrir-modal::before {
        left: -10px;
        background: #166656;
    }
    button.abrir-modal::after {
        right: -10px;
        background: #04CAB6;
    }
    button.abrir-modal:hover::before,
    button.abrir-modal:hover::after {
        width: 58%;
    }
    tr:nth-child(even){
        background-color: #ddd;
    }
    tr:hover td{
        background-color:#808B96;
        color: #ffffff;
    }
    .modal-button, .modal-button2 {
        padding: 1.0em 2em;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 200;
        color: #ffffff;
        background-color: #1E5C43;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }
    .modal-button2{
        background-color: #9A2121;
    }
    .modal-button:hover {
        background-color: #1E5C43;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #ffffff;
        transform: translateY(-7px);
    }
    .modal-button2:hover {
        background-color: #9A2121;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #ffffff;
        transform: translateY(-7px);
    }
    .modal-button:active, .modal-button2:active {
        transform: translateY(-1px);
    }
    .fondo{
        text-align: center;  
        font-size: 35px; 
        COLOR: #293846;
        padding: 2%;
        text-shadow: 0px 0px 9px #808B96;
    }
</style>

<div class="container mx-auto px-4 sm:px-8">
    <h1 class="fondo text-center font-bold pt-4 pb-12">
        Mis Asesorados
    </h1>

    <div class="tabla-project">
        <div class="tabla-cont-project ">
            <table class="rounded-lg">
                <thead class="bg-[#293846] text-white font-bold bg-[#293846]">
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
                            <button id="abrir-modal" class="abrir-modal bg-[#03A696] hover:bg-[#025b52] text-white font-bold py-2 px-4 rounded ml-8  mr-5 w-32">
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
                            <button id="abrir-modal" class="abrir-modal bg-[#03A696] hover:bg-[#025b52] text-white font-bold py-2 px-4 rounded ml-8 mr-5 w-32">
                                Sancionar
                            </button>
                        </td>
                    </tr>
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
                            <button id="abrir-modal" class="abrir-modal bg-[#03A696] hover:bg-[#025b52] text-white font-bold py-2 px-4 rounded ml-8 mr-5 w-32">
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
                <button id="cancel-button" type="button" class="modal-button w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
                <button id="abrir-modal" type="button" class="modal-button2 mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Sancionar
                </button>
            </div>
        </div>
    </div>
</div>

<section class="fixed inset-x-0 bottom-0 flex justify-end items-end p-5">
    <button class="Guille">
        <div class="svg-wrapper-memo">
          <div class="svg-wrapper-si">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z"></path><path d="m15.628 12.183-1.8-1.799 1.37-1.371 1.8 1.799zm-7.623 4.018V18h1.799l4.976-4.97-1.799-1.799z"></path></svg>
          </div>
        </div>
        <div class="text">Agendar</div>
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
