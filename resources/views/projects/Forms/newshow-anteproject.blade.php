@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'Editar mi Anteproyecto')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <li
            class="flex items-center  font-sans hover:text-teal-500 font-semibold  transition-colors duration-300 cursor-pointer">
            <a class="text-2xl" href="/anteproyecto">⭠ Regresar</a>
        </li>
        <h2 class="text-3xl font-bold sm:text-4xl text-center mt-2 mb-10">EDITAR MI CEDULA DE ANTEPROYECTO</h2>
        <form action="{{ route('projects.update', $proyecto->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('put')

            <input type="hidden" name="action" value="editar">

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="fullname_student"
                                class="w-full rounded-lg border-2 bg-gray-100 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text" value="{{ $proyecto->fullname_student }}"/>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Matricula:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="id_student" 
                                class="w-full rounded-lg border-2 bg-gray-100 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $proyecto->id_student }}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Grupo:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="group_student"
                                class="w-full rounded-lg border-2 bg-gray-100 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $proyecto->group_student }}"/>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Correo Electrónico:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="email_student"
                                class="w-full rounded-lg border-2 bg-gray-100 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"value="{{ $proyecto->email_student }}"
                                readonly />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Número Teléfonico:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="phone_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $proyecto->phone_student }}"/>
                            <div class="text-red-400 font-bold text-lg">
                                @error('phone_student')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Nombre del Proyecto:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="name_project" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa el nombre del proyecto" type="text"
                                value="{{ $proyecto->name_project }}"  />
                            <div class="text-red-400 font-bold text-lg">
                                @error('name_project')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Empresa:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="company_name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa el nombre de la empresa" type="text"
                                value="{{ $proyecto->company_name }}" />
                            <div class="text-red-400 font-bold text-lg">
                                @error('company_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Dirreción de la Empresa:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="company_address" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa la dirección de la empresa" type="text"
                                value="{{ $proyecto->company_address }}" />
                            <div class="text-red-400 font-bold text-lg">
                                @error('company_address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Nombre del Asesor Empresarial:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa el nombre del asesor" type="text" value="{{ $proyecto->BusinessAdvisor->name }}"  />
                            <div class="text-red-400 font-bold text-lg">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Cargo del Asesor Empresarial:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="position" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa el cargo del asesor" type="text"
                                value="{{ $proyecto->BusinessAdvisor->position }}" />
                            <div class="text-red-400 font-bold text-lg">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Número Teléfonico del Asesor Empresarial:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="phone" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa el número teléfonico del asesor" type="tel"
                                value="{{ $proyecto->BusinessAdvisor->phone }}"/>
                            <div class="text-red-400 font-bold text-lg">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Correo Electrónico del Asesor Empresarial:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="email" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa el correo electrónico del asesor" type="email"
                                value="{{ $proyecto->BusinessAdvisor->email }}"/>
                            <div class="text-red-400 font-bold text-lg">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Área donde se realizara el proyecto:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="project_area" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu área actual" type="text"  value="{{ $proyecto->project_area }}"  />
                            <div class="text-red-400 font-bold text-lg">
                                @error('project_area')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Objetivo General (Utiliza un verbo en infinitivo
                            para
                            indicar claramente qué acción deseas lograr. Evita términos confusos y sé específico, mantén el
                            objetivo
                            breve y enfocado en la acción necesaria del proyecto.) :</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="general_objective" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8">{{ $proyecto->general_objective }}</textarea>
                            <div class="absolute bottom-[-1px] text-red-400 font-bold text-lg">
                                @error('general_objective')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Planteamiento del problema: Exponer los aspectos,
                            elementos y relaciones del problema:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="problem_statement" class="w-full rounded-lg  border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8">{{ $proyecto->problem_statement }}</textarea>
                            <div class="absolute bottom-[-1px] text-red-400 font-bold text-lg">
                                @error('problem_statement')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Justificacion: Debe manifestarse de
                            manera
                            clara y
                            precisa del por qué y para qué se va a llevar a cabo el estudio. Causas y propositos que motivan
                            la
                            investigación:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="justification" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8">{{ $proyecto->justification }}</textarea>
                            <div class="absolute bottom-[-1px] text-red-400 font-bold text-lg">
                                @error('justification')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Actividades para realizar: Listar las actividades
                            a
                            llevar a cabo en orden:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="activities" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8">{{ $proyecto->activities }}</textarea>
                            <div class="absolute bottom-[-1px] text-red-400 font-bold text-lg">
                                @error('activities')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-center text-center space-x-2">
                <button
                class=" font-bold bg-blue-500 text-white  px-6 py-2 rounded hover:bg-blue-700 transition-colors">
                <i class='bx bx-edit-alt'></i>Editar</button>
            </div>
        </form>
    </div>
@endsection