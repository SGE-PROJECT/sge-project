@extends('layouts.panelUsers')

@section('titulo')
    Profesor
@endsection

@section('js')
    @vite('resources/js/asesoriasStudent.js')
@endsection

@section('css')
    @vite('resources/css/advisory/asesoriasStudents.css')
@endsection

@section('contenido')
    @php
        use Carbon\Carbon;

    @endphp
    <main>
        <div class="container mx-auto px-4 mt-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1]  py-2 px-4">
                        <h2 class="text-xl font-semibold text-white mb-2">
                            Mis asesorados
                        </h2>
                    </div>
                    <div class="p-4">


                        <div class="max-w-2xl mx-auto">

                            <div class="p-1 max-w-md bg-white">

                                <div class="flow-root">
                                    <ul role="list" class="divide-y divide-gray-200 ">

                                        @foreach ($getStudents as $student)
                                            <li class="pt-3 pb-3 sm:pt-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-shrink-0">
                                                        <img class="w-8 h-8 rounded-full" src={{ $student->user->photo }}
                                                            alt="Thomas image">
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate ">
                                                            {{ $student->user->name }}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate">
                                                            {{ $student->user->email }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                        </div>
                        <div class="flex justify-center mt-4 md:mt-6">

                            <a href={{ route('asesorados', [Auth()->user()->slug]) }}
                                class="py-2 px-4 ms-2 text-sm font-bold focus:outline-none bg-[#00ab84] rounded-lg border border-gray-200 h hover: focus:z-10 focus:ring-4 focus:ring-gray-100 text-white">Gestionar
                                mis asesorados</a>
                        </div>

                    </div>

                </div>


                <!-- Tarjeta 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-2 px-4">
                        <h2 class="text-xl font-semibold text-white mb-2">Anteproyectos</h2>
                    </div>
                    <div class="p-4">


                        @foreach ($Projects as $project)
                        <div id="toast-default" class="flex bg-white items-center w-full p-4 text-gray-500 rounded-lg shadow mb-2" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-teal-500 bg-green-50 rounded-lg">
                                <i class='bx bxs-briefcase'></i>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">{{ $project->name_project }}</div>

                            <div class="ml-auto"></div>
                            <div class="mx-3">
                                <button class="px-3 py-1 bg-[#00ab84] text-white text-sm font-bold rounded-lg hover:bg-teal-700">Ver cédula</button>
                            </div>
                        </div>





                        @endforeach

                        <div class="flex justify-center mt-4 md:mt-6">

                            <a href={{ route('asesorados', [Auth()->user()->slug]) }}
                                class="py-2 px-4 ms-2 text-sm font-bold focus:outline-none bg-[#00ab84] rounded-lg border border-gray-200 h hover: focus:z-10 focus:ring-4 focus:ring-gray-100 text-white">Ver todos los anteproyectos</a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-2 px-4">
                        <h2 class="text-xl font-semibold text-white mb-2">Avisos importantes</h2>
                    </div>
                    <div class="p-4">


                        <div id="toast-default"
                            class="flex bg-blue-50 items-center w-full  p-4 text-gray-500  rounded-lg shadow mb-2"
                            role="alert">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-200 rounded-lg ">
                                <i class='bx bxs-megaphone'></i>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">Fecha de finalización de las estadías será el 10 de
                                septiembre. Favor de enviar la documentación correcta.</div>

                        </div>

                        <div id="toast-default"
                            class="flex items-center w-full  p-4 text-gray-500 bg-white rounded-lg shadow mb-2"
                            role="alert">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-200 rounded-lg ">
                                <i class='bx bxs-megaphone'></i>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">Fecha de finalización de las estadías será el 10 de
                                septiembre. Favor de enviar la documentación correcta.</div>

                        </div>

                        <div id="toast-default"
                            class="flex items-center w-full mb-2 p-4 text-gray-500 bg-white rounded-lg shadow "
                            role="alert">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-200 rounded-lg ">
                                <i class='bx bxs-megaphone'></i>
                                <span class="sr-only">Icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">Fecha de finalización de las estadías será el 10 de
                                septiembre. Favor de enviar la documentación correcta.</div>
                        </div>


                    </div>
                </div>

            </div>




        </div>

    </main>
@endsection
