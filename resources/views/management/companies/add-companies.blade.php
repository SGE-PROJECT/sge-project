@extends('layouts.panel')
@section('titulo', 'Empresas')
@section('contenido')
<div class="container">
    <a href="{{ route('empresas.index') }}">
    <div class="flex items-center ml-11 mt-11 mb-5">
        <button type="submit" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Regresar
        </button>
    </div>
</a>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="border-b py-2 rounded mb-4">
            <h2 class="text-2xl text-center font-bold text-aqua-600">Agregar Nueva Empresa</h2>
        </div>
        <form method="POST" action="{{ route('empresas.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="mb-4">
                <label for="company_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Empresa</label>
                <input id="company_name" type="text" placeholder="Nombre de la Empresa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company_name') border-red-500 @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

            </div>
            @error('company_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
            <div class="mb-4">
                <label for="contact_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de Contacto</label>
                <input id="contact_name" type="text" placeholder="Nombre de Contacto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('contact_name') border-red-500 @enderror" name="contact_name" value="{{ old('contact_name') }}" required autocomplete="contact_name">
            </div>
            @error('contact_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Dirección</label>
                <input id="address" type="text" placeholder="Dirección" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') border-red-500 @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

            </div>
            @error('address')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
            <!-- Agregar campos restantes -->

            <div class="mb-4">
                <label for="affiliation_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Afiliación</label>
                <input id="affiliation_date" type="date" placeholder="Fecha de Afiliación" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('affiliation_date') border-red-500 @enderror" name="affiliation_date" value="{{ old('affiliation_date') }}" required autocomplete="affiliation_date">

            </div>
            @error('affiliation_date')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                <textarea id="description" placeholder="Descripción" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" name="description" required autocomplete="description" rows="3">{{ old('description') }}</textarea>

            </div>
            @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
            <div class="mb-4">
                <label for="contact_phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                <input id="contact_phone" type="number" placeholder="Teléfono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('contact_phone') border-red-500 @enderror" name="contact_phone" value="{{ old('contact_phone') }}" required autocomplete="contact_phone">

            </div>
            @error('contact_phone')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

            <div class="mb-4">
                <label for="contact_email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico</label>
                <input id="contact_email" type="email" placeholder="Correo Electrónico" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('contact_email') border-red-500 @enderror" name="contact_email" value="{{ old('contact_email') }}" required autocomplete="contact_email">

            </div>
            @error('contact_email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
                <input id="image" type="file" placeholder="Imagen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" name="image" required>

            </div>
            @error('image')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

            <div class="flex items-center justify-center">
                <button type="submit" class="bg-[#03A696] hover:bg-[#03A699] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Agregar Empresa
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
