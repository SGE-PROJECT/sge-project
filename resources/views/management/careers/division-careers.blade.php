@extends('layouts.panelUsers')

@section('titulo', 'Carreras')

@section('contenido')
    <main>

        <div class="relative w-full h-40 ">
            <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-gray-600 font-bold text-3xl uppercase">
                Carreras de la División {{ $division->name }}
            </p>
        </div>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 items-center gap-4">

                @foreach ($programs as $program)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-2 px-4">
                            <div class="flex mt-4 text-center">

                            <h2 class="text-xl font-semibold text-white mb-2">{{ $program->name }}</h2>
                            </div>

                        </div>
                        <div class="p-4 flex wrap justify-center items-center">


                            <div class="w-full max-w-sm bg-white">

                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                        src={{ asset($program->programImage->image_path ?? 'path_to_default_image') }} alt={{ $program->name }} />




                                </div>
                            </div>



                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </main>

@endsection
