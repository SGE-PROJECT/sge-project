@extends(Auth::check() && Auth::user()->hasRole('Super Administrador') ? 'layouts.panel' : 'layouts.panelUsers')


@section('titulo', 'Profile')

@section('contenido')

    @vite('resources/css/profile/viewprofile.css')


    <div class="container mx-auto ">
        <div class="bg-white p-8 m-5  rounded-lg shadow-xl">

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Cerrar</title>
                            <path
                                d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 5.354 4.646a.5.5 0 1 0-.708.708L9.293 10l-4.647 4.646a.5.5 0 1 0 .708.708L10 10.707l4.646 4.647a.5.5 0 0 0 .708-.708L10.707 10l4.647-4.646a.5.5 0 0 0 0-.708z" />
                        </svg>
                    </button>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Éxito:</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Cerrar</title>
                            <path
                                d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 5.354 4.646a.5.5 0 1 0-.708.708L9.293 10l-4.647 4.646a.5.5 0 1 0 .708.708L10 10.707l4.646 4.647a.5.5 0 0 0 .708-.708L10.707 10l4.647-4.646a.5.5 0 0 0 0-.708z" />
                        </svg>
                    </button>
                </div>
            @endif


            <!-- Perfil de Usuario -->
            <div class="flex flex-col md:flex-row justify-center md:items-start m-8">
                <div class="m-6 md:mb-0 profile-picture-container"
                    onclick="{{ auth()->user()->photo ? 'openModal()' : '' }}">
                    <img id="profilePicture" alt="Profile Picture"
                        src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : asset('images/profileconfiguration/avatar.jpg') }}"
                        class="w-48 h-48 rounded-full border-4 border-white shadow-xl {{ auth()->user()->photo ? 'cursor-pointer' : '' }}"
                        {{ auth()->user()->photo ? 'onclick="openModal()"' : '' }}>

                    <div class="profile-picture-overlay">
                        @if (auth()->user()->photo)
                            <p style="cursor: pointer; text-align: center; font-size:1.4rem"><br>Ver foto</br></p>
                        @endif
                        <div class="vertical-line"></div>
                        <label for="photoInput"
                            style="color: rgb(168, 255, 217); font-weight: bold; font-size:1.4rem; cursor: pointer; text-align: center;">
                            <br>Editar foto</br>
                        </label>
                    </div>
                </div>





                <!-- Información de perfil -->
                <div>
                    <div class="mb-4">
                        <h2 class="text-3xl font-bold text-teal-600">{{ auth()->user()->name }}</h2>

                    </div>
                    <p class="text-lg text-blueGray-700 mb-2">
                        @if (auth()->user()->roles->isNotEmpty())
                            {{ auth()->user()->roles->first()->name }}
                        @else
                            No tiene un rol asignado
                        @endif
                    </p>
                    <p class="text-lg font-bold text-teal-600 mb-4">División:
                        @if (auth()->user()->division)
                            {{ auth()->user()->division->name }}
                        @else
                            No asignada
                        @endif
                    </p> <!-- Detalles adicionales -->
                    <div class="flex flex-col">
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-teal-600"></i>
                            <span>Telefono: {{ auth()->user()->phone_number }}</span>
                        </div>
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-envelope mr-2 text-teal-600"></i>
                            <span> Correo: {{ auth()->user()->email }}</span>
                        </div>

                        <div class="flex items-center text-sm text-blueGray-600">
                            <i class="fas fa-university mr-2 text-teal-600"></i>
                            <span>Universidad Tecnológica de Cancún</span>
                        </div>
                    </div>





                </div>


            </div>


            <form action="{{ route('actualizar_foto') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col items-center justify-center ">
                @csrf

                <!-- Contenedor de botones con fondo gris -->
                <div class="bg-gray-100 rounded-lg shadow-md w-96 h-auto">

                    <div class="flex justify-center">

                        <button type="submit" id="guardarFotoBtn"
                            class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors cursor-pointer m-4">
                            Guardar foto
                        </button>
                        <button type="button" id="cancelarBtn" onclick="cancelUpdate()"
                            class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400 transition-colors cursor-pointer m-4">Cancelar</button>

                    </div>
                </div>


                <input type="file" name="photo" id="photoInput" accept="image/*" style="display: none;">
            </form>






            {{-- PROYECTOS Y EQUIPOS --}}
            <div class="border-blueGray-200 m-8 pt-8">



            </div>



            <!-- Modal para ver foto-->
            <div id="myModal" class="modal absolute bottom-0 left-0 right-0 top-0 bg-black bg-opacity-50 hidden ">
                <!-- Contenido del modal -->
                <div class="modal-content">
                    <span class="close p-0" onclick="closeModal()">&times;</span>
                    <img src="{{ asset(auth()->user()->photo) }}">

                </div>
            </div>
        </div>
    </div>

    <script src="/js/profile.js"></script>

@endsection
