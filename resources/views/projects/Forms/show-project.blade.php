@extends('layouts.panelUsers')

@section('titulo', 'Ver Proyecto')

@section('contenido')
<div class="p-8 mt-8 mr-8 ml-8 mb-8 bg-white rounded-lg shadow-lg">
    <div class="px-8 py-6 border-b border-gray-300 mb-4">
        <li class="flex items-center font-sans hover:text-teal-500 font-semibold transition-colors duration-300 cursor-pointer">
            <a class="text-xl" href={{ route('home') }}>⭠ Regresar</a>
        </li>
        <h2 class="text-3xl font-bold sm:text-4xl text-center mt-4">CÉDULA DE PROYECTO
        </h2>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1]  py-2 px-4">
            <h1 class="text-xl font-bold sm:text-2xl text-white text-center">DATOS GENERALES</h1>
        </div>
    <div class="px-8 py-6">
        <form action="{{ route('projects.update', $proyecto->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('put')

            <input type="hidden" name="action" value="editar">

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class=" font-semibold">Nombre Completo:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $student->user->name }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('fullname_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class=" font-semibold">Matrícula:</label>
                    <div class="w-full rounded-lg  bg-white">
                        <span>{{ $student->registration_number }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('id_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class=" font-semibold">Grupo:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $student->group->name }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('group_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class=" font-semibold" for="phone">Número Teléfonico:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $student->user->phone_number }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('phone_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class=" font-semibold" for="email">Correo Electrónico:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $student->user->email }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('email_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="font-semibold">Nombre del Proyecto:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->name_project }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('name_project')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class=" font-semibold">Empresa:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->company_name }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('company_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class=" font-semibold">Dirección de la Empresa:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->company_address }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('company_address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class=" font-semibold">Nombre del Asesor Empresarial:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->BusinessAdvisor->name }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class=" font-semibold">Cargo del Asesor:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->BusinessAdvisor->position }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_position')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class=" font-semibold">Número Teléfonico del Asesor:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->BusinessAdvisor->phone }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_phone')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class=" font-semibold">Correo Electrónico:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->BusinessAdvisor->email }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_business_email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                    <label class=" font-semibold">Área donde se realizara el proyecto:</label>
                    <div class="w-full rounded-lg bg-white">
                        <span>{{ $proyecto->project_area }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('project_area')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1]  py-2 px-4">
            <h1 class="text-xl font-bold sm:text-2xl text-white text-center">DATOS DEL
                @if (!$proyecto->is_project)
                                        ANTEPROYECTO
                                    @else
                                        PROYECTO
                                    @endif
            </h1>
        </div>
        <div class="px-8 py-6">
            <div class="mb-4">
                <label class=" font-semibold" for="message">Objetivo General (Utiliza un verbo en infinitivo para
                    indicar claramente qué acción deseas lograr. Evita términos confusos y sé específico, mantén el objetivo
                    breve y enfocado en la acción necesaria del proyecto) :</label>

                <div class="w-full rounded-lg bg-white">
                    <span>{{ $proyecto->general_objective }}</span>
                </div>
                <div class="text-red-400 font-bold text-lg">
                    @error('general_objective')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class=" font-semibold" for="message">Planteamiento del problema: Exponer los aspectos,
                    elementos y relaciones del problema:</label>

                <div class="w-full rounded-lg bg-white">
                    <span>{{ $proyecto->problem_statement }}</span>
                </div>
                <div class="text-red-400 font-bold text-lg">
                    @error('problem_statement')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class=" font-semibold text-justify" for="message">Justificacion: Debe manifestarse de
                    manera
                    clara y
                    precisa del por qué y para qué se va a llevar a cabo el estudio. Causas y propositos que motivan la
                    investigación:</label>

                <div class="w-full rounded-lg bg-white">
                    <span>{{ $proyecto->justification }}</span>
                </div>
                <div class="text-red-400 font-bold text-lg">
                    @error('justification')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class=" font-semibold" for="message">Actividades para realizar: Listar las actividades a
                    llevar a cabo en orden:</label>

                <div class="w-full rounded-lg bg-white">
                    <span>{{ $proyecto->activities }}</span>
                </div>
                <div class="text-red-400 font-bold text-lg">
                    @error('activities')
                        {{ $message }}
                    @enderror
                </div>
            </div>
    </div>
</div>

            <div class="mt-8 flex justify-end">
                <button class="font-bold bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">Editar</button>
            </div>
        </form>
    </div>
</div>

@include('layouts.modal', [
    'title' => 'Publicar Proyecto',
    'message' => '¿Estás seguro de que deseas publicar tu proyecto? Una vez subido ya no se pueden hacer cambios. Esta acción no se puede deshacer.',
    'cancelButton' => 'Cancelar',
    'confirmButton' => 'Publicar',
])
@endsection
