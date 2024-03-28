@extends('layouts.panel')

@section('titulo', 'Dashboard')

@section('contenido')
    @vite('resources/css/administrator/dashboard.css')
    @vite('resources/js/administrator/graph-general.js')
    @vite('resources/js/administrator/divisions.js')

    <div class="p-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @include('administrator.graph-anteprojects')
        @include('administrator.graph-projects')
        @include('administrator.graph-users')
        @include('administrator.graph-books')
    </div>

    <div class="p-6 font-sans">
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-5 mb-6">

            <!--SECCION DE CARRERAS POR DIVISIONES-->
            <div class="seccion-carreras bg-white p-5 rounded-xl">
                <div class="flex justify-between mb-4 items-start">
                    <div class="text-2xl font-bold">Divisiones</div>
                    <hr class="line">
                </div>

                <section>
                    <div class="w-full bg-white border-2 border-gray-300 rounded-lg shadow">
                        <div class="sm:hidden">
                            <label for="tabs-mobile" class="sr-only">Select tab</label>
                            <select id="tabs-mobile" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option>Ingeniería y Tecnología</option>
                                <option>Económico Administrativa</option>
                                <option>Turismo</option>
                                <option>Gastronomía</option>
                            </select>
                        </div>
                        <ul class="hidden text-sm font-medium text-center text-black divide-x divide-gray-300 rounded-lg sm:flex rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                            <li class="w-full">
                                <button id="tecno-tab" data-tabs-target="#tecno" type="button" role="tab" aria-controls="tecno" aria-selected="true" class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none">Ingeniería y Tecnología</button>
                            </li>
                            <li class="w-full">
                                <button id="econ-tab" data-tabs-target="#econ" type="button" role="tab" aria-controls="econ" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none">Económico Administrativa</button>
                            </li>
                            <li class="w-full">
                                <button id="tur-tab" data-tabs-target="#tur" type="button" role="tab" aria-controls="tur" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none">Turismo</button>
                            </li>
                            <li class="w-full">
                                <button id="gast-tab" data-tabs-target="#gast" type="button" role="tab" aria-controls="gast" aria-selected="false" class="inline-block w-full p-4 rounded-se-lg bg-gray-50 hover:bg-gray-100 focus:outline-none">Gastronomía</button>
                            </li>
                        </ul>

                        <div id="fullWidthTabContent" class="border-t border-gray-200 ">
                            <!-- Ingeniería y Tecnología -->
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 " id="tecno" role="tabpanel" aria-labelledby="tecno-tab">
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4">

                                    @include('administrator.career', [
                                        'Namecareer' => 'TI Área Desarrollo de Software Multiplataforma',
                                        'image' => 'images/administrator/pexels-lukas-574071.jpg',
                                    ])
                                    @include('administrator.career', [
                                        'Namecareer' => 'TI Área Infraestructura de Redes Digitales',
                                        'image' => 'images/administrator/redes.jpeg',
                                    ])
                                    @include('administrator.career', [
                                        'Namecareer' => 'Mantenimiento Área Instalaciones',
                                        'image' => 'images/administrator/pexels-kateryna-babaieva-2760241.jpg',
                                    ])
                                    @include('administrator.career', [
                                        'Namecareer' => 'Mantenimiento Área Naval',
                                        'image' => 'images/administrator/pexels-david-mcelwee-16240659.jpg',
                                    ])
                                </div>
                            </div>

                            <!-- Económico Administrativa -->
                            <div class="hidden p-4 bg-white rounded-lg md:p-8" id="econ" role="tabpanel" aria-labelledby="econ-tab">
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3">

                                    @include('administrator.career', [
                                        'Namecareer' => 'Desarrollo de Negocios Área Mercadotecnia',
                                        'image' => 'images/administrator/pexels-alena-darmel-7710218.jpg',
                                    ])
                                    @include('administrator.career', [
                                        'Namecareer' => 'Contaduría',
                                        'image' => 'images/administrator/Conta_1.jpg',
                                    ])
                                    @include('administrator.career', [
                                        'Namecareer' => 'Administración Área Capital Humano',
                                        'image' => 'images/administrator/b910f4651295.jpg',
                                    ])

                                </div>
                            </div>

                            <!-- Turismo -->
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 " id="tur" role="tabpanel" aria-labelledby="tur-tab">
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3">

                                    @include('administrator.career', [
                                        'Namecareer' => 'Turismo Área Desarrollo de Productos Alternativos',
                                        'image' => 'images/administrator/ventas22-696x586.jpg',
                                    ])
                                    @include('administrator.career', [
                                        'Namecareer' => 'Turismo Área en Hotelería',
                                        'image' => 'images/administrator/hoteleria.jpg',
                                    ])
                                    @include('administrator.career', [
                                        'Namecareer' => 'Terapia Física',
                                        'image' => 'images/administrator/bono-fisioterapia-pamplona.jpg',
                                    ])

                                </div>
                            </div>

                            <!-- Gastronomía -->
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 " id="gast" role="tabpanel" aria-labelledby="gast-tab">
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4">

                                    @include('administrator.career', [
                                        'Namecareer' => 'Gastronomía',
                                        'image' => 'images/administrator/gastronomia.jpg',
                                    ])

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!--SECCION DE PROYECTOS-->
            @include('administrator.section-projects')

        </div>

        <!--SECCION DE ESTADISTICAS-->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-bold text-2xl">Estadísticas</div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 mb-4">
                    <div class="rounded-md border border-dashed border-gray-200 p-4">
                        <div class="flex items-center mb-0.5">
                            <div class="text-xl font-semibold">10</div>
                            <span
                                class="p-1 rounded text-[12px] font-semibold bg-blue-500/10 text-blue-500 leading-none ml-1">+80</span>
                        </div>
                        <span class="text-gray-400 text-sm">Nuevos</span>
                    </div>

                    <div class="rounded-md border border-dashed border-gray-200 p-4">
                        <div class="flex items-center mb-0.5">
                            <div class="text-xl font-semibold">50</div>
                            <span
                                class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1">+469</span>
                        </div>
                        <span class="text-gray-400 text-sm">Finalizados</span>
                    </div>

                    <div class="rounded-md border border-dashed border-gray-200 p-4">
                        <div class="flex items-center mb-0.5">
                            <div class="text-xl font-semibold">4</div>
                            <span
                                class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-130</span>
                        </div>
                        <span class="text-gray-400 text-sm">Finalizados</span>
                    </div>

                    <div class="rounded-md border border-dashed border-gray-200 p-4">
                        <div class="flex items-center mb-0.5">
                            <div class="text-xl font-semibold">4</div>
                            <span
                                class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-130</span>
                        </div>
                        <span class="text-gray-400 text-sm">Rechazados</span>
                    </div>
                </div>

                <!--GRAFICA-->
                <div class="flex justify-center items-center grafica">
                    <div id="order-chart"></div>
                </div>
                </div>

            <!--SECCION DE RESUMEN-->
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-5 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-bold text-2xl">Resumen</div>
                </div>

                <table class="w-full min-w-[230px]">
                    <thead>
                        <tr>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 pl-2 py-2 bg-gray-100 text-left rounded-tl-md rounded-bl-md">
                                Registros
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/administrator/proyecto-de-diagrama.png') }}" alt=""
                                        class="w-6 h-6 rounded object-cover block">
                                    <span href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Proyectos</span>
                                </div>

                                <div class="overflow-hidden bg-blue-100 h-2 rounded-full w-full my-2.5">
                                    <span class="h-full bg-blue-500 w-full block rounded-full" style="width: 62%"></span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/administrator/equipo-icono.png') }}" alt=""
                                        class="w-6 h-6 rounded object-cover block">
                                    <span href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-rose-500 ml-2 truncate">Equipos</span>
                                </div>

                                <div class="overflow-hidden bg-rose-100 h-2 rounded-full w-full my-2.5">
                                    <span class="h-full bg-rose-500 w-full block rounded-full" style="width: 40%"></span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/administrator/usuario-de-pizarra.png') }}" alt=""
                                        class="w-6 h-6 rounded object-cover block">
                                    <span href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-orange-500 ml-2 truncate">Asesores
                                        académicos</span>
                                </div>

                                <div class="overflow-hidden bg-orange-100 h-2 rounded-full w-full my-2.5">
                                    <span class="h-full bg-orange-500 w-full block rounded-full" style="width: 66%"></span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/administrator/hombre-empleado-alt.png') }}" alt=""
                                        class="w-6 h-6 rounded object-cover block">
                                    <span href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-purple-500 ml-2 truncate">Asesores
                                        empresariales</span>
                                </div>

                                <div class="overflow-hidden bg-purple-100 h-2 rounded-full w-full my-2.5">
                                    <span class="h-full bg-purple-500 w-full block rounded-full"
                                        style="width: 70%"></span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/administrator/usuario-graduado.png') }}" alt=""
                                        class="w-6 h-6 rounded object-cover block">
                                    <span href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-green-500 ml-2 truncate">Estudiantes</span>
                                </div>

                                <div class="overflow-hidden bg-green-100 h-2 rounded-full w-full my-2.5">
                                    <span class="h-full bg-green-500 w-full block rounded-full" style="width: 85%"></span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/administrator/libro-cubierta-abierta.png') }}"
                                        alt="" class="w-6 h-6 rounded object-cover block">
                                    <span href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-cyan-500 ml-2 truncate">Libros</span>
                                </div>

                                <div class="overflow-hidden bg-cyan-100 h-2 rounded-full w-full my-2.5">
                                    <span class="h-full bg-cyan-500 w-full block rounded-full" style="width: 78%"></span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/administrator/alternativa-corporativa.png') }}"
                                        alt="" class="w-6 h-6 rounded object-cover block">
                                    <span href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-pink-500 ml-2 truncate">Empresas</span>
                                </div>

                                <div class="overflow-hidden bg-pink-100 h-2 rounded-full w-full my-2.5">
                                    <span class="h-full bg-pink-500 w-full block rounded-full" style="width: 42%"></span>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
