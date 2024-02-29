@extends('layouts.app')
<div class="flex h-screen">
  <div class="w-1/2 bg-white flex flex-col justify-center items-center px-8">
      <h2 class="text-xl font-bold">Importante</h2>
      <div class="mt-4">
          <p class="mb-2">Lea la información a continuación y comparta los requisitos solicitados:</p>
          <ul class="list-disc ml-8">
              <li class="mb-1">No revele su contraseña.</li>
              <li class="mb-1">No reutilice contraseñas.</li>
              <li class="mb-1">Utilice contraseñas alfanuméricas.</li>
              <li class="mb-1">Una vez completando los datos solicitados, revise su correo.</li>
          </ul>
      </div>
  </div>
  <div class="w-1/2 bg-gray-800 flex flex-col justify-center items-center px-8" style="border-top-left-radius: 2.5rem; border-bottom-left-radius: 2.5rem;">
      <h2 class="text-xl font-bold text-white">¿Olvidaste tu contraseña?</h2>
      <p class="text-white my-4">No te preocupes, podemos ayudarte.</p>
      <form class="w-full max-w-md">
          <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6">
                  <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="email">
                      Correo electrónico
                  </label>
                  <input class="appearance-none block w-full bg-white text-gray-800 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-200 focus:border-gray-500" id="email" type="email" placeholder="Correo electrónico">
              </div>
              <div class="w-full px-3 mb-6">
                  <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="matricula">
                      Matrícula
                  </label>
                  <input class="appearance-none block w-full bg-white text-gray-800 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-200 focus:border-gray-500" id="matricula" type="text" placeholder="Matrícula">
              </div>
              <div class="w-full px-3 mb-6">
                  <button class="bg-white text-blue-500 hover:text-white font-bold py-2 px-4 border border-blue-500 hover:bg-blue-500 rounded focus:outline-none focus:shadow-outline" type="button">
                      Continuar
                  </button>
              </div>
          </div>
      </form>
  </div>
</div>
