@extends('layouts.panel')

@section('titulo', 'Divisiones')

@section('contenido')

<div class="contenedor">
    <h1 class="text-font">Divisiones:</h1>
    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/4 px-4">
            <div class="bg-white max-w-sm rounded overflow-hidden shadow-lg mt-6 h-full relative card" onclick="toggleCard(this)">
                <img class="w-full h-40 object-cover" src="images/divisions/ing.png" alt="Imagen de la tarjeta">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/ing-profile.png" alt="Imagen circular">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mt-10 mb-2 text-center">Ingeniería y Tecnología</div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/4 px-4">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mt-6 h-full relative card bg-white" onclick="toggleCard(this)">
                <img class="w-full h-40 object-cover" src="images/divisions/gs.png" alt="Imagen de la tarjeta">
                <div class=" absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/gs-profile.png" alt="Imagen circular">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mt-14 mb-2 text-center">Gastronomía</div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/4 px-4">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mt-6 h-full relative card bg-white" onclick="toggleCard(this)">
                <img class="w-full h-40 object-cover" src="images/divisions/ts.png" alt="Imagen de la tarjeta">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/ts-profile.png" alt="Imagen circular">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mt-14 mb-2 text-center">Turismo</div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/4 px-4">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mt-6 h-full relative card bg-white" onclick="toggleCard(this)">
                <img class="w-full h-40 object-cover" src="images/divisions/ec.png" alt="Imagen de la tarjeta">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <img class="w-24 h-24 rounded-full bg-white shadow-lg" src="images/divisions/ec-profile.png" alt="Imagen circular">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mt-10 mb-2 text-center">Economico administrativo</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="{{ asset('scripts/divisions.js') }}"></script>
@endsection
