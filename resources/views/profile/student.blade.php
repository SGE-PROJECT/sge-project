@extends(Auth::check() && Auth::user()->hasRole('Super Administrador') ? 'layouts.panel' : 'layouts.panelUsers')

@section('titulo', 'Perfil de estudiante')

@section('contenido')

    @vite('resources/css/profile/viewprofile.css')


    <div class="container mx-auto ">
        <div class="bg-white p-8 m-5  rounded-lg shadow-xl">




            <!-- Perfil de Usuario -->
            <div class="flex flex-col md:flex-row justify-center md:items-start m-8">
                <div class="m-6 md:mb-0 profile-picture-container"
                onclick="{{ $student->user->photo ? 'openModal()' : '' }}">
                <img id="profilePicture" alt="Profile Picture"
                    src="{{ $student->user->photo ? asset($student->user->photo) : asset('images/profileconfiguration/avatar.jpg') }}"
                    class="w-48 h-48 rounded-full border-4 border-white shadow-xl {{ $student->user->photo ? 'cursor-pointer' : '' }}"
                    {{ $student->user->photo ? 'onclick="openModal()"' : '' }}>

                <div class="profile-picture-overlay">
                    @if ($student->user->photo)
                        <p style="cursor: pointer; text-align: center; font-size:1.4rem"><br>Ver foto</br></p>
                    @endif

                </div>



            </div>





                <!-- Información de perfil -->
                <div>
                    <div class="mb-4">
                        <h2 class="text-3xl font-bold text-teal-600">{{ $student->user->name }}</h2>

                    </div>
                    <p class="text-lg text-blueGray-700 mb-2">
                        @if ($student->user->roles->isNotEmpty())
                            {{ $student->user->roles->first()->name }}
                        @else
                            No tiene un rol asignado
                        @endif
                    </p>
                    <p class="text-lg font-bold text-teal-600 mb-4">División:
                        @if ($student->user->division)
                            {{ $student->user->division->name }}
                        @else
                            No asignada
                        @endif
                    </p> <!-- Detalles adicionales -->
                    <div class="flex flex-col">
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-teal-600"></i>
                            <span>Telefono: {{ $student->user->phone_number }}</span>
                        </div>
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-envelope mr-2 text-teal-600"></i>
                            <span> Correo: {{ $student->user->email }}</span>
                        </div>

                        <div class="flex items-center text-sm text-blueGray-600">
                            <i class="fas fa-university mr-2 text-teal-600"></i>
                            <span>Universidad Tecnológica de Cancún</span>
                        </div>
                    </div>





                </div>


            </div>









            {{-- PROYECTOS Y EQUIPOS --}}
            <div class="border-t border-blueGray-200 m-8 pt-8">
                <div class="grid md:grid-cols-2 gap-10 ml-4">
                    <h1 class="text-2xl font-bold text-teal-600 mb-4 ml-4 md:ml-10">Proyecto</h1>
                    <h1 class="text-2xl font-bold text-teal-600 mb-4 ml-4 md:ml-10">Grupo</h1>
                </div>

                <div class="grid md:grid-cols-2 gap-10 ml-4">
                    <!-- Proyectos -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 m-8">
                        @foreach ($student->projects as $project)
                            <div class="bg-gray-100 rounded-lg p-4 flex flex-col justify-between transition duration-300 ease-in-out transform hover:shadow-lg md:col-span-2">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $project->name_project }}</h3>
                                <p class="text-sm text-gray-600 mt-2">{{ $project->activities }}</p>
                            </div>
                        @endforeach
                    </div>
                    <!-- Grupo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 m-8">
                        <div class="bg-gray-100 rounded-lg p-4 flex flex-col justify-between transition duration-300 ease-in-out transform hover:shadow-lg md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-800">{{$student->group->name}}</h3>
                            <p class="text-sm text-gray-600 mt-2"> <br>{{$student->group->description}}</br> </p>
                        </div>
                    </div>
                </div>











            <!-- Modal para ver foto-->
            <div id="myModal" class="modal absolute bottom-0 left-0 right-0 top-0 bg-black bg-opacity-50 hidden ">
                <!-- Contenido del modal -->
                <div class="modal-content">
                    <span class="close p-0" onclick="closeModal()">&times;</span>
                    <img src="{{ asset($student->user->photo) }}">

                </div>
            </div>
        </div>
    </div>

    <script src="/js/profile.js"></script>

@endsection
