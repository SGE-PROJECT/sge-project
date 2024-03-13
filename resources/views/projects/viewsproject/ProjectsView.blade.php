@extends('layouts.panel')
@vite('resources/css/app.css')

@section('titulo', 'Proyectos por división')

@section('contenido')
    @for ($i = 0; $i < 5; $i++)
        <div class="flex flex-col md:flex-row ml-8 mr-8 mb-10 bg-white mt-10 p-8 rounded-xl card_project">
            <div class="flex-none mb-4 md:mb-0 md:order-2 md:ml-10 md:mr-10">
                <img class="mt-7 cursor-pointer w-96 md:w-96 md:h-72 h-auto p-1 rounded-2xl"
                    src="https://images.pexels.com/photos/3861972/pexels-photo-3861972.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Project Image">

            </div>
            <div class="flex-grow ml-4 md:mt-4 md:ml-0">
                <div class="flex items-center ">
                    <i class='bx bxs-badge-check mr-3 text-[#03A696] text-3xl'></i>
                    <h1 class="text-3xl font-bold text-gray-600">Niux - Tienda en línea</h1>
                </div>


                <a class="text-blue-500 hover:underline inline-flex items-center">
                </a>
                <h2 class="mb-4 text-gray-500 dark:text-gray-500"> Este proyecto es una plataforma innovadora diseñada para
                    revolucionar la forma en que interactuamos con el mundo digital. Utilizando tecnología de punta,
                    incluida la inteligencia artificial, el aprendizaje automático y la computación en la nube, busca
                    proporcionar soluciones personalizadas a problemas comunes en la industria de la tecnología...

                </h2>
                <div class="flex items-center">
                    <i class='bx bxs-group mt-[-12px] mr-2 text-[#03A696]'></i>
                    <h2 class="mb-2 mr-4 text-gray-500 dark:text-gray-600 font-bold">Integrantes:</h2>
                    <div class="group hs-tooltip inline-block">
                        <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img"
                            src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                            alt="Image Description">
                        <span
                            class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                            role="tooltip">
                            James
                        </span>
                    </div>
                    <div class="group hs-tooltip inline-block">
                        <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img "
                            src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                            alt="Image Description">
                        <span
                            class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                            role="tooltip">
                            María
                        </span>
                    </div>
                    <div class="group hs-tooltip inline-block">
                        <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img "
                            src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80"
                            alt="Image Description">
                        <span
                            class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                            role="tooltip">
                            Anna
                        </span>
                    </div>
                    <div class="group hs-tooltip inline-block">
                        <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img "
                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                            alt="Image Description">
                        <span
                            class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                            role="tooltip">
                            Brian
                        </span>
                    </div>
                </div>

                <div>
                    <div class="flex-proyectos ">
                        <div class="comment-react ">
                            <button>
                                <img src="https://cdn-icons-png.flaticon.com/128/12114/12114146.png" class="w-5 h-5" />
                            </button>

                            <span>14</span>
                        </div>

                        <div class="rating mr-6 mt-6 md:mt-0 mb-6 md:mb-0">
                            <input type="radio" id="star-1" name="star-radio" value="star-1">
                            <label for="star-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path pathLength="360"
                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                    </path>
                                </svg>
                            </label>
                            <input type="radio" id="star-2" name="star-radio" value="star-1">
                            <label for="star-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path pathLength="360"
                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                    </path>
                                </svg>
                            </label>
                            <input type="radio" id="star-3" name="star-radio" value="star-1">
                            <label for="star-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path pathLength="360"
                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                    </path>
                                </svg>
                            </label>
                            <input type="radio" id="star-4" name="star-radio" value="star-1">
                            <label for="star-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path pathLength="360"
                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                    </path>
                                </svg>
                            </label>
                            <input type="radio" id="star-5" name="star-radio" value="star-1">
                            <label for="star-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path pathLength="360"
                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                    </path>
                                </svg>
                            </label>
                        </div>
                        <button id="toggleCommentsButton">
                            <img src="https://cdn-icons-png.flaticon.com/128/3193/3193015.png" class="h-10 w-10 mr-8 md:mr-0">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endfor

@endsection

{{-- COMENTARIOS --}}

<div id="commentsSection"
    class=" hidden py-12 px-4 md:px-6 2xl:px-0 2xl:container 2xl:mx-auto justify-center items-center">
    <div class="flex flex-col justify-start items-start w-full space-y-8">
        <div class="flex justify-start items-start">
            <p class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-black ">Comentarios
            </p>
        </div>
        <div class="w-full flex justify-start items-start flex-col bg-gray-50 dark:bg-gray-800 p-8">
            <div class="flex flex-col md:flex-row justify-between w-full">
                <div class="flex flex-row justify-between items-start">
                    <p class="text-xl md:text-2xl font-medium leading-normal text-gray-800 dark:text-white">Beautiful
                        addition to the theme</p>
                </div>

            </div>
            <div id="menu" class="md:block">
                <p class="mt-3 text-base leading-normal text-gray-600 dark:text-white w-full md:w-9/12 xl:w-5/6">When
                    you want to decorate your home, the idea of choosing a decorative theme can seem daunting. Some
                    themes seem to have an endless amount of pieces, while others can feel hard to accomplish</p>
                <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                    <div>
                        <img src="https://i.ibb.co/QcqyrVG/Mask-Group.png" alt="girl-avatar" />
                    </div>
                    <div class="flex flex-col justify-start items-start space-y-2">
                        <p class="text-base font-medium leading-none text-gray-800 dark:text-white">Anna Kendrick</p>
                        <p class="text-sm leading-none text-gray-600 dark:text-white">14 July 2021</p>
                    </div>
                </div>
            </div>


            <div class="w-full flex justify-start items-start flex-col bg-gray-50 dark:bg-gray-800  py-8">
                <div class="flex flex-col md:flex-row justify-between w-full">
                    <div class="flex flex-row justify-between items-start">
                        <p class="text-xl md:text-2xl font-medium leading-normal text-gray-800 dark:text-white">
                            Comfortable and minimal, just how I like it!</p>
                    </div>
                </div>
                <p class="mt-3 text-base leading-normal text-gray-600 dark:text-white w-full md:w-9/12 xl:w-5/6">
                    This style relies more on neutral colors with little to no embellishment on furniture. Lighter
                    fabrics, such as silk and cotton, are popular, as are lighter colors in wood and metal.</p>
                <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                    <div>
                        <img src="https://i.ibb.co/RCTGZTc/Mask-Group-1.png" alt="girl-avatar" />
                    </div>
                    <div class="flex flex-col justify-start items-start space-y-2">
                        <p class="text-base font-medium leading-none text-gray-800 dark:text-white">James Schofield
                        </p>
                        <p class="text-sm leading-none text-gray-600 dark:text-white">23 June 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
