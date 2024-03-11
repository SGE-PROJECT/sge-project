@extends('layouts.panel')

@section('titulo', 'Divisiones')

@section('contenido')
    <!-- Container First -->
    <div class="header_divisions">
        <h1 class="text-font_divisions font-bold">Divisiones:</h1>

        <span class="flex">
            <input class="search_divisions px-3 outline-none border-l-5" type="text" placeholder="Buscar...">
            <button class="search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </span>
    </div>

    <div class="BtnCrearDivisions">
        <button class="Btn_division">
            <div class="sign_division">+</div>
            <div class="text_division">Añadir</div>
        </button>
    </div>

    <!-- Container of Rows for Six -->
    <div class="contenedor_divisions">
        @foreach($divisions as $division)
            <div class="card__division">
                <p class="Titulo">{{ $division->name }}</p>
                @if($division->divisionImage)
                    <img src="{{ $division->divisionImage->image_path }}" alt="{{ $division->description }}">
                @else
                <img src="images/divisions/SinImagen.jpg" alt="Imagen no disponible">
                @endif
                <div class="card__content">
                    <p class="card__title">{{ $division->name }}</p>
                    <p class="card__description">{{ $division->description }}</p>
                    <p class="card__description">Director[a]: </p>
                    <p class="card__description">Subdirector[a]:</p>
                    <button class="card__button">Ver más</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
