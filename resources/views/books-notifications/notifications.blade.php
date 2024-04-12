@extends('layouts.panel')

@section('titulo')
    Notificaciones
@endsection

@section('contenido')
<livewire:notifications />
    <!-- Asegúrate de utilizar la versión más reciente de Alpine.js -->
<script src="//unpkg.com/alpinejs" defer>
</script>
<script defer>
   const button = document.getElementById('btn-notification');
   button.addEventListener('click',()=>{
       const notifications=document.getElementById('notifications');
    notifications.classList.toggle("hidden");
    button.innerHTML = notifications.classList.contains('hidden') ?
       '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" /></svg>  Mostrar' :
       '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  group-hover/item:text-teal-500"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>Ocultar';
   })

   function contarLetras(){
    let contador =document.getElementById('contador-text-not');
    let resultado=document.querySelector('.resultado-text-not');
    let cantidad=contador.value.length
    resultado.innerHTML=cantidad;
   }

</script>        
@endsection
