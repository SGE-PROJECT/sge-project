@extends('layouts.app')

<div class="flex h-screen bg-slate-300">
    <div class="w-1/2 bg-gray-800 flex flex-col justify-center items-center px-8 relative rounded-r-3xl">
        <a href="/Iniciar-sesion">
            <img src="/images/logo_sge.svg" class="absolute top-0 left-0 mt-8 ml-8" style="width: 100px;">
        </a>
        <div class="flex items-center mb-4 w-full ml-8">
            <a href="{{ route('login') }}" class="flex items-center text-green-500 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
            </a>
        </div>

        <h2 class="text-xl font-bold text-white">¿Olvidaste tu contraseña?</h2>
        <p class="text-white my-4">No te preocupes, podemos ayudarte.</p>

        @if (session('status'))
            <div class="bg-green-500 text-white text-center p-4 fixed top-0 left-0 right-0 z-50 shadow-md noti" id="noti">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500 text-white text-center p-4 fixed top-0 left-0 right-0 z-50 shadow-md noti" id="noti">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form class="w-full max-w-md" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="email">
                        Correo electrónico
                    </label>
                    <input class="appearance-none block w-full bg-white text-gray-800 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-200 focus:border-gray-500" id="email" type="email" name="email" placeholder="Correo electrónico">
                </div>
                <div class="w-full flex justify-end px-3 mb-6">
                    <button class="bg-white text-blue-500 hover:text-white font-bold py-2 px-4 border border-blue-500 hover:bg-blue-500 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Enviar contraseña
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="w-1/2 flex justify-center items-center relative px-8" style="background-image: url('https://images.pexels.com/photos/3646172/pexels-photo-3646172.jpeg'); background-size: cover;">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl uppercase font-bold">Importante</h2>
            <div class="mt-4">
                <ul class="list-disc ml-8">
                    <li class="mb-1">No revele su contraseña.</li>
                    <li class="mb-1">Una vez completando los datos solicitados, revise su correo.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
