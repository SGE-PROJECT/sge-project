<!-- component -->
<!DOCTYPE html>
<html lang="es">

<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo_sge.svg') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/sidebarUser.js')
    @vite('resources/js/tableproject.js')
    @vite('resources/css/sidebarUser.css')
    @vite('resources/css/management/divisions/divisions.css')
    @vite('resources/css/projects/projectDashboardStyle.css')
    @vite('resources/css/books-notifications/books/books.css')
    @vite('resources/css/books-notifications/books/add-books.css')
    @vite('resources/css/buttonappoint.css')
    @vite('resources/css/input.css')
    @vite('resources/js/projectview.js')
    @vite('resources/css/loader/loader.css')
    @vite('resources/css/Dashboard/DashboardUsers.css')
    @vite('resources/css/projects/projectview.css')
    @vite('resources/css/management/projects.css')
    @yield('js')
    @yield('css')

    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="text-gray-800 font-inter">
    <!--sidenav-->
    <div class="container-loader" id="loader">
        <div class="loader">
            <div class="box box0">
                <div></div>
            </div>
            <div class="box box1">
                <div></div>
            </div>
            <div class="box box2">
                <div></div>
            </div>
            <div class="box box3">
                <div></div>
            </div>
            <div class="box box4">
                <div></div>
            </div>
            <div class="box box5">
                <div></div>
            </div>
            <div class="box box6">
                <div></div>
            </div>
            <div class="box box7">
                <div></div>
            </div>
            <div class="ground">
                <div></div>
            </div>
        </div>
    </div>
    <section class="flex">
        <div class="relative sidebar fixed left-0 top-0 h-full bg-[#00ab84] z-50 transition-transform">
            <div class="header-sidebar" id="hs">
                <a class="flex justify-center items-center">
                    <img class="h-[40px]" id="imagen" src="{{ asset('images/letras2.png') }}" alt="">
                    <button type="button" class="hidden md:block text-lg text-white font-semibold sidebar-toggle">
                        <i class=" ri-menu-line"></i>
                    </button>
                </a>
            </div>
            <ul class="scroll2 overflow-y-scroll p-4" id="lista-side">
                <!-- ADMIN Section -->
                <li class="group ">
                    <a href="/"
                        class="left-0 relative flex font-semibold items-center py-1 px-4 text-white hover:text-[#d0d3d4] rounded-md">
                        <i class='bx bxs-dashboard mr-3 text-lg'></i>
                        <span class="nav-text text-sm">Dashboard</span>
                    </a>
                </li>

                @if (Auth::check() &&
                        Auth::user()->hasAnyRole(['Asesor Académico', 'Estudiante', 'Presidente Académico', 'Asistente de Dirección']))
                @else
<<<<<<< HEAD
                <li class="mb-1 group relative z-2">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-white sidebar-dropdown-toggle rounded-md">
                        <i class='bx bx-building-house mr-3 text-lg'></i>
                        <span class="nav-text text-sm">Administración</span>
                        <i
                            class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90 transition-transform hidden md:block"></i>
                    </a>
                    <ul
                        class="hidden transition duration-300 ease-in-out absolute z-20 left-full top-0 w-48 bg-[#394C5F] text-white submenu rounded-md">
                        @if(Auth::check() && Auth::user()->hasAnyRole(['Administrador de División', 'Asesor Académico', 'Estudiante',
                        'Presidente Académico', 'Asistente de Dirección']))
                        @else
                        <li class=" ">
                            <a href="/gestion-usuarios"
                                class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#00755e] p-1 rounded-md ">
                                <i class='bx bx-user mr-3 text-lg'></i>
                                <span>Usuarios</span>
                            </a>
                        </li>
                        @endif
                        <li class="">
                            <a href="/roles-permisos"
                                class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#00755e] p-1 rounded-md">
                                <i class='bx bx-lock-open mr-3 text-lg'></i>
                                <span>Roles y Permisos</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="sanciones"
                                class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md ">
                                <i class='bx bx-no-entry mr-3 text-lg'></i>
                                <span>Sanciones</span>
                            </a>
                        </li>
                    </ul>
                </li>
=======
                    <li class="mb-1 group relative z-2">
                        <a href=""
                            class="flex font-semibold items-center py-2 px-4 text-white sidebar-dropdown-toggle rounded-md">
                            <i class='bx bx-building-house mr-3 text-lg'></i>
                            <span class="nav-text text-sm">Administración</span>
                            <i
                                class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90 transition-transform hidden md:block"></i>
                        </a>
                        <ul
                            class="hidden transition duration-300 ease-in-out absolute z-20 left-full top-0 w-48 bg-[#394C5F] text-white submenu rounded-md">
                            @if (Auth::check() &&
                                    Auth::user()->hasAnyRole([
                                        'Administrador de División',
                                        'Asesor Académico',
                                        'Estudiante',
                                        'Presidente Académico',
                                        'Asistente de Dirección',
                                    ]))
                            @else
                                <li class=" ">
                                    <a href="/"
                                        class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#00755e] p-1 rounded-md ">
                                        <i class='bx bx-user mr-3 text-lg'></i>
                                        <span>Usuarios</span>
                                    </a>
                                </li>
                            @endif
                            <li class="">
                                <a href="/roles-permisos"
                                    class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#00755e] p-1 rounded-md">
                                    <i class='bx bx-lock-open mr-3 text-lg'></i>
                                    <span>Roles y Permisos</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="sanciones"
                                    class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md ">
                                    <i class='bx bx-no-entry mr-3 text-lg'></i>
                                    <span>Sanciones</span>
                                </a>
                            </li>
                        </ul>
                    </li>
>>>>>>> develop
                @endif


                <li class="mb-1 group relative z-2">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-white  sidebar-dropdown-toggle rounded-md ">
                        <i class='bx bxs-graduation mr-3 text-lg'></i>
                        <span class="nav-text text-sm">Académico</span>
                        <i
                            class="ri-arrow-right-s-line ml-auto  group-[.selected]:rotate-90 transition-transform  hidden md:block"></i>
                    </a>
                    <ul class="hidden absolute right-2 top-0 w-48 bg-[#394C5F] text-white submenu rounded-md">
                        <li>

                            <a href="{{ route('dashboardProjects') }}"
                                class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md "><i
                                    class='bx bx-folder-plus mr-3 text-lg'></i><span
                                    class="text-sm">Proyectos</span></a>
                        </li>
                        <li class="">
                            @if (Auth::check() &&
                                    Auth::user()->hasAnyRole([
                                        'Administrador de División',
                                        'Asesor Académico',
                                        'Estudiante',
                                        'Presidente Académico',
                                        'Asistente de Dirección',
                                    ]))
                            @else
                                <a href="{{ route('divisiones.index') }}"
                                    class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md "><i
                                        class='bx bx-buildings mr-3 text-lg'></i><span
                                        class=" text-sm">Divisiones</span></a>
                        </li>
                        @endif
                        @if (Auth::check() && Auth::user()->hasAnyRole(['Presidente Académico', 'Asistente de Dirección', 'Estudiante']))
                        @else
                            <li class="">

                                <a href="{{ route('carreras.index') }}"
                                    class="transition duration-300 ease-in-out text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md "><i
                                        class=' bx bx-book-open mr-3 text-lg'></i><span
                                        class="text-sm">Carreras</span></a>
                            </li>
                        @endif
                    </ul>
                </li>

                @if (Auth::check() && Auth::user()->hasAnyRole(['Super Administrador','Estudiante','Asesor Académico']))
                    <span class="text-[#fff] nav-text font-bold">EMPRESAS</span>

                    <li class="mb-1 group">
                        <a href={{ route('empresas.index') }}
                            class="flex hover:text-[#d0d3d4] font-semibold items-center py-2 px-4 text-white  hover:text-gray-100 rounded-md">
                            <i class='  bx bx-buildings mr-3 text-lg'></i>
                            <span class="nav-text text-sm">Empresas Afiliadas</span>
                        </a>
                    </li>
                @endif

                <!-- EMPRESAS Section -->
                @if (Auth::check() && Auth::user()->hasAnyRole(['Asistente de Dirección']))
                    <span class="text-[#fff] nav-text font-bold">EMPRESAS</span>
                    <li class="mb-1 group">
                        <a href={{ route('empresas.index') }}
                            class="flex hover:text-[#d0d3d4] font-semibold items-center py-2 px-4 text-white  hover:text-gray-100 rounded-md">
                            <i class='  bx bx-buildings mr-3 text-lg'></i>
                            <span class="nav-text text-sm">Empresas Afiliadas</span>
                        </a>
                    </li>
                @endif

                @if (Auth::check() &&
                        Auth::user()->hasAnyRole(['Administrador de División', 'Asesor Académico', 'Presidente Académico']))
                @else
                    <!-- RECURSOS Section -->
                    <span class="text-[#fff] nav-text font-bold">RECURSOS</span>
                    <li class="mb-1 group">
                        <a href="/libros"
                            class="flex font-semibold items-center py-2 px-4 text-white  hover:text-gray-100 rounded-md hover:text-[#d0d3d4]">
                            <i class='bx bx-book mr-3 text-lg'></i>
                            <span class="nav-text text-sm">Libros</span>
                        </a>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->hasAnyRole(['Asesor Académico']))
                    <!-- ACTIVIDADES Section -->
                    <span class="text-[#fff] nav-text font-bold">ACTIVIDADES</span>

                <li class="mb-1 group">
                    <a href="{{ route('asesorias', ['id' => auth()->user()->slug ]) }}"
                        class="flex font-semibold items-center py-2 px-4 text-white rounded-md hover:text-[#d0d3d4]">
                        <i class='bx bx-calendar-event mr-3 text-lg'></i>
                        <span class="nav-text text-sm">Sesiones de Asesoría</span>
                    </a>
                </li>
                @else
                @endif
                @if(Auth::check() && Auth::user()->hasAnyRole(['Estudiante']))
                <!-- ACTIVIDADES Section -->
                <span class="text-[#fff] nav-text font-bold">ACTIVIDADES</span>
                <li class="mb-1 group">
                    <a href="{{ route('asesoriasStudent', ['id' => auth()->user()->slug ]) }}"
                        class="flex font-semibold items-center py-2 px-4 text-white  hover:text-gray-100 rounded-md hover:text-[#d0d3d4]">
                        <i class='bx bx-calendar-event mr-3 text-lg'></i>
                        <span class="nav-text text-sm">Sesiones de Asesoría</span>
                    </a>
                </li>
                @else
                @endif

                <!-- PERSONAL Section -->
                <span class="text-[#fff] font-bold nav-text">PERSONAL</span>
                <li class="mb-1 group">
                    <a href="/notificaciones"
                        class="flex hover:text-[#d0d3d4] font-semibold items-center py-2 px-4 text-white  hover:text-gray-100 rounded-md">
                        <i class='bx bx-bell mr-3 text-lg'></i>
                        <span class="nav-text text-sm">Notificaciones</span>
                    </a>
                </li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button href="{{ route('logout') }}"
                        class="flex hover:text-[#d0d3d4] font-semibold items-center py-2 px-4 text-white  hover:text-gray-100 rounded-md w-full">
                        <i class='bx bx-log-out mr-3 text-xl'></i>
                        <span class="nav-text text-sm">Cerrar sesion</span>
                    </button>
                </form>
            </ul>
        </div>
        <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay" id="overlay"></div>
        <!-- end sidenav -->


        <main class="main-content w-full bg-gray-200 h-screen min-h-[500px] overflow-y-scroll transition-all"
            id="main">
            <!-- navbar -->
            <div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
                <button type="button" class="block md:hidden text-lg text-white font-semibold sidebar-toggle2">
                    <i class=" bg-[#03A696] rounded-md p-2 ri-menu-line"></i>
                </button>
                <img class="left-[-1000px] h-[40px] hidden md:block absolute transition duration-1000 ease-in-out "
                    id="imagen2" src="{{ asset('images/letras.png') }}" alt="">
                <ul class="ml-auto flex items-center ">
                    <li class="mr-1 dropdown">
                        <button type="button"
                            class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24"
                                style="fill: gray;transform: ;msFilter:;">
                                <path
                                    d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                                </path>
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                            <form action="" class="p-4 border-b border-b-gray-100">
                                <div class="relative w-full">
                                    <input type="text"
                                        class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500"
                                        placeholder="Search...">
                                    <i
                                        class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-900"></i>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="dropdown  hidden md:block">
                        <button type="button"
                            class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24"
                                style="fill: gray;transform: ;msFilter:;">
                                <path
                                    d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                                </path>
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                            <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                                <button type="button" data-tab="notification" data-tab-page="notifications"
                                    class="text-slate-600 font-medium text-[13px] hover:text-gray-400 border-b-2 border-b-transparent mr-4 pb-1 active">Notificaciones</button>
                                {{-- <button type="button" data-tab="notification" data-tab-page="messages"
                                    class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                                --}}
                            </div>
                            <div class="my-2">
                                <ul class="max-h-64 overflow-y-auto" data-tab-for="notification"
                                    data-page="notifications">
                                    @forelse (auth()->user()->notifications()->whereDate('created_at', today())->get() as $notification)
                                        <li>
                                            <a href="/notificaciones"
                                                class="py-2 px-4 flex items-center hover:bg-slate-100/80 group">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class=" w-6 h-6 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                                </svg>
                                                <div class="ml-2">
                                                    <div
                                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500 group-hover:animate-bounce-slow">
                                                        ¡{{ $notification->data['object'] }}!
                                                    </div>
                                                    <d iv class="text-[11px] text-gray-400 ">
                                                        {{ $notification->data['data'] }}</d>
                                                    <div class="text-[11px] text-slate-600">
                                                        {{ $notification->created_at->diffForHumans() }}</div>

                                                </div>
                                            </a>
                                        </li>
                                        {{--   @if ($notification->type === 'App\\Notifications\\ProjectNotification')
                                        <p>este</p>

                                        @endif --}}

                                    @empty
                                        <li>
                                            <a href="/notificaciones"
                                                class="py-2 px-4 flex items-center hover:bg-slate-100/80 group">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class=" w-6 h-6 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                                                </svg>

                                                <div class="ml-2">
                                                    <div
                                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">
                                                        ¡No hay notificaciones!
                                                    </div>
                                                    <div class="text-[11px] text-gray-400">Bandeja Vacía</div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforelse
                                </ul>
                                <ul class="max-h-64 overflow-y-auto hidden" data-tab-for="notification"
                                    data-page="messages">
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">
                                                    John Doe
                                                </div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="py-2 px-4 flex items-center hover:bg-slate-100 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">
                                                    John Doe
                                                </div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe
                                                </div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe
                                                </div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="w-8 h-8 rounded block object-cover align-middle">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe
                                                </div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <button id="fullscreen-button" class="hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24"
                            style="fill: gray;transform: ;msFilter:;">
                            <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
                        </svg>
                    </button>
                    <li class="dropdown ml-3">
                        <button type="button" class="dropdown-toggle flex items-center">
                            <div class="flex-shrink-0 w-10 h-10 relative">
                                <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/9.jpg"
                                        alt="" />
                                    <div
                                        class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping">
                                    </div>
                                    <div
                                        class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full">
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 hidden md:block text-left">
                                <h2 class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                                @php
                                    $user = auth()->user();
                                    $roles = $user->getRoleNames();
                                @endphp

                                @if ($roles->isNotEmpty())
                                    <p class="text-xs text-gray-500">{{ $roles->first() }}</p>
                                @else
                                    <p class="text-xs text-gray-500">Invitado</p>
                                @endif
                            </div>

                        </button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="/perfil"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="Configurar_Cuenta"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="">
                                    @csrf
                                    <a href="{{ route('logout') }}" role="menuitem"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                                        onclick="event.preventDefault();
                                  this.closest('form').submit();">
                                        Log Out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <main class="contenido relative">
                @yield('contenido')
            </main>
        </main>

    </section>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('scripts/sidebar.js') }}"></script>
    <script src="{{ asset('resources/js/divisions.js') }}"></script>
    @yield('scripts')
    <link href="{{ asset('css/projectstyle.css') }}" rel="stylesheet">
    @livewireScripts
</body>

</html>
