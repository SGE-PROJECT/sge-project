@extends('layouts.panelUsers')

@section('titulo')
    Configuración de la Cuenta
@endsection

@section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    @vite('resources/css/profile/configuration.css');

    <div class="flex justify-center pt-6 p-6">
        <div class="bg-white rounded-lg p-6 shadow-xl w-full max-w-6xl mx-auto">
            <div class="md:flex md:flex-row md:justify-between">
                    <!-- Sección de foto de perfil -->
                    <div class="md:w-1/2 lg:w-1/3 xl:w-1/4 mb-6 md:mb-0 text-center md:text-left md:border-r md:pr-6 md:pt-40">
                        <h2 class="text-2xl font-semibold text-center mb-4">Foto de perfil</h2>
                        <p class="text-gray-600 text-center mb-4">Añade una foto.</p>

                        <img id="profilePicture" alt="Profile Picture" src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : asset('images/profileconfiguration/user-icon.jpeg') }}" class="w-48 h-48 rounded-full border-4 border-white shadow-xl  mx-auto" onclick="openModal()">
                        
                        @if (auth()->user()->photo)

                        <form method="POST" action="{{ route('configurar_cuenta.remove_photo', ['id' => auth()->id()]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-6 py-2 mt-5 rounded hover:bg-red-600 transition-colors cursor-pointer flex items-center justify-center  mx-auto">
                                Eliminar foto de perfil
                            </button>
                        </form>
                        @endif
                            
                    

                        <form method="POST" action="{{ route('configurar_cuenta.update', ['id' => auth()->id()]) }}"
                            enctype="multipart/form-data" class="space-y-4" id="photoForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <input id="photo" name="photo" type="file" class="hidden"
                                    onchange="previewImage(event)">
                                <label for="photo"
                                    class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors cursor-pointer flex items-center justify-center">
                                    Subir una foto de perfil
                                </label>
                            </div>
                            
                    </div>





                <!-- Sección de datos de usuario -->
                <div class="md:w-1/2 lg:w-2/3 xl:w-3/4 pl-6">
                    <h2 class="text-2xl font-semibold mb-4">Datos de usuario</h2>
                    <p class="text-gray-600 mb-4">Añade o actualiza tus datos de contacto</p>
                    @if (session('success'))
                        <div class="text-green-500 mb-4 auto-hide-message">{{ session('success') }}</div>
                    @endif


                    <div>
                        <div class="form-control">
                            <input type="text" name="name" required="" value="{{ auth()->user()->name }}">
                            <label>
                                <span style="transition-delay:0ms">N</span>
                                <span style="transition-delay:50ms">o</span>
                                <span style="transition-delay:100ms">m</span>
                                <span style="transition-delay:150ms">b</span>
                                <span style="transition-delay:200ms">r</span>
                                <span style="transition-delay:250ms">e</span>
                            </label>


                            <!-- Mensaje de error para el nombre -->
                            @error('name')
                                <div class="text-red-500 mb-4 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <input type="text" name="phone_number" required value="{{ auth()->user()->phone_number }}">
                            <label>
                                <span style="transition-delay:0ms">N</span>
                                <span style="transition-delay:50ms">ú</span>
                                <span style="transition-delay:100ms">m</span>
                                <span style="transition-delay:150ms">e</span>
                                <span style="transition-delay:200ms">r</span>
                                <span style="transition-delay:250ms">o</span>
                                <span style="transition-delay:300ms"> </span>
                                <span style="transition-delay:350ms">d</span>
                                <span style="transition-delay:400ms">e</span>
                                <span style="transition-delay:450ms"> </span>
                                <span style="transition-delay:500ms">t</span>
                                <span style="transition-delay:550ms">e</span>
                                <span style="transition-delay:600ms">l</span>
                                <span style="transition-delay:650ms">é</span>
                                <span style="transition-delay:700ms">f</span>
                                <span style="transition-delay:750ms">o</span>
                                <span style="transition-delay:800ms">n</span>
                                <span style="transition-delay:850ms">o</span>
                            </label>

                            <!-- Mensaje de error para el número de teléfono -->
                            @error('phone_number')
                                <div class="text-red-500 mb-4 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <input type="email" name="email" required="" value="{{ auth()->user()->email }}">
                            <label>
                                <span style="transition-delay:0ms">C</span>
                                <span style="transition-delay:50ms">o</span>
                                <span style="transition-delay:100ms">r</span>
                                <span style="transition-delay:150ms">r</span>
                                <span style="transition-delay:200ms">e</span>
                                <span style="transition-delay:250ms">o</span>
                                <span style="transition-delay:250ms"></span>
                                <span style="transition-delay:250ms">E</span>
                                <span style="transition-delay:250ms">l</span>
                                <span style="transition-delay:250ms">e</span>
                                <span style="transition-delay:250ms">c</span>
                                <span style="transition-delay:250ms">t</span>
                                <span style="transition-delay:250ms">r</span>
                                <span style="transition-delay:250ms">ó</span>
                                <span style="transition-delay:250ms">n</span>
                                <span style="transition-delay:250ms">i</span>
                                <span style="transition-delay:250ms">c</span>
                                <span style="transition-delay:250ms">o</span>
                            </label>

                            <!-- Mensaje de error para el correo -->
                            @error('email')
                                <div class="text-red-500 mb-4 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="form-control" style="position: relative;">
                            <input type="password" name="password">

                            <label>

                                <span style="transition-delay:0ms">N</span>
                                <span style="transition-delay:50ms">u</span>
                                <span style="transition-delay:100ms">e</span>
                                <span style="transition-delay:150ms">v</span>
                                <span style="transition-delay:200ms">a</span>
                                <span style="transition-delay:250ms"> </span>
                                <span style="transition-delay:300ms">C</span>
                                <span style="transition-delay:350ms">o</span>
                                <span style="transition-delay:400ms">n</span>
                                <span style="transition-delay:450ms">t</span>
                                <span style="transition-delay:500ms">r</span>
                                <span style="transition-delay:550ms">a</span>
                                <span style="transition-delay:600ms">s</span>
                                <span style="transition-delay:650ms">e</span>
                                <span style="transition-delay:700ms">ñ</span>
                                <span style="transition-delay:750ms">a</span>
                                <span style="transition-delay:800ms">: </span>

                            </label>

                            <span id="togglePassword1" class="password-toggle"
                                onclick="togglePassword('password', 'togglePassword1')">
                                <i class="far fa-eye"></i>
                            </span>





                        </div>

                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="form-control" style="position: relative;">
                            <input type="password" name="password_confirmation">
                            <label>
                                <span style="transition-delay:0ms">C</span>
                                <span style="transition-delay:50ms">o</span>
                                <span style="transition-delay:100ms">n</span>
                                <span style="transition-delay:150ms">f</span>
                                <span style="transition-delay:200ms">i</span>
                                <span style="transition-delay:250ms">r</span>
                                <span style="transition-delay:300ms">m</span>
                                <span style="transition-delay:350ms">a</span>
                                <span style="transition-delay:400ms"> </span>
                                <span style="transition-delay:450ms">N</span>
                                <span style="transition-delay:500ms">u</span>
                                <span style="transition-delay:550ms">e</span>
                                <span style="transition-delay:600ms">v</span>
                                <span style="transition-delay:650ms">a</span>
                                <span style="transition-delay:700ms"> </span>
                                <span style="transition-delay:750ms">C</span>
                                <span style="transition-delay:800ms">o</span>
                                <span style="transition-delay:850ms">n</span>
                                <span style="transition-delay:900ms">t</span>
                                <span style="transition-delay:950ms">r</span>
                                <span style="transition-delay:1000ms">a</span>
                                <span style="transition-delay:1050ms">s</span>
                                <span style="transition-delay:1100ms">e</span>
                                <span style="transition-delay:1150ms">ñ</span>
                                <span style="transition-delay:1200ms">a</span>
                                <span style="transition-delay:1250ms">: </span>
                            </label>
                            <span id="togglePassword2" class="password-toggle"
                                onclick="togglePassword('password_confirmation', 'togglePassword2')">
                                <i class="far fa-eye"></i>
                            </span>





                        </div>
                        @error('password_confirmation')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">
                        Actualizar datos
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/configurationperfil.js"></script>
@endsection
