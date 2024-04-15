@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'Ver mi Anteproyecto')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <li
            class="flex items-center  font-sans hover:text-teal-500 font-semibold  transition-colors duration-300 cursor-pointer">
            <a class="text-xl" href={{ route('home') }}>⭠ Regresar</a>
        </li>
        <h2 class="text-3xl font-bold sm:text-4xl text-center mt-2">INFORMACIÓN DE MI CEDULA DE ANTEPROYECTO</h2>
        <form action="{{ route('projects.update', $proyecto->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('put')

            <input type="hidden" name="action" value="editar">

            <!-- component -->
            <section>
                <div class="py-4">
                    <div class="mx-auto px-6 max-w-7xl text-gray-500">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Nombre Completo:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $student->user->name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Matricula:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $student->registration_number }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Grupo:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $student->group->name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Número Teléfonico:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $proyecto->phone_student }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Correo Electrónico:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $student->user->email }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Nombre del Proyecto:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $proyecto->name_project }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Empresa:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $proyecto->company_name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Grupo:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $student->group->name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Grupo:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $student->group->name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                                <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1] py-1 px-4">
                                    <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                                </div>
                                <div class="relative">
                                    <div class="mt-6 pb-6 p-3">
                                        <label class="text-medium font-semibold">Grupo:</label>
                                        <input name="fullname_student"
                                            class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                            placeholder="Ingresa tu nombre completo" type="text"
                                            value="{{ $student->group->name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mt-8 flex justify-center text-center space-x-2">
                <button
                    class=" font-bold bg-teal-500 text-white ml-24  px-6 py-2 rounded hover:bg-teal-700 transition-colors">Editar</button>
                <button
                    class=" font-bold bg-blue-500 text-white  px-6 py-2 rounded hover:bg-blue-700 transition-colors">Publicar</button>


            </div>
        </form>
    </div>
@endsection
