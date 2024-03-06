@extends('layouts.panel')

@section('titulo', 'Proyectos por división')

@section('contenido')
@for ($i = 0; $i < 5; $i++)

    <div class="flex flex-col md:flex-row ml-16 mr-16 mb-10 bg-white mt-10 p-8 rounded-xl">
        <div class="flex-none mb-4 md:mb-0 md:order-2 md:ml-10 md:mr-10">
            <img class="mt-7 cursor-pointer w-96 md:w-96 md:h-72 h-auto p-1 rounded-2xl"
                src={{ asset('images/divisions/ing.png') }} alt="Project Image">
        </div>



        <div class="flex-grow ml-4 md:ml-0">
            <div class="flex items-center">
                <i class='bx bxs-badge-check mr-3 text-[#03A696] text-3xl'></i>
                <h1 class="text-3xl font-bold text-gray-600">Niux - Tienda en línea</h1>
            </div>


            <a class="text-blue-500 hover:underline inline-flex items-center">
            </a>
            <h2 class="mb-4 text-gray-500 dark:text-gray-500"> Este proyecto es una plataforma innovadora diseñada para revolucionar la forma en que interactuamos con el mundo digital. Utilizando tecnología de punta, incluida la inteligencia artificial, el aprendizaje automático y la computación en la nube, busca proporcionar soluciones personalizadas a problemas comunes en la industria de la tecnología...

            </h2>
            <div class="flex items-center">
                <i class='bx bxs-group mt-[-12px] mr-3 text-[#03A696]'></i>
                <h2 class="mb-4 text-gray-500 dark:text-gray-600 font-bold">Integrantes</h2>
            </div>

            <div>
                <div class="flex -space-x-2">
                    <div class="group hs-tooltip inline-block">
                      <img class="hs-tooltip-toggle relative inline-block size-[46px] rounded-full ring-2 ring-white hover:z-10" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                      <span class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300" role="tooltip">
                        James
                    </span>
                    </div>
                    <div class="group hs-tooltip inline-block">
                      <img class="hs-tooltip-toggle relative inline-block size-[46px] rounded-full ring-2 ring-white hover:z-10" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                      <span class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300" role="tooltip">
                        María
                    </span>
                    </div>
                    <div class="group hs-tooltip inline-block">
                      <img class="hs-tooltip-toggle relative inline-block size-[46px] rounded-full ring-2 ring-white hover:z-10" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80" alt="Image Description">
                      <span class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300" role="tooltip">
                        Anna
                    </span>
                    </div>
                    <div class="group hs-tooltip inline-block">
                      <img class="hs-tooltip-toggle relative inline-block size-[46px] rounded-full ring-2 ring-white hover:z-10" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                      <span class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300" role="tooltip">
                        Brian
                    </span>
                    </div>
                  </div>
            </div>

            <button class="mt-7 bg-blue-700 rounded-md font-normal w-36 h-7 text-xs justify-center">
                <a class=" inline-block bg-[#03A696] rounded-md font-bold w-36 h-7 text-[12px] text-center leading-7 text-white"
                    target="_blank" rel="noopener noreferrer">

                    Ver más información
                </a>
            </button>
        </div>
    </div>
    @endfor

@endsection
