@extends(Auth::check() && Auth::user()->hasRole('Super Administrador') ? 'layouts.panel' : 'layouts.panelUsers')

@section('titulo', 'Perfil de asesor')

@section('contenido')

    @vite('resources/css/profile/viewprofile.css')


    <div class="container mx-auto ">
        <div class="bg-white p-8 m-5  rounded-lg shadow-xl">




            <!-- Perfil de Usuario -->
            <div class="flex flex-col md:flex-row justify-center md:items-start m-8">
                <div class="m-6 md:mb-0 profile-picture-container"
                    onclick="{{ $academicAdvisor->user->photo ? 'openModal()' : '' }}">
                    <img id="profilePicture" alt="Profile Picture"
                        src="{{ $academicAdvisor->user->photo ? asset($academicAdvisor->user->photo) : asset('images/profileconfiguration/avatar.jpg') }}"
                        class="w-48 h-48 rounded-full border-4 border-white shadow-xl {{ $academicAdvisor->user->photo ? 'cursor-pointer' : '' }}"
                        {{ $academicAdvisor->user->photo ? 'onclick="openModal()"' : '' }}>

                    <div class="profile-picture-overlay">
                        @if ($academicAdvisor->user->photo)
                            <p style="cursor: pointer; text-align: center; font-size:1.4rem"><br>Ver foto</br></p>
                        @endif

                    </div>



                </div>





                <!-- Información de perfil -->
                <div>
                    <div class="mb-4">
                        <h2 class="text-3xl font-bold text-teal-600">{{ $academicAdvisor->user->name }}</h2>

                    </div>
                    <p class="text-lg text-blueGray-700 mb-2">
                        @if ($academicAdvisor->user->roles->isNotEmpty())
                            {{ $academicAdvisor->user->roles->first()->name }}
                        @else
                            No tiene un rol asignado
                        @endif
                    </p>
                    <p class="text-lg font-bold text-teal-600 mb-4">División:
                        @if ($academicAdvisor->user->division)
                            {{ $academicAdvisor->user->division->name }}
                        @else
                            No asignada
                        @endif
                    </p> <!-- Detalles adicionales -->
                    <div class="flex flex-col">
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-teal-600"></i>
                            <span>Telefono: {{ $academicAdvisor->user->phone_number }}</span>
                        </div>
                        <div class="flex items-center text-sm text-blueGray-400 mb-2">
                            <i class="fas fa-envelope mr-2 text-teal-600"></i>
                            <span> Correo: {{ $academicAdvisor->user->email }}</span>
                        </div>

                        <div class="flex items-center text-sm text-blueGray-600">
                            <i class="fas fa-university mr-2 text-teal-600"></i>
                            <span>Universidad Tecnológica de Cancún</span>
                        </div>
                    </div>





                </div>


            </div>









            <div class="border-t border-blueGray-200 m-8 pt-8">


                <!-- Modal para ver foto-->
                <div id="myModal" class="modal absolute bottom-0 left-0 right-0 top-0 bg-black bg-opacity-50 hidden ">
                    <!-- Contenido del modal -->
                    <div class="modal-content">
                        <span class="close p-0" onclick="closeModal()">&times;</span>
                        <img src="{{ asset($academicAdvisor->user->photo) }}">

                    </div>
                </div>
            </div>
        </div>

        <script src="/js/profile.js"></script>

    @endsection
