@extends('layouts.panelUsers')

@section('titulo')
    Generar reportes
@endsection

@section('contenido')
<div class="flex justify-center m-10">

    <div class="w-11/12">
        <div class="relative w-full ">
            <p
                class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-gray-600 font-bold text-3xl uppercase">
                GENERAR REPORTES
            </p>
        </div>
        <div class="bg-white rounded-lg overflow-hidden md:flex border-solid border-l-8 border-[#00ab84]">
            <div class="w-full">
                <div class="p-4 md:p-5 bg-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-bold text-xl">Carta de Aprobación</p>
                            <div class="flex items-start">
                                <span class="text-gray-700">Disponible</span>
                            </div>
                        </div>
                        <a href="{{ route('aprobacion') }}" class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-[#00ab84] hover:bg-teal-600 font-bold text-white rounded-lg">Generar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 bg-white rounded-lg overflow-hidden md:flex border-solid border-l-8 border-[#00ab84]">
            <div class="w-full">
                <div class="p-4 md:p-5 bg-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-bold text-xl">Cédula de anteproyecto</p>
                            <div class="flex items-start">
                                <span class="text-gray-700">Disponible</span>
                            </div>
                        </div>
                        <a href="{{ route('cedula.anteproyecto') }}" class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-[#00ab84] hover:bg-teal-600 font-bold text-white rounded-lg">Generar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 bg-white rounded-lg overflow-hidden md:flex border-solid border-l-8 border-[#00ab84]">
            <div class="w-full">
                <div class="p-4 md:p-5 bg-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-bold text-xl">Carta de digitalización</p>
                            <div class="flex items-start">
                                <span class="text-gray-700">Disponible</span>
                            </div>
                        </div>
                        <a href="{{ route('carta-digitalizacion') }}" class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-[#00ab84] hover:bg-teal-600 font-bold text-white rounded-lg">Generar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection
