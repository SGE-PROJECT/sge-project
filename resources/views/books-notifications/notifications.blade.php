@extends('layouts.panel')

@section('titulo')
    Notificaciones
@endsection

@section('contenido')
<section class=" mx-8 font-poppins mt-4 mb-4 ">
       {{--  <section class=" ">
            <h1 class=" uppercase font-semibold text-2xl">Notificaciones</h1>
            <button class=" rounded p-1 bg-neutral-50 text-slate-700 hover:border-gray-300 hover:bg-white border-[1px] border-gray-100 shadow-sm flex gap-1 float-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                  </svg>
                  
                Marcar todos como leídos</button>
        </section> --}}
        <section class="  ">
            <h1 class=" uppercase font-semibold text-2xl text-[#293846] ">Notificaciones</h1>
          
            <button class=" rounded p-1 text-neutral-50 bg-teal-500 hover:border-gray-300 hover:bg-teal-600 border-[1px] border-gray-100 shadow-sm flex gap-1 float-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                  </svg>
                  
                Marcar todos como leídos</button>
        </section>

        <section>

       
        <header class=" uppercase font-semibold text-slate-600  mt-4 text-xl border-slate-400  border-b-2">
            Hoy <span class=" ml-4 text-lg">{{ now()->format('d-m-y') }}</span>
        </header>
        <div class=" flex justify-end py-2 text-sm">

            <button onclick="HiddenNotifications()" id="btn-notification" class=" flex items-center border-[2px] border-gray-300 rounded bg-slate-100 text-slate-600 p-1 gap-[3px] hover:bg-slate-100/50 group/item hover:border-gray-400/60"> 
            
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>         
            Ocultar</button>
        </div>
        <ul class="flex flex-col gap-4" id="notifications">
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm  hover:scale-[1.003] duration-[330ms] ">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty cursor-pointer ">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Tu Proyecto ha sido Calificado!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                        <div >
                            <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                                8 hora(s) atrás
                            </h1>
                            <h1 class=" capitalize text-slate-500 ">No leído</h1>
                          </div>
                          
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm   hover:scale-[1.003] duration-[330ms]">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty cursor-pointer ">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Nuevo Miembro del Equipo!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                    <div >
                        <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                            8 hora(s) atrás
                        </h1>
                        <h1 class=" capitalize text-slate-500">No leído</h1>
                      </div>
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm  hover:scale-[1.003] duration-[330ms] ">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                   
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty cursor-pointer ">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Comentario Pendiente de Respuesta!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                    <div >
                        <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                            8 hora(s) atrás
                        </h1>
                        <h1 class=" capitalize  text-teal-500">leído</h1>
                      </div>
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm   hover:scale-[1.003] duration-[330ms]">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty  cursor-pointer">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Tienes un Nuevo Comentario en tu Proyecto!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                    <div >
                        <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                            8 hora(s) atrás
                        </h1>
                        <h1 class=" capitalize text-slate-500">No leído</h1>
                      </div>
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
           
          
            
            
        </ul>
    </section>

    <section>

       
        <header class=" uppercase font-semibold text-slate-600  my-4 text-xl border-slate-400 pb-2  border-b-2">
            ayer
        </header>
        <div class=" flex justify-end py-2 text-sm">

            <button onclick="HiddenNotificationsYesterday()" id="btn-notification-yesterday" class=" flex items-center border-[2px] border-gray-300 rounded bg-slate-100 text-slate-600 p-1 gap-[3px] hover:bg-slate-100/50 group/item hover:border-gray-400/60"> 
            
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>         
            Ocultar</button>
        </div>
        <ul class=" flex flex-col gap-4" id="notifications-yesterday">
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm  hover:scale-[1.003] duration-[330ms] ">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty cursor-pointer ">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Tu Proyecto ha sido Calificado!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                        <div >
                            <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                                8 hora(s) atrás
                            </h1>
                            <h1 class=" capitalize text-slate-500 ">No leído</h1>
                          </div>
                          
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm   hover:scale-[1.003] duration-[330ms]">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty cursor-pointer ">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Nuevo Miembro del Equipo!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                    <div >
                        <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                            8 hora(s) atrás
                        </h1>
                        <h1 class=" capitalize text-slate-500">No leído</h1>
                      </div>
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm   hover:scale-[1.003] duration-[330ms]">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                   
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty cursor-pointer ">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Comentario Pendiente de Respuesta!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                    <div >
                        <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                            8 hora(s) atrás
                        </h1>
                        <h1 class=" capitalize  text-teal-500">leído</h1>
                      </div>
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
            <li class=" flex  items-center  rounded bg-white p-4 shadow-sm  hover:scale-[1.003] duration-[330ms]     ">
                <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                      </svg>
                      
                      
                </div>
                  <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                    <div class=" flex flex-col text-pretty  cursor-pointer">

                        <h1 class=" font-semibold text-gray-900 text-base ">¡Tienes un Nuevo Comentario en tu Proyecto!</h1>
                        <p class=" font-medium text-slate-500/85">El profesor Carlos Ramos ha dado 4 estrellas a tu proyecto</p>
                    </div> 
                   
                    <div >
                        <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">

                            8 hora(s) atrás
                        </h1>
                        <h1 class=" capitalize text-slate-500">No leído</h1>
                      </div>
                
                  </div>
                
                  <div class="  flex justify-center    mr-2 gap-3">
                    <div x-data="{ open: false }"  >
                        <button @click="open = !open">
                            <!-- Icono de tres puntos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    
                        <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</a>
                        </div>
                    </div>
                       </div>
                  
            </li>
           
          
            
            
        </ul>
    </section>

    </section>
    <!-- Asegúrate de utilizar la versión más reciente de Alpine.js -->
<script src="//unpkg.com/alpinejs" defer>

</script>
<script>
     const button = document.getElementById('btn-notification');
        button.addEventListener('click',()=>{
            const notifications=document.getElementById('notifications');
         notifications.classList.toggle("hidden");
         button.innerHTML = notifications.classList.contains('hidden') ?
            '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>   Mostrar' :
            '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" /></svg>Ocultar';
        })

        const buttonYesterday = document.getElementById('btn-notification-yesterday');
        buttonYesterday.addEventListener('click',()=>{
            const notificationsYesterday=document.getElementById('notifications-yesterday');
         notificationsYesterday.classList.toggle("hidden");
         buttonYesterday.innerHTML = notificationsYesterday.classList.contains('hidden') ?
            '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>   Mostrar' :
            '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" /></svg>Ocultar';
        })
   
</script>

        
@endsection
