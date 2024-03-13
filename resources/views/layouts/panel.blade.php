<!-- component -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('images/logo_sge.svg') }}">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  @vite('resources/css/app.css')
  @vite('resources/css/asesorias.css')
  @vite('resources/js/sidebar.js')
  @vite('resources/js/asesorias.js')
  @vite('resources/css/sidebar.css')
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


  <title>@yield('titulo')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="text-gray-800 font-inter">
  <!--sidenav-->
  <section class="flex">
    <div class="relative sidebar sidebar-contracted fixed left-0 top-0 h-full bg-[#293846] p-4 z-50 transition-transform">
      <div class="">
        <a href="/" class="flex justify-center items-center border-b border-b-white">
          <img class="w-[60%]" id="imagen"  src="{{ asset('images/logo_sge.svg') }}" alt="">
          <h2 id="ut" class="text-xl text-[#fff] font-bold mb-2">UT</h2>
        </a>
      </div>
      <ul class="mt-4 scroll2 overflow-y-scroll">
        <!-- ADMIN Section -->
        <li class="mb-1 group">
          <a href="/"
            class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] hover:text-gray-100 rounded-md">
            <i class='bx bxs-dashboard mr-3 text-lg'></i>
            <span class="nav-text text-sm">Dashboard</span>
          </a>
        </li>

        <li class="mb-1 group relative z-2">
          <a href=""
            class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] sidebar-dropdown-toggle rounded-md">
            <i class='bx bx-building-house mr-3 text-lg'></i>
            <span class="nav-text text-sm">Administración</span>
            <i
              class="ri-arrow-right-s-line ml-auto  group-[.selected]:rotate-90 transition-transform hidden md:block"></i>
          </a>
          <ul class="hidden absolute z-20 left-full top-0 w-48 bg-[#394C5F] text-white submenu rounded-md">
            <li class=" ">
              <a href="/" class=" text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md ">
                <i class='bx bx-user mr-3 text-lg'></i>
                <span>Usuarios</span>
              </a>
            </li>
            <li class="">
              <a href="/roles-permisos" class=" text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md ">
                <i class='bx bx-lock-open mr-3 text-lg'></i>
                <span>Roles y Permisos</span>
              </a>
            </li>
            <li class="">
                <a href="sanciones" class=" text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md ">
                  <i class='bx bx-no-entry mr-3 text-lg'></i>
                  <span>Sanciones</span>
                </a>
              </li>
          </ul>
        </li>

        <li class="mb-1 group relative z-2">
          <a href=""
            class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] sidebar-dropdown-toggle rounded-md">
            <i class='bx bxs-graduation mr-3 text-lg'></i>
            <span class="nav-text text-sm">Académico</span>
            <i
              class="ri-arrow-right-s-line ml-auto  group-[.selected]:rotate-90 transition-transform  hidden md:block"></i>
          </a>
          <ul class="hidden absolute right-2 top-0 w-48 bg-[#394C5F] text-white submenu rounded-md">
            <li>

              <a href="projectsdash" class=" text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md "><i
                  class='bx bx-folder-plus mr-3 text-lg'></i><span class="text-sm">Proyectos</span></a>
            </li>
            <li class="">

              <a href="divisiones" class=" text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md "><i
                  class='bx bx-buildings mr-3 text-lg'></i><span class=" text-sm">Divisiones</span></a>
            </li>
            <li class="">

              <a href="" class="text-white text-sm flex items-center hover:bg-[#2F4050] p-1 rounded-md "><i
                  class=' bx bx-book-open mr-3 text-lg'></i><span class="text-sm">Programas</span></a>
            </li>
          </ul>
        </li>

        <!-- EMPRESAS Section -->
        <span class="text-gray-400 nav-text font-bold">EMPRESAS</span>
        <li class="mb-1 group">
          <a href="/empresas"
            class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] hover:text-gray-100 rounded-md">
            <i class='  bx bx-buildings mr-3 text-lg'></i>
            <span class="nav-text text-sm">Empresas Afiliadas</span>
          </a>
        </li>

        <!-- RECURSOS Section -->
        <span class="text-gray-400 nav-text font-bold">RECURSOS</span>
        <li class="mb-1 group">
          <a href="/libros"
            class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] hover:text-gray-100 rounded-md">
            <i class='bx bx-book mr-3 text-lg'></i>
            <span class="nav-text text-sm">Libros</span>
          </a>
        </li>

        <!-- ACTIVIDADES Section -->
        <span class="text-gray-400 nav-text font-bold">ACTIVIDADES</span>
        <li class="mb-1 group">
          <a href="/Asesorias"
            class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] hover:text-gray-100 rounded-md">
            <i class='bx bx-calendar-event mr-3 text-lg'></i>
            <span class="nav-text text-sm">Sesiones de Asesoría</span>
          </a>
        </li>

        <!-- PERSONAL Section -->
        <span class="text-gray-400 font-bold nav-text">PERSONAL</span>
        <li class="mb-1 group">
          <a href="/notificaciones"
            class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] hover:text-gray-100 rounded-md">
            <i class='bx bx-bell mr-3 text-lg'></i>
            <span class="nav-text text-sm">Notificaciones</span>
          </a>
        </li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
        <button href="{{ route('logout') }}" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-[#394C5F] hover:text-gray-100 rounded-md w-full">
        <i class='bx bx-log-out mr-3 text-xl'></i>
        <span class="nav-text text-sm">Cerrar sesion</span>
      </button>
    </form>
      </ul>



    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay" id="overlay"></div>
    <!-- end sidenav -->


    <main class="main-content w-full bg-gray-200 h-screen min-h-[500px] overflow-y-scroll transition-all" id="main">
      <!-- navbar -->
      <div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">

        <button type="button" class="text-lg text-white font-semibold sidebar-toggle">
          <i class=" bg-[#03A696] rounded-md p-2 ri-menu-line"></i>
        </button>

        <ul class="ml-auto flex items-center ">
          <li class="mr-1 dropdown">
            <button type="button"
              class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full"
                viewBox="0 0 24 24" style="fill: gray;transform: ;msFilter:;">
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
                  <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-900"></i>
                </div>
              </form>
            </div>
          </li>
          <li class="dropdown  hidden md:block">
            <button type="button"
              class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full"
                viewBox="0 0 24 24" style="fill: gray;transform: ;msFilter:;">
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
             {{--    <button type="button" data-tab="notification" data-tab-page="messages"
                  class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button> --}}
              </div>
              <div class="my-2">
                <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                  <li>
                    <a href="/notificaciones" class="py-2 px-4 flex items-center hover:bg-slate-100/80 group">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                      </svg>
                      <div class="ml-2">
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">¡Tu proyecto ha sido calificado!
                        </div>
                        <div class="text-[11px] text-gray-400">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="/notificaciones" class="py-2 px-4 flex items-center hover:bg-slate-100/80 group">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                      </svg>
                      <div class="ml-2">
                        <div class="text-[13px] text-slate-800 font-medium truncate group-hover:text-teal-500">¡Nuevo Miembro del Equipo!
                        </div>
                        <div class="text-[11px] text-slate-600">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="/notificaciones" class="py-2 px-4 flex items-center hover:bg-slate-100/80 group">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                      </svg>
                      <div class="ml-2">
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">¡Comentario Pendiente de Respuesta!
                        </div>
                        <div class="text-[11px] text-gray-400">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="/notificaciones" class="py-2 px-4 flex items-center hover:bg-slate-100/80 group">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                      </svg>
                      <div class="ml-2">
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">¡Tu Proyecto ha sido Calificado!
                        </div>
                        <div class="text-[11px] text-gray-400 ">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="/notificaciones" class="py-2 px-4 flex items-center hover:bg-slate-100/80 group">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                      </svg>
                      <div class="ml-2">
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">¡Nuevo Miembro del Equipo!
                        </div>
                        <div class="text-[11px] text-gray-400">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</div>
                      </div>
                    </a>
                  </li>
                </ul>
                <ul class="max-h-64 overflow-y-auto hidden" data-tab-for="notification" data-page="messages">
                  <li>
                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                      <img src="https://placehold.co/32x32" alt=""
                        class="w-8 h-8 rounded block object-cover align-middle">
                      <div class="ml-2">
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">John Doe
                        </div>
                        <div class="text-[11px] text-gray-400">Hello there!</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="py-2 px-4 flex items-center hover:bg-slate-100 group">
                      <img src="https://placehold.co/32x32" alt=""
                        class="w-8 h-8 rounded block object-cover align-middle">
                      <div class="ml-2">
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-teal-500">John Doe
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
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe
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
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe
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
                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">John Doe
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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full"
              viewBox="0 0 24 24" style="fill: gray;transform: ;msFilter:;">
              <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
            </svg>
          </button>
          <li class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
              <div class="flex-shrink-0 w-10 h-10 relative">
                <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                  <img class="w-8 h-8 rounded-full"
                    src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/9.jpg" alt="" />
                  <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping">
                  </div>
                  <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                </div>
              </div>
              <div class="p-2 hidden md:block text-left ">
                <h2 class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                <p class="text-xs text-gray-500">Administrator</p>
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
                  <a href="{{ route('logout') }}"role="menuitem"
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

</body>

</html>
