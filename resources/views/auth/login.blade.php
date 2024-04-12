@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('images/logo_sge.svg') }}">
    <link href="{{ asset('css/Login.css') }}" rel="stylesheet">
</head>
<body>

    <div class="relative min-h-screen flex">
        @if (session('success'))
            <div class="bg-red-500 text-white text-center p-4 fixed top-0 left-0 right-0 z-50 shadow-md noti" id="noti">
                {{ session('success') }}
            </div>
        @endif
        <script>
            setTimeout(() => {
                document.getElementById("noti").classList.add("ocultarNoti");
            }, 4000);
        </script>
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-8 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative" style="background-image: url(http://www.utcancun.edu.mx/wp-content/uploads/2016/07/e75f02ac-c4da-4162-a1a7-5e8ef604e830.jpg)">
                <div class="absolute bg-gradient-to-b from-sky-800 to-green-900 opacity-80 inset-0 z-0"></div>
                <div class="absolute triangle  min-h-screen right-0 w-16"></div>
                <img src="{{ asset('images/empresarios.png') }}" class="h-90 absolute right-0 ml-32 bottom-0" style="z-index: 1" />
                <div class="w-full  max-w-md z-10">
                    <div class="sm:text-5xl xl:text-4xl font-bold leading-tight mb-48 custom-font text-center">BIENVENIDO AL SISTEMA DE GESTIÓN DE ESTADÍAS</div>
                </div>
                <ul class="circles">
                    @for($i = 0; $i < 10; $i++)
                    <li></li>
                    @endfor
                </ul>
            </div>
            <div class="md:flex md:items-center w-full md:justify-center sm:w-auto mt-2 md:mt-14 xl:w-2/5 p-8 md:p-10 sm:rounded-lg md:rounded-none bg-white">
                <div class="max-w-md w-full mr-14">
                  <img src="{{ asset('images/logo_sge_login.svg') }}" class="w-60 h-24 ml-24 " style="width: 60%; height: 60%;">

                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-blue-950 font-serif ml-5">Iniciar Sesión</h2>
                    </div>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                        text-center">{{ $message }}</p>
                    @enderror
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                        text-center">{{ $message }}</p>
                    @enderror
                    <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-9">
                        @csrf
                        <input type="hidden" name="remember" value="true" />
                        <div class="relative">
                            <label class="ml-3 text-normal font-bold text-gray-800 tracking-wide">Correo Electrónico:</label>
                            <div class="relative">
                                <input name="email" id="email" class="w-full text-base px-4 py-2 border-b border-gray-600 focus:outline-none rounded-2xl focus:border-indigo-500 pl-11" type="email" placeholder="Ingresa tu correo" required>
                            </div>
                        </div>
                        <div class="mt-8 ">
                            <label class="text-normal font-bold text-gray-800 tracking-wide">Contraseña:</label>
                            <div class="relative">
                                <input name="password" id="password" class="w-full text-base px-4 py-2 pr-10 border-b rounded-2xl border-gray-600 focus:outline-none focus:border-indigo-500 pl-11" type="password" placeholder="Ingresa tu contraseña" required>
                                <button class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePasswordVisibility()">
                                </button>
                            </div>
                            <p id="password-error" class="text-red-500 mt-2"></p>
                        </div>
                        <div>
                            <button type="button" onclick="submitForm()" class="w-full  flex justify-center bg-blue-950 hover:bg-teal-800 text-gray-100 p-2 md:p-3 rounded-full tracking-wide font-black shadow-lg cursor-pointer transition ease-in duration-600 font-sans">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.querySelector('input[type="password"]');
            var passwordToggle = document.getElementById('password-toggle');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.className = 'fas fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                passwordToggle.className = 'fas fa-eye';
            }
        }

        function submitForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Assign values to hidden inputs if necessary
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;

            // Submit the form
            document.getElementById('loginForm').submit();
        }
    </script>
</body>
</html>
