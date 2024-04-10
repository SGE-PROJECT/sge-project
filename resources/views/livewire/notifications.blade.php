
    {{-- The Master doesn't talk, he acts. --}}
    <section class=" mx-8 mt-10 font-poppins  mb-4 ">
        

             <section class="  ">
                <h1 class=" uppercase font-semibold text-2xl text-[#293846] ">Notificaciones</h1>
                <ul class=" flex gap-8 my-4">
                    <button wire:click="selectTab('today')" class="{{ $selectedTab === 'today' ? ' border-b-2   text-xl shadow-sm  hover:bg-gray-100 hover:text-teal-500 text-slate-600 border-teal-500/90 bg-white/80        rounded   px-2 py-1' : 'hover:shadow-sm border-b-2 border-slate-500 rounded text-xl  bg-slate-400 text-white/85 px-2 py-1 hover:bg-slate-400/80 hover:text-white/85 hover:border-slate-500' }}">Hoy</button>
                    <button wire:click="selectTab('all')" class="{{ $selectedTab === 'all' ? ' border-b-2   text-xl  hover:bg-white/85 hover:text-slate-700 text-slate-600 border-teal-500/90 bg-white/70  rounded   px-2 py-1 hover:shadow-sm shadow-sm' : 'hover:shadow-sm border-b-2 border-slate-500 rounded text-xl  bg-slate-400 text-white/85 px-2 py-1 hover:bg-slate-400/80 hover:text-white/85 hover:border-slate-500' }}">Todos</button>
                    <button type="button" wire:click="markAsReadAll()"   wire:confirm="¿Esta seguro que quieres marcar todas tus notificaciones como leídas?" class=" rounded p-1 text-base text-neutral-50 bg-teal-500 hover:border-gray-300 hover:bg-teal-600 border-[1px] border-gray-100 shadow-sm flex gap-1 justify-center items-center flex-wrap "
                  
                    >     
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                        Marcar todos como leídos
                      
                      </button>
                      <button type="button" wire:click="deleteAll()" wire:confirm="¿Está seguro que quiere eliminar todas sus notificaciones?" class="flex-wrap rounded p-1 text-base text-neutral-50 bg-teal-500 hover:border-gray-300 hover:bg-teal-600 border-[1px] border-gray-100 shadow-sm flex gap-1 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        
                        
                        
                        Eliminar todas las notificaciones
                    </button>
                    @if(Auth::check() && Auth::user()->hasAnyRole(['Administrador de División']))
                    <button type="button" id="show-button" class="flex-wrap rounded p-1 text-base text-neutral-50 bg-teal-500 hover:border-gray-300 hover:bg-teal-600 border-[1px] border-gray-100 shadow-sm flex gap-1 justify-center items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                      </svg>                      
                     Enviar Aviso
                  </button>
                    @endif
                    <dialog id="alert-dialog" class=" rounded-sm relative font-poppins text-lg">
                      <button class=" absolute right-1 top-2 hover:bg-gray-200/90 rounded-full" onClick="this.parentElement.close()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                      </button>
                      <div class=" p-10">
                      <h3 class="mb-4">¡Envia un mensaje a toda la comunidad estudiantil!</h3>
                      <form    action="{{ route('studentsForDivision') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div>
                        <label class=" mb-2" for="data">Mensaje:</label>
                        <textarea name="data" id="" cols="30" rows="10" maxlength="100"></textarea>
                      </div>
                      
                      <footer class=" flex justify-between">
                      <button class=" bg-teal-500 text-white p-1 rounded hover:bg-teal-600" id="btn-send-advise">Cerrar</button>
                    
                      <button type="submit" class="flex-wrap rounded p-1 text-base text-neutral-50 bg-teal-500 hover:border-gray-300 hover:bg-teal-600 border-[1px] border-gray-100 shadow-sm flex gap-1 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                       Enviar Aviso
                    </button>
                          </form>
                  </footer>
                    </div>
                    </dialog>
                    
                </ul>
              
             
            </section>
    
            <section>  
            <header class="  text-slate-600  mt-4 text-xl border-slate-400  border-b-2 flex justify-between">
            <span class=" uppercase font-semibold ml-4 text-lg">{{ $date }}</span>
          
                
            </header>
            <div class=" flex justify-end py-2 text-sm">
    
  
            </div>
            @if ($selectedTab === 'today')
            <ul class="flex flex-col gap-4" id="notifications"> 
          
                @forelse ($notificationsToday as $notification )

                <li wire:key="{{ $notification->id }}" class=" flex  items-center  rounded bg-white p-4 shadow-sm   duration-[330ms] ">
                    <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                          </svg>
                          
                          
                    </div>
                      <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                        <div class=" flex flex-col text-pretty cursor-pointer ">
    
                            <h1 class=" font-semibold text-gray-900 text-base ">¡{{$notification->data['object']}}!</h1>
                            <p class=" font-medium text-slate-500/85">{{$notification->data['data']}}</p>
                        </div> 
                       
                            <div >
                                <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">
    
                                    {{$notification->created_at->diffForHumans()}}
                                </h1>
                                @if ($notification->read_at)
    <h1 class="capitalize text-teal-500">Leído</h1>
@else
    <h1 class="capitalize text-slate-500">No leído</h1>
@endif
                              </div>
                              
                    
                      </div>
                    
                      <div class="  flex justify-center    mr-2 gap-3">
                        <div x-data="{ open: false }"  >
                          <button x-on:click="open = !open" class=" hover:bg-gray-200 rounded-full">
                              <!-- Icono de tres puntos -->
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                              </svg>
                          </button>
                      
                          <div x-show="open" x-on:click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                              <button type="button"  x-on:click="$wire.markAsRead('{{$notification->id}}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</button>
                              <button type="button"  x-on:click="$wire.delete('{{$notification->id}}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</button>
                          </div>
                      </div>
                           </div>
                      
                </li>
                    
                @empty
                <li class=" flex  items-center  rounded bg-white p-4 shadow-sm  duration-[330ms] ">
                    <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                       
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-6 h-6 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                          </svg>
                          
                          
                    </div>
                      <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                        <div class=" flex flex-col text-pretty cursor-pointer ">
    
                            <h1 class=" font-semibold text-gray-900 text-base ">¡No hay  notificaciones para el día de hoy!</h1>
                            <p class=" font-medium text-slate-500/85">Bandeja Vacía</p>
                        </div> 
                      </div>
                    
                
                       
                </li>
                    
                @endforelse                   
            </ul>
            @elseif ($selectedTab === 'all')
            <ul class="flex flex-col gap-4" id="notifications">
                @forelse ($notificationsToday as $notification )

                <li wire:key="{{ $notification->id }}" class=" flex  items-center  rounded bg-white p-4 shadow-sm   duration-[330ms] ">
                    <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                          </svg>
                          
                          
                    </div>
                      <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                        <div class=" flex flex-col text-pretty cursor-pointer ">
    
                            <h1 class=" font-semibold text-gray-900 text-base ">¡{{$notification->data['object']}}!</h1>
                            <p class=" font-medium text-slate-500/85">{{$notification->data['data']}}</p>
                        </div> 
                       
                            <div >
                                <h1 class=" text-indigo-700 font-medium   decoration-slate-50 capitalize">
    
                                    {{$notification->created_at->diffForHumans()}}
                                </h1>
                                @if ($notification->read_at)
                                <h1 class="capitalize text-teal-500">Leído</h1>
                            @else
                                <h1 class="capitalize text-slate-500">No leído</h1>
                            @endif
                              </div>
                              
                    
                      </div>
                    
                      <div class="  flex justify-center    mr-2 gap-3">
                        <div x-data="{ open: false }"  >
                            <button x-on:click="open = !open" class=" hover:bg-gray-200 rounded-full">
                                <!-- Icono de tres puntos -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-7 cursor-pointer ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </button>
                        
                            <div x-show="open" x-on:click.away="open = false" class="absolute bg-white shadow-lg rounded-lg py-1 right-px">
                                <button type="button"  x-on:click="$wire.markAsRead('{{$notification->id}}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcar como leído</button>
                                <button type="button"  x-on:click="$wire.delete('{{$notification->id}}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eliminar notificación</button>
                            </div>
                        </div>
                           </div>
                      
                </li>
                    
                @empty
                <li class=" flex  items-center  rounded bg-white p-4 shadow-sm  duration-[330ms] ">
                    <div class=" flex justify-center ml-2 border-teal-300 border-[1px] rounded-full p-1 bg-teal-100/40">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-6 h-6 text-teal-400 hover:scale-[1.005] duration-[350ms]  hover:-translate-y-[1px] ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                          </svg>
                          
                          
                    </div>
                      <div class="  flex flex-1 justify-between mx-3 gap-2 pr-2 pl-1">  
                        <div class=" flex flex-col text-pretty cursor-pointer ">
    
                            <h1 class=" font-semibold text-gray-900 text-base ">¡No hay  notificaciones!</h1>
                            <p class=" font-medium text-slate-500/85">Bandeja Vacía</p>
                        </div> 
            
                    
                      </div>
                  
                      
                </li>
                    
                @endforelse                   
            </ul>
            @endif
        </section>
        <style>
          #alert-dialog::backdrop {
  background: linear-gradient(#000d, #000a);
}
            .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
        </style>
        <script>
          window.addEventListener('DOMContentLoaded',(event)=>{
            const showButton = document.querySelector("#show-button");
showButton.addEventListener("click", function () {
  const alertDialog = document.querySelector("#alert-dialog");
  alertDialog.showModal();
});
          })
        </script>
        </section>
