@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="icon" href="{{ asset('images/logo_sge.svg') }}">
    <link href="{{ asset('css/Login.css') }}" rel="stylesheet">
</head>

<body>

    <div class="relative min-h-screen flex">
        @if (session('error'))
    <div class="bg-red-500 text-white text-center p-4 fixed top-0 left-0 right-0 z-50 shadow-md noti" id="noti">
        {{ session('error') }}
    </div>
    @endif

        @if (session('success'))
            <div class="bg-red-500 text-white text-center p-4 fixed top-0 left-0 right-0 z-50 shadow-md noti"
                id="noti">
                {{ session('success') }}
            </div>
        @endif
        <script>
            setTimeout(() => {
                document.getElementById("noti").classList.add("ocultarNoti");
            }, 4000);
        </script>
        <div
            class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-7 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
                style="background-image: url(http://www.utcancun.edu.mx/wp-content/uploads/2016/07/e75f02ac-c4da-4162-a1a7-5e8ef604e830.jpg)">
                <div class="absolute bg-gradient-to-b from-sky-800 to-green-900 opacity-90 inset-0 z-0"></div>
                <div class="absolute triangle  min-h-screen right-0 w-16"></div>
                <img src="{{ asset('images/jovenes.png') }}" class="h-96 absolute right-1 ml-32 bottom-0" style="z-index: 1" />
                <div class="w-full  max-w-md z-10">
                    <div class="sm:text-5xl xl:text-4xl font-bold leading-tight mb-48 custom-font text-center">
                        BIENVENIDO AL SISTEMA DE GESTIÓN DE ESTADÍAS</div>
                </div>
                <ul class="circles">
                    @for ($i = 0; $i < 10; $i++)
                        <li></li>
                    @endfor
                </ul>
            </div>


            <div class="h-screen md:flex md:items-center w-full md:justify-center sm:w-auto xl:w-2/5 sm:rounded-lg md:rounded-none bg-white ">
                <div class="max-w-md w-full">
                    <img src="{{ asset('images/logo_sge_login.svg') }}" class="w-60 h-24 ml-24 "
                        style="width: 60%; height: 60%;">

                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-blue-950 font-serif ml-5">Iniciar Sesión</h2>
                    </div>
                    <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-9">
                        @csrf
                        <input type="hidden" name="remember" value="true" />
                        <div class="relative">
                            <label class="ml-3 text-normal font-bold text-gray-800 tracking-wide">Correo
                                Electrónico:</label>
                            <div class="relative">
                                <input name="email" id="email"
                                    class="w-full text-base px-4 py-2 border-b border-gray-600 focus:outline-none rounded-2xl focus:border-indigo-500 pl-11"
                                    type="email" placeholder="Ingresa tu correo" required>
                            </div>
                            @error('email')
                        <p class="mt-2 bg-red-500 text-white rounded-lg text-sm
                        text-center">
                            {{ $message }}</p>
                        @enderror
                        </div>
                        <div class="mt-8">
                            <label class="text-normal font-bold text-gray-800 tracking-wide">Contraseña:</label>
                            <div class="relative">
                                <input name="password" id="password"
                                    class="w-full text-base px-4 py-2 pr-10 border-b rounded-2xl border-gray-600 focus:outline-none focus:border-indigo-500 pl-11"
                                    type="password" placeholder="Ingresa tu contraseña" required>
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePasswordVisibility()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                        <p class="mt-2 bg-red-500 text-white rounded-lg text-sm
                        text-center">
                            {{ $message }}</p>
                        @enderror
                        </div>

                        <div class="mt-4">
                            <button type="button" onclick="submitForm(event)"
                                class="w-full mt-4 flex justify-center bg-blue-950 hover:bg-teal-800 text-gray-100 md:p-3 rounded-full tracking-wide font-black shadow-lg cursor-pointer transition ease-in duration-600 font-sans">Iniciar
                                Sesión</button>
                        </div><div class="text-center">
                            <div class="mt-2 text-sm">
                                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 underline">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var passwordVisibilityIcon = document.getElementById('password-visibility-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordVisibilityIcon.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>';
            } else {
                passwordInput.type = 'password';
                passwordVisibilityIcon.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/></svg>';
            }
        }
        function submitForm(event) {
            if (event) {
                event.preventDefault(); // Prevents the default form submission
            }
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            // Assign values to hidden inputs if necessary
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
            // Submit the form
            document.getElementById('loginForm').submit();
        }
        // Add event listener for key press (Enter)
        document.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                submitForm(event);
            }
        });
    </script>


</body>
