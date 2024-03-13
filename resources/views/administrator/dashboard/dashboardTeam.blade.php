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