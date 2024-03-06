@vite('resources/css/app.css')
@extends('layouts.panel')

@section('titulo', 'FormProject')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <h2 class="text-3xl font-bold sm:text-4xl text-center mb-6">CÉDULA DE ANTEPROYECTO </h2>
        <form action="#" class="space-y-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Nombre Completo:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu nombre completo" type="text" />
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Matricula:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" placeholder="Ingresa tu matricula"
                        type="text" />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div>
                    <label class="text-sm font-semibold" for="email">Grupo:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" placeholder="Ingresa tu grupo"
                        type="text" />
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Número Teléfonico:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu número teléfonico" type="tel" />
                </div>
                <div>
                    <label class="text-sm font-semibold" for="phone">Correo Electrónico:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu correo electrónico" type="email" />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Fecha de inicio del Proyecto:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la fecha de inicio del proyecto" type="date" />
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Fecha de término del Proyecto:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la fecha de finalización del proyecto" type="date" />
                </div>
            </div>
            <br>
            <br>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Empresa:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre de la empresa" type="text" />
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Dirreción de la Empresa:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la dirección de la empresa" type="text" />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Nombre del Asesor Empresarial:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre del asesor" type="text" />
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Cargo del Asesor:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el cargo del asesor" type="text" />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Número Teléfonico del Asesor:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el número teléfonico del asesor" type="tel" />
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Correo Electrónico:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el correo electrónico del asesor" type="email" />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="text-sm font-semibold" for="email">Área donde se realizara el proyecto:</label>
                    <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu área actual" type="text" />
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Objetivo General:</label>

                <textarea class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" placeholder="Redacta aqui..." rows="8"></textarea>
            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Planteamiento del problema: Exponer los aspectos,
                    elementos y relaciones del problema:</label>

                <textarea class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" placeholder="Redacta aqui..." rows="8"></textarea>
            </div>
            <div>
                <label class="text-sm font-semibold text-justify" for="message">Justificacion: Debe manifestarse de
                    manera
                    clara y
                    precisa del por qué y para qué se va a llevar a cabo el estudio. Causas y propositos que motivan la
                    investigación:</label>

                <textarea class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" placeholder="Redacta aqui..." rows="8"></textarea>
            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Actividades para realizar: Listar las actividades a
                    llevar a cabo en orden:</label>
                <textarea class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" placeholder="Redacta aqui..." rows="8"></textarea>
            </div>

            <div class="mt-8 flex justify-center text-center space-x-6">
                <button
                    class="bg-blue-500 hover:bg-teal-950 text-white font-bold py-3 px-6 rounded-md shadow-lg hover:text-white hover:shadow-green-900 transform transition-all duration-500 ease-in-out hover:scale-110 hover:brightness-110 active:animate-bounce">
                    Editar
                </button>
                <button
                    class="bg-blue-500 hover:bg-teal-950 text-white font-bold py-3 px-6 rounded-md shadow-lg hover:text-white hover:shadow-green-900 transform transition-all duration-500 ease-in-out hover:scale-110 hover:brightness-110 active:animate-bounce">
                    Guardar
                </button>
                <button id="openModalButton"
                    class="overflow-hidden w-32 p-2  bg-[#03A696] text-white border-none rounded-md text-medium font-medium cursor-pointer relative z-10 group">
                    Publicar
                    <span
                        class="absolute w-36 h-32 -top-8 -left-2 bg-white rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-500 duration-1000 origin-left"></span>
                    <span
                        class="absolute w-36 h-32 -top-8 -left-2 bg-teal-500 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"></span>
                    <span
                        class="absolute w-36 h-32 -top-8 -left-2 bg-teal-950 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"></span>
                    <span
                        class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-3 left-9 z-10">Seguro?</span>
                </button>
            </div>
        </form>
    </div>
    
    @include('layouts.modal', [
    'title' => 'Publicar Proyecto',
    'message' => '¿Estás seguro de que deseas publicar tu proyecto? Una vez subido ya no se pueden hacer cambios. Esta acción no se puede deshacer.',
    'cancelButton' => 'Cancelar',
    'confirmButton' => 'Publicar'
    
])


@endsection

