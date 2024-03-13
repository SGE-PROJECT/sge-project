@extends('layouts.panel')
@section('contenido')

<!-- tabla de datos -->
 {{-- <div class="w-[96%] ml-3 pl-1.5 mr-3 rounded-tl-md rounded-tr-md bg-slate-600 flex">
    <select class="py-3 px-4 bg-white rounded-lg my-5 mr-3 flex cursor-pointer">
        <option value="carreras">Carreras</option>
        <option value="carreras">Gastronomia</option>
        <option value="carreras">Redes</option>
        <option value="carreras">Contaduria</option>
    </select>
    <select class="py-3 px-4 bg-white rounded-lg my-5 mr-3 flex cursor-pointer">
        <option value="empresas">Empresas</option>
        <option value="empresas">Mc</option>
        <option value="empresas">Cinepolis</option>
        <option value="empresas">Ut</option>
    </select>
    <select class="py-3 px-4 bg-white rounded-lg my-5 mr-3 flex cursor-pointer">
        <option value="integrantes">Integrantes</option>
        <option value="integrantes">Irving</option>
        <option value="integrantes">Anhony</option>
        <option value="integrantes">leyva</option>
    </select>
</div>

    
    <!-- Estudiantes -->
    <div class="flex w-[100%]  max-md:block overflow-x-hidden">
        <div class="">
            <div class="w-[90%] ml-6  px-0 mt-5 rounded  bg-white flex">
                <div class="flex items-center">
                    <div class="w-[50%] pt-2 ">
                        <div class="flex justify-evenly rounded pl-2 w-80 pt-0  text-white bg-slate-600
                        ">
                            <p>Equipo: <b class="">SM-53</b></p>
                            <p>Proyecto: <b class="">Proyecto Sync</b></p>
                        </div>
                        <div class="bg-white  flex justify-evenly">
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://i.pinimg.com/564x/3a/be/84/3abe8400da18914a7ce19c22744537e0.jpg"
                                class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p>Anthony W.</p>
                            </div>
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://i.pinimg.com/564x/a3/5a/be/a35abe1aa2d2f0357dcb2fac8db7cb01.jpg"
                                class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p>Pepito Q.</p>
                            </div>
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://www.publicdomainpictures.net/pictures/280000/velka/dusky-grey-sky-background.jpg"
                                    class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-narrow-left" width="72" height="72"
                            viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l4 4" />
                            <path d="M5 12l4 -4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-narrow-right" width="72" height="72"
                            viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M15 16l4 -4" />
                            <path d="M15 8l4 4" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex justify-evenly  rounded text-white bg-slate-600">
                            <p><b>Asesores A/C</b></p>
                        </div>
                        <div class="bg-white px-3">
                            <div class="py-1 flex w-1/1 justify-evenly items-center ml-2 ">
                                <img src="https://i.pinimg.com/564x/3a/be/84/3abe8400da18914a7ce19c22744537e0.jpg"
                                    class="rounded-full w-[3.1rem]" alt="imagen1">
                                <p>Anthony W.</p>
                            </div>
                            <hr class="bg-black border-black ml-5 mr-5">
                            <div class=" py-3 flex justify-evenly items-center mx-4">
                                <p>Pepito Q.</p>
                                <img src="https://i.pinimg.com/564x/a3/5a/be/a35abe1aa2d2f0357dcb2fac8db7cb01.jpg"
                                    class="rounded-full w-[3.1rem]" alt="imagen1">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[90%] ml-6  px-0 mt-5 rounded bg-white flex">
                <div class="flex items-center">
                    <div class="w-[50%] pt-2">
                        <div class="flex justify-evenly rounded pl-2 w-80 text-white bg-slate-600">
                            <p>Equipo: <b class="">SM-53</b></p>
                            <p>Proyecto: <b class="">Proyecto Sync</b></p>
                        </div>
                        <div class="bg-white  flex justify-evenly">
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://i.pinimg.com/564x/3a/be/84/3abe8400da18914a7ce19c22744537e0.jpg"
                                class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p>Anthony W.</p>
                            </div>
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://i.pinimg.com/564x/a3/5a/be/a35abe1aa2d2f0357dcb2fac8db7cb01.jpg"
                                class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p>Pepito Q.</p>
                            </div>
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://www.publicdomainpictures.net/pictures/280000/velka/dusky-grey-sky-background.jpg"
                                    class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-narrow-left" width="72" height="72"
                            viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l4 4" />
                            <path d="M5 12l4 -4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-narrow-right" width="72" height="72"
                            viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M15 16l4 -4" />
                            <path d="M15 8l4 4" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex justify-evenly rounded  text-white bg-slate-600">
                            <p><b>Asesores A/C</b></p>
                        </div>
                        <div class="bg-white px-3">
                            <div class="py-1 flex w-1/1 justify-evenly items-center ml-2 ">
                                <img src="https://i.pinimg.com/564x/3a/be/84/3abe8400da18914a7ce19c22744537e0.jpg"
                                    class="rounded-full w-[3.1rem]" alt="imagen1">
                                <p>Anthony W.</p>
                            </div>
                            <hr class="bg-black border-black ml-5 mr-5">
                            <div class=" py-3 flex justify-evenly items-center mx-4">
                                <p>Pepito Q.</p>
                                <img src="https://i.pinimg.com/564x/a3/5a/be/a35abe1aa2d2f0357dcb2fac8db7cb01.jpg"
                                    class="rounded-full w-[3.1rem]" alt="imagen1">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[90%] ml-6  px-0 mt-5 rounded  bg-white flex">
                <div class="flex items-center">
                    <div class="w-[50%] pt-2">
                        <div class="flex justify-evenly rounded pl-2 w-80  text-white bg-slate-600
                        ">
                            <p>Equipo: <b class="">SM-53</b></p>
                            <p>Proyecto: <b class="">Proyecto Sync</b></p>
                        </div>
                        <div class="bg-white  flex justify-evenly">
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://i.pinimg.com/564x/3a/be/84/3abe8400da18914a7ce19c22744537e0.jpg"
                                class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p>Anthony W.</p>
                            </div>
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://i.pinimg.com/564x/a3/5a/be/a35abe1aa2d2f0357dcb2fac8db7cb01.jpg"
                                class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p>Pepito Q.</p>
                            </div>
                            <div class="w-[100%] py-3  mx-4">
                                <img src="https://www.publicdomainpictures.net/pictures/280000/velka/dusky-grey-sky-background.jpg"
                                    class="h-[4.2rem] rounded-md" alt="imagen1">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-narrow-left" width="72" height="72"
                            viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l4 4" />
                            <path d="M5 12l4 -4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-narrow-right" width="72" height="72"
                            viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M15 16l4 -4" />
                            <path d="M15 8l4 4" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex justify-evenly  rounded text-white bg-slate-600">
                            <p><b>Asesores A/C</b></p>
                        </div>
                        <div class="bg-white px-3">
                            <div class="py-1 flex w-1/1 justify-evenly items-center ml-2 ">
                                <img src="https://i.pinimg.com/564x/3a/be/84/3abe8400da18914a7ce19c22744537e0.jpg"
                                    class="rounded-full w-[3.1rem]" alt="imagen1">
                                <p>Anthony W.</p>
                            </div>
                            <hr class="bg-black border-black ml-5 mr-5">
                            <div class=" py-3 flex justify-evenly items-center mx-4">
                                <p>Pepito Q.</p>
                                <img src="https://i.pinimg.com/564x/a3/5a/be/a35abe1aa2d2f0357dcb2fac8db7cb01.jpg"
                                    class="rounded-full w-[3.1rem]" alt="imagen1">
                            </div>

                        </div>
                    </div>
                </
        </div>
        <!-- Siguiente seccion -->
      
        
    </div>  --}}
    <h1 class="text-3xl font-bold text-center mt-5 mb-8">Equipos</h1>
    <div class="p-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @include('administrator.graph-projects')
        @include('administrator.graph-users')
        @include('administrator.graph-teams')
        @include('administrator.graph-books')
    </div>
    <div class="flex items-baseline align-middle">
        <button class="bg-[#03A696] hover:bg-[#025b52] text-white font-bold py-2 px-4 rounded ml-8 mt-10 mr-5 w-32" onclick=" = '{{ route('dashboardProjects') }}'">
            Ir a Agregar
        </button>
        @include('administrator.filter')
        <div class="relative ml-2 w-55">
            <label for="Search" class="sr-only">Search</label>
            <input type="text" id="Search" placeholder="Buscar"
                class="w-full rounded border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />
            <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                <button type="button" class="text-gray-600 hover:text-gray-700">
                    <span class="sr-only">Search</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </span>
        </div>
        <a
            class="group flex items-center justify-between gap-4 rounded border border-[#03A696] bg-[#03A696] px-5 py-1 transition-colors hover:bg-[#025b52] focus:outline-none focus:ring ml-auto mr-8 w-38">
            <span class="font-medium text-white transition-colors group-hover:text-white group-active:text-white">
                Exportar
            </span>

            <span
                class="shrink-0 rounded-full border border-current bg-white p-2 text-[#03A696] group-active:text-indigo-500">
                <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </span>
        </a>
    </div>
    <div class="tabla-project ">
        <div class="tabla-cont-project ">
            <table class="rounded-lg">
                <thead class="bg-[#003E61]  text-white font-bold bg-blue-003E61">
                    <tr>
                        <th>Integrantes</th>
                        <th>Proyecto</th>
                        <th>Asesor academico</th>
                        <th>Asesor empresarial</th>
                        <th>División</th>
                    </tr>
                </thead>
                <tr>
                    <td>Josue</td>
                    <td>Sistema de gestion de proyectos</td>
                    <td>Rafael </td>
                    <td>Pedrito</td>
                    <td>Gastronomia</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> 



@endsection 