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
        @for ($i=0; $i < 6; $i++)
    <div class="card">
        <p class="Titulo">Turismo</p>
        <img src="/images/divisions/General.jpg" alt="Descripción de la imagen">

        <div class="card__content">
          <p class="card__title">Turismo</p>
          <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
          <button class="card__button">Ver mas</button>
        </div>
      </div>
      @endfor
</div>
@endsection
