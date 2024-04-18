@extends('layouts.panelUsers')

@section('titulo', 'Anteproyectos por división')
@vite('resources/css/icons.css')


@section('contenido')

    @if ($noProjects)
    <form class="max-w-md mx-auto mt-10" action="{{ route('search.project') }}" method="GET">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <!-- Icono de búsqueda -->
            </div>
            <input type="search" id="default-search" name="search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00ab84] focus:border-[#00ab84]"
                placeholder="Buscar anteproyectos..." required />
            <button type="submit"
                class="font-semibold text-white absolute end-2.5 bottom-2.5 bg-[#00ab84] hover:bg-[#00ab84] focus:ring-4 focus:outline-none focus:ring-[#00ab84]  rounded-lg text-sm px-4 py-2 ">Buscar</button>
        </div>
    </form>
        <div class="flex justify-center items-center">
            <h3 class="text-3xl font-bold mt-16 text-center text-gray-700">¡No se han encontrado anteproyectos</h3>
        </div>
        <div class="flex justify-center items-center mt-4">
            <img class="w-48" src="Icons/graduacion.png" />
        </div>
    @else
        <form class="max-w-screen-md mx-auto mt-10" action="{{ route('search.project') }}" method="GET">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <!-- Icono de búsqueda -->
                </div>
                <input type="search" id="default-search" name="search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#00ab84] focus:border-[#00ab84]"
                    placeholder="Buscar anteproyectos..." required />
                <button type="submit"
                    class="font-semibold text-white absolute end-2.5 bottom-2.5 bg-[#00ab84] hover:bg-[#00ab84] focus:ring-4 focus:outline-none focus:ring-[#00ab84]  rounded-lg text-sm px-4 py-2 ">Buscar</button>
            </div>
        </form>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 p-4">
            @foreach ($Projects as $project)
                @php
                    $commentCount = $project->comments()->count();
                @endphp

                <div class="block rounded-lg bg-white text-center text-surface shadow-secondary-1 ">

                    <div class="p-6">
                        <h5 class="mb-2 text-xl text-[#00ab84] font-semibold leading-tight ">
                            {{ $project->name_project }}
                        </h5>

                        <h2 class="mb-2 mr-4 text-gray-600 font-bold"><i
                                class='nf nf-fa-group mt-[-12px] mr-2 text-[#00ab84]'></i>
                            Integrantes
                        </h2>

                        <div class="flex items-center justify-center mb-2">
                            @foreach ($project->students as $student)
                                <div class="group hs-tooltip inline-block">
                                    <img class="hs-tooltip-toggle relative inline-block size-[41px] rounded-full ring-2 ring-white hover:z-10 small-img"
                                        src={{ $student->user->photo }} alt="Image Description">
                                    <span
                                        class="opacity-0 invisible group-hover:opacity-100 group-hover:visible hs-tooltip-content absolute z-10 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700 transition-opacity duration-300"
                                        role="tooltip">
                                        {{ $student->user->name }}
                                    </span>
                                </div>
                            @endforeach
                        </div>




                        <a href="{{ route('projects.show', $project->id) }}"
                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-sm font-semibold leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 bg-[#00ab84]">
                            Ver anteproyecto
                        </a>
                        <div class="mt-1 text-gray-500 text-[13px] mb-[-20px] px-3.5 py-1.5 ">
                            Publicado por <span class="font-bold">{{ $project->students->first()->user->name }}</span>
                            {{ $project->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div
                        class="border-t-2 border-neutral-100 px-6 py-3 text-surface/75 flex items-center justify-center space-x-4">
                        <button class="flex items-center space-x-2 Btn font-semibold leading-tight text-[13px] text-white">
                            <span class="leftContainer flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#fff">
                                    <path
                                        d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z">
                                    </path>
                                </svg>
                                <span class="like">Likes</span>
                            </span>
                            <span class="likeCount text-center">
                                {{ $project->likes->count() }}
                            </span>
                        </button>

                        <button type="button"
                            class="relative text-lg cursor-default text-white rounded-full bg-[#00ab84] p-1.5 font-semibold flex items-center">
                            <i class='nf nf-fa-comment p-1'></i>
                            <span
                                class="absolute text-white top-0 right-0 bg-gray-600 rounded-full w-4 h-4 text-xs font-bold">{{ $commentCount }}</span>
                        </button>

                        <div class="rating mr-5 text-sm">
                            @php
                                $averageScore = number_format($project->scores()->avg('score'), 1);
                                $fullStars = floor($averageScore);
                                $halfStar = ceil($averageScore) > $fullStars ? 1 : 0;
                                $emptyStars = 5 - $fullStars - $halfStar;
                            @endphp

                            <span>
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class='nf nf-fa-star text-yellow-300'></i>
                                @endfor

                                @if ($halfStar)
                                    <i class='nf nf-fa-star text-yellow-300'></i>
                                @endif

                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class='nf nf-oct-star text-yellow-300'></i>
                                @endfor
                            </span>
                            <label class="mr-2 font-bold text-sm" for="score">{{ $averageScore }}</label>
                        </div>


                    </div>

                </div>
            @endforeach

        </div>
        @endif
        <div class="flex items-center justify-center">
            {{ $Projects->appends(['search' => request()->query('search')])->links() }}
        </div>
@endsection
