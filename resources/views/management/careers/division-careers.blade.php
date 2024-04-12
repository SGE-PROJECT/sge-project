@extends('layouts.panelUsers')

@section('titulo', 'Carreras')

@section('contenido')
<div class="relative w-full h-40 bg-green-400">
    <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white font-bold text-3xl uppercase">
        Carreras de la División {{ $division->name }}
    </p>
</div>
        <!-- Listado de carreras -->
        <ul role="list" class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 xl:gap-y-16 mb-10">
            @foreach ($programs as $program)
            <div class="max-w-sm w-full mx-auto mt-5">
                <div class="animate-pulse flex space-x-4 border border-gray-300 shadow-lg p-4 rounded-lg">
                    <div class="rounded-full bg-gray-300 h-10 w-10 flex items-center justify-center">
                        <img src="{{ asset($program->programImage->image_path ?? 'path_to_default_image') }}" alt="{{ $program->name }}" class="h-full w-full object-cover rounded-full">
                    </div>

                  <div class="flex-1 space-y-6 py-1">
                    <h3 class="text-base font-semibold tracking-tight text-gray-900">{{ $program->name }}</h3>
                    <div class="space-y-3">
                        <p class="text-sm text-gray-500">{{ $program->description }}</p>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach
        </ul>
    </div>
@endsection
