@extends('layouts.panel')

@section('titulo', 'Divisiones')

@section('contenido')
<<<<<<< HEAD

<div class="contenedor">
    <h1 class="text-font">Divisiones:</h1>
    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/4 px-4">
            <div class="bg-white max-w-sm rounded overflow-hidden shadow-lg mt-6 h-full relative card" onclick="toggleCard(this)">
                <img class="w-full h-40 object-cover" src="images/divisions/ing.png" alt="Imagen de la tarjeta">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/ing-profile.png" alt="Imagen circular">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mt-10 mb-2 text-center">Ingeniería y Tecnología</div>
                </div>
            </div>
        </div>
=======
>>>>>>> develop

    <!-- Container First -->
    <div class="header_divisions">
        <h1 class="text-font_divisions font-bold">Divisiones:</h1>

        <span class="flex">
        <input class="search_divisions px-3 outline-none border-l-5" type="text" placeholder="Buscar...">
        <button class="search-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
        </span>
    </div>

    <div class="BtnCrearDivisions">
        <button class="Btn_divisions">
            <span class="Btntext_divisions">Crear</span>
            <span class="svgIcon_divisions">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
            </span>
          </button>
    </div>
    <!-- Container of Rows for four -->
    <div class="contenedor_divisions">

        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/4 px-4">

                <!-- Card Number 1. Technologies and Enginner -->
                <div class="bg-white max-w-sm rounded overflow-hidden shadow-lg h-full relative card_divisions">
                    <div class="relative">
                        <img class="w-full h-40 object-cover" src="images/divisions/ing.png" alt="Imagen de la tarjeta">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                    </div>

                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/ing-profile.png" alt="Imagen circular">
                    </div>

                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </div>

                    <div class="absolute bottom-0 right-0 mt-3 mb-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-red-500 hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>

                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mt-7 mb-1 text-center">Ingeniería y Tecnología</div>
                    </div>
                </div>



            </div>

            <!-- Card Number 2. Gastronomy -->
            <div class="w-full md:w-1/4 px-4">
                <div class="max-w-sm rounded overflow-hidden shadow-lg h-full relative card_divisions bg-white">
                    <div class="relative">
                        <img class="w-full h-40 object-cover" src="images/divisions/gs.png" alt="Imagen de la tarjeta">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                      </div>

                    <div class=" absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/gs-profile.png"
                            alt="Imagen circular">
                    </div>
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 mt-3 mb-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-red-500 hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mt-10 mb-1  text-center">Gastronomía</div>
                    </div>
                </div>
            </div>

            <!-- Card Number 3. Turismo -->
            <div class="w-full md:w-1/4 px-4">
                <div class="max-w-sm rounded overflow-hidden shadow-lg h-full relative card_divisions bg-white">
                    <div class="relative">
                        <img class="w-full h-40 object-cover" src="images/divisions/ts.png" alt="Imagen de la tarjeta">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                      </div>

                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/ts-profile.png"
                            alt="Imagen circular">
                    </div>
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 mt-3 mb-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-red-500 hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mt-10 mb-1  text-center">Turismo</div>
                    </div>
                </div>
            </div>

            <!-- Card Number 4. Economico administrativo -->
            <div class="w-full md:w-1/4 px-4">
                <div class="max-w-sm rounded overflow-hidden shadow-lg h-full relative card_divisions bg-white">
                    <div class="relative">
                        <img class="w-full h-40 object-cover" src="images/divisions/ec.png" alt="Imagen de la tarjeta">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                      </div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/ec-profile.png"
                            alt="Imagen circular">
                    </div>
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 mt-3 mb-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-red-500 hover:scale-110 transition-transform duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mt-6 mb-1 text-center">Economico administrativo</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/divisions.js') }}"></script>
@endsection
