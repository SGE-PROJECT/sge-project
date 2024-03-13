@extends('layouts.panel')
@section('contenido')
    <h1 class="text-3xl font-bold text-center mt-5 mb-8">Proyectos</h1>
    <div class="flex flex-wrap justify-center gap-5 p-5">
        <div class="flex lg:flex-nowrap justify-center items-center gap-5 mr-10">
            @include('administrator.card', ['number' => 12, 'name' => 'Proyectos'])
        </div>
        <div class="flex flex-wrap flex-col gap-5 mr-10">
            <!-- SECCION PROYECTOS -->
            @include('administrator.section-projects')
        </div>
    </div>
    <div class="flex items-end align-middle">
        <button type="submit"
            class="relative bg-teal-500 text-white px-4 py-2 ml-8 mr-5 rounded hover:bg-teal-600 transition-colors h-full"
            onclick="window.location.href = '{{ route('dashboardProjects') }}'">Ir a Agregar</button>
        @include('administrator.filter')
        <div class="relative ml-5 w-55 z-10 flex items-center">
            <label for="Search" class="sr-only">Search</label>
            <input type="text" id="Search" placeholder="Buscar"
                class="w-full rounded border-gray-200 py-2.5 px-4 sm:text-sm h-full outline-none" />
            <span class="absolute rounded inset-y-0 end-0 grid w-10 place-content-center bg-teal-500 text-white h-full">
                <button type="button" class="text-gray-600 hover:text-gray-700 h-full">
                    <span class="sr-only bg-white text-white">Search</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </span>
        </div>
        <div x-data="{ isActive: false }" class="relative ml-80">
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

            <div class="absolute end-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu"
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
                    <label for="Option1" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>

                        <div>
                            <strong class="font-medium text-gray-900"> SVC </strong>
                        </div>
                    </label>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="tabla-project">
        <div class="tabla-cont-project ">
            <table class="rounded-lg">
                <thead class="bg-[#003E61] text-white font-bold bg-blue-003E61">
                    <tr>
                        <th>Proyecto</th>
                        <th>Equipo</th>
                        <th>Estado</th>
                        <th>Asesor A/E</th>
                        <th>Carrera</th>
                        <th>Empresa</th>
                    </tr>
                </thead>
                <tr>
                    <td>ProjectSync</td>
                    <td>SM53</td>
                    <td>Activo</td>
                    <td>Rafael Villegas</td>
                    <td>TSU Desarrollo de Software</td>
                    <td>DotNet</td>
                </tr>
                <tr>
                    <td>Green Garden</td>
                    <td>Dinamita</td>
                    <td>En proceso</td>
                    <td>Mayra Fuentes</td>
                    <td>TSU Desarrollo de Software</td>
                    <td>Turicun</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
