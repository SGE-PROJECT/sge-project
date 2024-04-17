@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="icon" href="{{ asset('images/logo_sge.svg') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('css/Login.css') }}" rel="stylesheet">
</head>

<body class="bg-purple-900">

    <div class="min-h-screen flex items-center justify-center relative">
        <div class="absolute inset-0 w-full h-full bg-cover bg-no-repeat"
            style="background-image: url('http://www.utcancun.edu.mx/wp-content/uploads/2016/07/e75f02ac-c4da-4162-a1a7-5e8ef604e830.jpg');">
        </div>

        <div class="absolute inset-0 bg-black opacity-65"></div>

        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full relative z-10">

            @if (session('error'))
                <div id="error-msg" class="bg-red-500 text-white text-center p-4 mb-4 rounded-md shadow-md">
                    {{ session('error') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('error-msg').style.display = 'none';
                    }, 2000);
                </script>
            @endif

            @if (session('success'))
                <div class="bg-red-500 text-white text-center p-4 mb-4 rounded-md shadow-md">
                    {{ session('success') }}
                </div>
            @endif
            <div class="text-center">
                <img src="{{ asset('images/logo_sge_login.svg') }}" class="w-60 h-40 mx-auto ">
            </div>

            <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="remember" value="true" />

                <div class="relative">
                    <label for="email" class="block text-gray-700 font-bold">Correo Electrónico:</label>
                    <input name="email" id="email"
                        class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-indigo-500 rounded-md shadow-sm block mt-1"
                        type="email" placeholder="Ingresa tu correo" required>

                    @error('email')
                        <p class="mt-2 bg-red-500 text-white rounded-lg text-sm text-center">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="relative">
                    <label for="password" class="block text-gray-700 font-bold">Contraseña:</label>
                    <input name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-indigo-500 rounded-md shadow-sm block mt-1"
                        type="password" placeholder="Ingresa tu contraseña" required>

                    @error('password')
                        <p class="mt-2 bg-red-500 text-white rounded-lg text-sm text-center">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-gray-700">Recordarme</label>
                </div>

                <div class="mt-10">
                    <button type="submit"
                        class="w-full bg-teal-800 text-gray-100 font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline hover:bg-blue-950">
                        Iniciar Sesión
                    </button>

                    <div class="text-center">
                        <div class="mt-4 text-sm">
                            <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 underline">¿Olvidaste
                                tu contraseña?</a>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <ul class="circles absolute inset-0 pointer-events-none">
        @for ($i = 0; $i < 12; $i++)
            <li></li>
        @endfor
    </ul>

</body>

</html>
