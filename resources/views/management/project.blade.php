<!-- SECCION PROYECTOS -->
@extends('layouts.panel')
@section('contenido')
    <h1 class="text-3xl font-bold text-center mt-10 mb-8">Proyectos</h1>
    <!-- SECCIÓN QUE CONTIENE LA TARJETA Y LA GRÁFICA -->
    <div class="flex flex-wrap justify-center gap-5 p-5">
        <div class="p-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @include('administrator.graph-projects')
            @include('administrator.graph-users')
            @include('administrator.graph-teams')
            @include('administrator.graph-books')
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-5 mb-6 ml-auto mr-3"> <!-- Cambiado a lg:grid-cols-2 para tener dos columnas en pantallas grandes -->
            @include('administrator.section-projects')
        </div>
    </div>    
    <!-- SECCIÓN QUE CONTIENE LOS BOTONES -->
    <div class="flex items-end align-middle">
        <!-- BOTÓN QUE DIRIGE AL CRUD -->
        <button type="submit"
            class="relative bg-teal-500 text-white px-4 py-2 ml-8 mr-5 rounded hover:bg-teal-600 transition-colors h-full"
            onclick="window.location.href = '{{ route('dashboardProjects') }}'">Ir a Agregar</button>
        <!-- SE IMPORTA EL FILTRO -->
        @include('administrator.filter')
        <!-- SE AÑADE EL BÚSCADOR -->
        <div class="relative ml-5 w-55 z-10 flex items-center">
            <label for="Search" class="sr-only">Search</label>
            <input type="text" id="Search" placeholder="Buscar"
                class="w-full rounded border-gray-200 py-2.5 px-4 sm:text-sm h-full outline-none" />
            <span class="absolute rounded inset-y-0 end-0 grid w-10 place-content-center bg-teal-500 text-white h-full">
                <button type="button" class="text-gray-500 hover:text-gray-700 h-full">
                    <span class="sr-only bg-white text-white">Search</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </span>
        </div>
        <!-- BOTÓN QUE NOS SIRVE PARA EXPORTAR LOS ARCHIVOS -->
        <div x-data="{ isActive: false }" class="relative ml-auto mr-8">
            <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                <a href="#"
                    class="w-full border-e px-4 py-3 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    Exportar
                </a>
                <button x-on:click="isActive = !isActive"
                    class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    <span class="sr-only">Menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="absolute right-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu"
                x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false"
                x-on:keydown.escape.window="isActive = false">
                <div class="p-2">
                    <strong class="block p-2 text-xs font-medium uppercase text-gray-400"> Opciones </strong>
                    <label for="Option1" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>
                        <div>
                            <strong class="font-medium text-gray-900"> PDF </strong>
                        </div>
                    </label>
                    <label for="Option2" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>

                        <div>
                            <strong class="font-medium text-gray-900"> CSV </strong>
                        </div>
                    </label>

                </div>
            </div>
        </div>
    </div>
    <!-- TABLA DEL CONTENIDO -->
    <div class="tabla-project rounded-t-lg">
        <div class="tabla-cont-project rounded-t-lg">
            <table id="tabla-proyectos" class="rounded-lg"></table>
        </div>
        <!-- PAGINACIÓN -->
        <ol class="flex justify-center gap-1 text-xs font-medium mt-10">
            <li>
                <a href="#"
                    class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Prev Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>

            <li>
                <a href="#"
                    class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
                    1
                </a>
            </li>

            <li class="block size-8 rounded border-blue-600 bg-teal-500 text-center leading-8 text-white">
                2
            </li>

            <li>
                <a href="#"
                    class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
                    3
                </a>
            </li>

            <li>
                <a href="#"
                    class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
                    4
                </a>
            </li>

            <li>
                <a href="#"
                    class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        </ol>
    </div>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection