@extends('layouts.panel')

@section('titulo', 'Carreras por divisiones')

@section('contenido')
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <!-- Titulo y descripción de la división -->
        <div class="mb-10 max-w-2xl">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Carreras de la División {{ $division->name }}</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">{{ $division->description }}</p>
        </div>

        <!-- Listado de carreras -->
        <ul role="list" class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 xl:gap-y-16">
            @foreach ($programs as $program)
            <li>
                <div class="flex items-center gap-x-6">
                    <img class="h-16 w-16 rounded-full" src="{{ asset($program->programImage->image_path ?? 'path_to_default_image') }}" alt="{{ $program->name }}">
                    <div>
                        <h3 class="text-base font-semibold tracking-tight text-gray-900">{{ $program->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $program->description }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection