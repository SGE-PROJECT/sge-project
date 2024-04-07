@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'Editar Anteproyecto')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <li
            class="flex items-center  font-sans hover:text-teal-500 font-semibold  transition-colors duration-300 cursor-pointer">
            <a class="text-xl" href="/projectdashboard">⭠ Regresar</a>
        </li>
        <h2 class="text-3xl font-bold sm:text-4xl text-center mb-6">CÉDULA DE ANTEPROYECTO </h2>
        <form action="{{ route('projects.update', $proyecto->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('put')

            <input type="hidden" name="action" value="editar">

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Nombre Completo:</label>
                    <input name="fullname_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu nombre completo" type="text" value="{{ $proyecto->fullname_student }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('fullname_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>


                <div>
                    <label class="text-sm font-semibold">Matricula:</label>
                    <input name="id_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu matricula" type="text" value="{{ $proyecto->id_student }}" />
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
                        placeholder="Ingresa tu grupo" type="text" value="{{ $proyecto->group_student }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('group_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Número Teléfonico:</label>
                    <input name="phone_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu número teléfonico" type="tel" value="{{ $proyecto->phone_student }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('phone_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="text-sm font-semibold" for="email">Correo Electrónico:</label>
                    <input name="email_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu correo electrónico" type="email" value="{{ $proyecto->email_student }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('email_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="text-sm font-semibold">Nombre del Proyecto:</label>
                    <input name="name_project" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre del proyecto" type="text"
                        value="{{ $proyecto->name_project }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('name_project')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold">Estado del Proyecto:</label>
                <select name="status" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm">
                    <option value="Registrado" {{ $proyecto->status === 'Registrado' ? 'selected' : '' }}>Registrado
                    </option>
                    <option value="En Revisión" {{ $proyecto->status === 'En Revisión' ? 'selected' : '' }}>En Revisión
                    </option>
                    <option value="Rechazado" {{ $proyecto->status === 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                    <option value="Aprobado" {{ $proyecto->status === 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                </select>
                <div class="text-red-400 font-bold text-lg">
                    @error('status')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Empresa:</label>
                    <input name="company_name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre de la empresa" type="text"
                        value="{{ $proyecto->company_name }}" />
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
                        value="{{ $proyecto->company_address }}" />
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
                    <input name="advisor_business_name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre del asesor" type="text"
                        value="{{ $proyecto->BusinessAdvisor->name }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Cargo del Asesor:</label>
                    <input name="advisor_business_position" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el cargo del asesor" type="text"
                        value="{{ $proyecto->BusinessAdvisor->position }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_position')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold">Número Teléfonico del Asesor:</label>
                    <input name="advisor_business_phone" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el número teléfonico del asesor" type="tel"
                        value="{{ $proyecto->BusinessAdvisor->phone }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_phone')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold">Correo Electrónico:</label>
                    <input name="advisor_business_email" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el correo electrónico del asesor" type="email"
                        value="{{ $proyecto->BusinessAdvisor->email }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="text-sm font-semibold">Área donde se realizara el proyecto:</label>
                    <input name="project_area" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu área actual" type="text" value="{{ $proyecto->project_area }}" />
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
                        placeholder="Redacta aqui..." rows="8">{{ $proyecto->general_objective }}</textarea>

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
                        placeholder="Redacta aqui..." rows="8">{{ $proyecto->problem_statement }}</textarea>

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
                        placeholder="Redacta aqui..." rows="8">{{ $proyecto->justification }}</textarea>

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
                        placeholder="Redacta aqui..." rows="8">{{ $proyecto->activities }}</textarea>

                    <div class="absolute bottom-[-6px] text-red-400 font-bold text-lg">
                        @error('activities')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-center text-center space-x-6">
                <button
                    class=" font-bold bg-teal-500 text-white  px-6 py-2 rounded hover:bg-teal-700 transition-colors">Editar</button>

                <button type="submit" name="action" value="publicar" id="publishButton"
                    class="font-bold bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">Publicar</button>

            </div>
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
