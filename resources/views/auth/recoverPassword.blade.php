@extends('layouts.app')

<div class="flex h-screen bg-slate-300">
  <div class="w-1/2 bg-gray-800 flex flex-col justify-center items-center px-8 relative rounded-r-3xl">
    <img src="/images/logo_sge.svg" class="absolute top-0 left-0 mt-8 ml-8" style="width: 100px;">
    <h2 class="text-xl font-bold text-white">¿Olvidaste tu contraseña?</h2>
    <p class="text-white my-4">No te preocupes, podemos ayudarte.</p>
    <form class="w-full max-w-md" method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="email">
            Correo electrónico
          </label>
          <input class="appearance-none block w-full bg-white text-gray-800 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-200 focus:border-gray-500" id="email" type="email" name="email" placeholder="Correo electrónico" required>
        </div>
        <div class="w-full px-3 mb-6">
          <button class="bg-white text-blue-500 hover:text-white font-bold py-2 px-4 border border-blue-500 hover:bg-blue-500 rounded focus:outline-none focus:shadow-outline" type="submit">
            Enviar contraseña
          </button>
        </div>
      </div>
    </form>
  </div>
  <div class="w-1/2 flex justify-center items-center relative px-8" style="background-image: url('https://images.pexels.com/photos/3646172/pexels-photo-3646172.jpeg'); background-size: cover;">
    <div class="bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl uppercase font-bold">Importante</h2>
      <div class="mt-4">
        <ul class="list-disc ml-8">
          <li class="mb-1">No revele su contraseña.</li>
          <li class="mb-1">No reutilice contraseñas.</li>
          <li class="mb-1">Utilice contraseñas alfanuméricas.</li>
          <li class="mb-1">Una vez completando los datos solicitados, revise su correo.</li>
        </ul>
      </div>
    </div>
  </div>
</div>
