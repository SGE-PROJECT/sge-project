@extends('layouts.panelUsers')
@vite('resources/css/app.css')

@section('titulo', 'Proyectos por división')

@section('contenido')
    <h2 class="text-3xl font-bold sm:text-4xl mt-4 text-center ">LISTA DE ANTEPROYECTOS</h2>
    @foreach ($Projects as $project)
        @php
            $commentCount = $project->comments()->count();
        @endphp
        <div class="flex flex-col md:flex-row ml-8 mr-8 mb-8 bg-white mt-4 p-8 rounded-xl card_project">
            <div class="flex-none mb-4 md:mb-0 md:order-2 md:ml-10 md:mr-10">
                <img class="mt-7 w-96 md:w-96 md:h-72 ml-8 md:ml-0  h-auto p-1 rounded-2xl"
                    src="https://images.pexels.com/photos/3861972/pexels-photo-3861972.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Project Image">

            </div>
            <div class="flex-grow ml-4 md:mt-4 md:ml-0">
                <div class="flex items-center ">
                    <i class='bx bxs-badge-check mr-3 text-[#03A696] text-3xl'></i>
                    <h1 class="text-3xl font-bold text-gray-600">{{ $project->name_project }}</h1>
                </div>


                <a class="text-blue-500 hover:underline inline-flex items-center">
                </a>
                <h2 class="mb-4 text-justify text-gray-500 dark:text-gray-500"> {{ $project->general_objective }}

                </h2>
                <div class="flex items-center">
                    <i class='bx bxs-group mt-[-12px] mr-2 text-[#03A696]'></i>
                    <h2 class="mb-2 mr-4 text-gray-500 dark:text-gray-600 font-bold">Integrantes:</h2>

                    @foreach($project->students as $student)
                    <div class="group hs-tooltip inline-block">
                        <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img"
                            src={{ $student->user->photo }}
                            alt="Image Description">
                        <span
                            class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                            role="tooltip">
                            {{ $student->user->name }}
                        </span>
                    </div>
                @endforeach







                </div>

                <div>
                    <div class="flex-proyectos">
                        <button class="Btn">
                            <span class="leftContainer">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#fff">
                                    <path
                                        d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z">
                                    </path>
                                </svg> <span class="like">Likes</span>
                            </span>
                            <span class="likeCount">
                                {{ $project->likes->count() }}
                            </span>
                        </button>

                        <!-- Muestra el promedio de las calificaciones con estrellas -->
                        <div class="rating mr-5">
                            @php
                                $averageScore = number_format($project->scores()->avg('score'), 1);
                                $fullStars = floor($averageScore);
                                $halfStar = ceil($averageScore) > $fullStars ? 1 : 0;
                                $emptyStars = 5 - $fullStars - $halfStar;
                            @endphp

                            <span>
                                @for ($i = 0; $i < $fullStars; $i++)
                                    ⭐
                                @endfor

                                @if ($halfStar)
                                    ⭐
                                @endif

                                @for ($i = 0; $i < $emptyStars; $i++)
                                    ☆
                                @endfor
                            </span>
                            <label class="mr-2 font-bold text-xl" for="score">Puntaje: {{ $averageScore }}</label>
                        </div>

                        <button type="button"
                            class="relative text-lg cursor-default text-white rounded-full bg-[#279c90] p-2.5 font-semibold">
                            <i class='bx bxs-message-rounded-detail p-1'></i>
                            <span
                                class="absolute text-white top-0 right-0 bg-gray-600 rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">{{ $commentCount }}</span>
                        </button>

                    </div>
                </div>
                <a href="{{ route('projects.show', $project->id) }}"><button type="submit"
                        class="relative bg-teal-500 text-white px-4 py-2  mr-5 rounded hover:bg-teal-600 transition-colors h-10">Ver
                        Anteproyecto</button></a>
            </div>

        </div>
    @endforeach

    {{ $Projects->links() }}

@endsection
