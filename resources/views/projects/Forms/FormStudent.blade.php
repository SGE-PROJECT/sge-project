@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'FormularioAnteproyecto')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <li
            class="flex items-center font-sans hover:text-teal-500 text-xl antialiased font-semibold leading-normal transition-colors duration-300 cursor-pointer">
            <a href="proyectoinvitacion">⭠ Regresar</a>
        </li>
        <h2 class="text-3xl font-bold sm:text-4xl text-center mb-6">CÉDULA DE ANTEPROYECTO </h2>
        <form id="projectForm" action="{{ route('envproyecto') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Nombre Completo:</label>
                    <input name="fullname_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        type="text" value="{{ Auth::user()->name }}" readonly>
                    <div class="text-red-400 font-bold text-lg">
                        @error('fullname_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="text-sm font-semibold">Matricula:</label>
                    <input name="id_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" type="text"
                        value="{{ Auth::user()->student->registration_number }}"readonly></input>
                    <div class="text-red-400 font-bold text-lg">
                        @error('id_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div>
                    <label class="text-sm font-semibold">Grupo:</label>
                    <input name="group_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        value="{{ Auth::user()->student->group->name }}" readonly>
                    </input>
                    <div class="text-red-400 font-bold text-lg">
                        @error('group_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="text-sm font-semibold" for="email">Correo Electrónico:</label>
                    <input name="email_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        type="email" value="{{ Auth::user()->email }}" readonly></input>
                    <div class="text-red-400 font-bold text-lg">
                        @error('email_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="text-sm font-semibold" for="phone">Número Teléfonico:</label>
                    <input name="phone_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu número teléfonico" type="tel" value="{{ old('phone_student') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('phone_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Fecha de inicio del Proyecto:</label>
                    <input name="startproject_date" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la fecha de inicio del proyecto" type="date"
                        value="{{ old('startproject_date') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('startproject_date')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Fecha de término del Proyecto:</label>
                    <input name="endproject_date" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la fecha de finalización del proyecto" type="date"
                        value="{{ old('endproject_date') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('endproject_date')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="text-sm font-semibold">Nombre del Proyecto:</label>
                    <input name="name_project" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre del proyecto" type="text" value="{{ old('name_project') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('name_project')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Empresa:</label>
                    <input name="company_name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre de la empresa" type="text" value="{{ old('company_name') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('company_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Dirreción de la Empresa:</label>
                    <input name="company_address" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la dirección de la empresa" type="text"
                        value="{{ old('company_address') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('company_address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Nombre del Asesor Empresarial:</label>
                    <input name="name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre del asesor" type="text"
                        value="{{ old('name') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Cargo del Asesor Empresarial:</label>
                    <input name="position" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el cargo del asesor" type="text"
                        value="{{ old('position') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('position')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Número Teléfonico del Asesor Empresarial:</label>
                    <input name="phone" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el número teléfonico del asesor" type="tel"
                        value="{{ old('phone') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Correo Electrónico:</label>
                    <input name="email" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el correo electrónico del asesor" type="email"
                        value="{{ old('email') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="text-sm font-semibold">Área donde se realizara el proyecto:</label>
                    <input name="project_area" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu área actual" type="text" value="{{ old('project_area') }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('project_area')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Objetivo General (Utiliza un verbo en infinitivo para
                    indicar claramente qué acción deseas lograr. Evita términos confusos y sé específico, mantén el objetivo
                    breve y enfocado en la acción necesaria del proyecto.) :</label>

                <div class="relative">
                    <textarea name="general_objective" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Redacta aqui..." rows="8">{{ old('general_objective') ?: '' }}</textarea>

                    <div class="absolute bottom-[-6px] text-red-400 font-bold text-lg">
                        @error('general_objective')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Planteamiento del problema: Exponer los aspectos,
                    elementos y relaciones del problema:</label>

                <div class="relative">
                    <textarea name="problem_statement" class="w-full rounded-lg  border-2 border-gray-300 p-3 text-sm"
                        placeholder="Redacta aqui..." rows="8">{{ old('problem_statement') ? old('problem_statement') : '' }}</textarea>

                    <div class="absolute bottom-[-6px] text-red-400 font-bold text-lg">
                        @error('problem_statement')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold text-justify" for="message">Justificacion: Debe manifestarse de
                    manera
                    clara y
                    precisa del por qué y para qué se va a llevar a cabo el estudio. Causas y propositos que motivan la
                    investigación:</label>

                <div class="relative">
                    <textarea name="justification" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Redacta aqui..." rows="8">{{ old('justification') }}</textarea>

                    <div class="absolute bottom-[-6px] text-red-400 font-bold text-lg">
                        @error('justification')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Actividades para realizar: Listar las actividades a
                    llevar a cabo en orden:</label>

                <div class="relative">
                    <textarea name="activities" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Redacta aqui..." rows="8">{{ old('activities') }}</textarea>

                    <div class="absolute bottom-[-6px] text-red-400 font-bold text-lg">
                        @error('activities')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-center text-center space-x-6">
                <button type="submit" action value="guardar"
                    class="font-bold bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">Guardar</button>

                <button type="submit" name="action" value="publicar" id="publishButton"
                    class="font-bold bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">Publicar</button>

            </div>
            <input type="hidden" name="is_project" value="0">
        </form>
    </div>

    @include('layouts.modal', [
        'title' => 'Publicar Proyecto',
        'message' =>
            '¿Estás seguro de que deseas publicar tu proyecto? Una vez subido ya no se pueden hacer cambios. Esta acción no se puede deshacer.',
        'cancelButton' => 'Cancelar',
        'confirmButton' => 'Publicar',
    ])
@endsection
