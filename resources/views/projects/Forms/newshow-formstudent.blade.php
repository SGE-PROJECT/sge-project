@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'Mostrar Anteproyecto')

@section('contenido')
    <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 ">
        @if (session('success'))
            <div class="bg-green-100 border mb-2 border-green-400 text-green-700 px-4 py-3 rounded relative alert-dismissible"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border mb-2 border-red-400 text-red-700 px-4 py-3 rounded relative alert-dismissible"
                role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if (session('change'))
            <div class="bg-green-100 border mb-2 border-green-400 text-green-700 px-4 py-3 rounded relative alert-dismissible"
                role="alert">
                <span class="block sm:inline">{{ session('change') }}</span>
            </div>
        @endif
        @if (session('err'))
            <div class="bg-red-100 border mb-2 border-red-400 text-red-700 px-4 py-3 rounded relative alert-dismissible"
                role="alert">
                <span class="block sm:inline">{{ session('err') }}</span>
            </div>
        @endif


        <div class="">
            <div class="flex justify-between items-center">
                <li
                    class="flex items-center font-sans hover:text-teal-500 font-semibold transition-colors duration-300 cursor-pointer">
                    <a class="text-2xl" href="/asesor">⭠ Regresar</a>
                </li>
                <div class="flex justify-end flex-wrap">
                    <div class="">
                        <div class="tooltip">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Personas que han dado like
                            </button>
                            <span class="tooltip-text">
                                @if ($project->likes->isEmpty())
                                    <p>Nadie ha dado like</p>
                                @else
                                    @foreach ($project->likes as $like)
                                        <div class="p-4 border-b border-gray-300 relative">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <div class="flex items-center">
                                                        <img src="{{ asset($like->academicAdvisor->user->photo) }}"
                                                            alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                                                        <p class="text-white font-bold">
                                                            {{ $like->academicAdvisor->user->name }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </span>

                        </div>
                        <div class="tooltip">
                            <button class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Personas que han calificado
                            </button>
                            <span class="tooltip-text2">
                                @if ($project->scores->isEmpty())
                                    <p>Nadie ha calificado este proyecto</p>
                                @else
                                    @foreach ($project->scores as $score)
                                        <div class="p-4 border-b border-gray-300 relative">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <div class="flex items-center">
                                                        <img src="{{ asset($score->AcademicAdvisor->user->photo) }}"
                                                            alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                                                        <p class="text-white font-bold">
                                                            {{ $score->AcademicAdvisor->user->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-white font-bold">{{ $score->score }} estrellas</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <h2 class="text-3xl font-bold sm:text-4xl text-center mt-10 mb-6">CÉDULA DE ANTEPROYECTO </h2>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2  border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->fullname_student }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Matricula:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2  border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text" value="{{ $project->id_student }}"
                                readonly />
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Grupo:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value=" {{ $project->group_student }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Número Teléfonico:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->phone_student }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Correo Electrónico:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2  border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->email_student }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Nombre del Proyecto:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value=" {{ $project->name_project }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Empresa:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2  border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->company_name }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Dirreción de la Empresa:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->company_address }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Nombre del Asesor Empresarial:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2  border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->businessAdvisor->name }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Cargo del Asesor:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->businessAdvisor->position }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Número Teléfonico del Asesor:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->businessAdvisor->phone }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Correo Electrónico del asesor academico:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2  border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->businessAdvisor->email }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Área donde se realizara el proyecto:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input class="w-full rounded-lg border-2  border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text"
                                value="{{ $project->project_area }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Objetivo General (Utiliza un verbo en
                            infinitivo
                            para
                            indicar claramente qué acción deseas lograr. Evita términos confusos y sé específico, mantén el objetivo
                            breve y enfocado en la acción necesaria del proyecto) :</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="general_objective" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8" readonly>{{ $project->general_objective }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Planteamiento del problema: Exponer los
                            aspectos,
                            elementos y relaciones del problema:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="general_objective" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8" readonly>{{ $project->problem_statement }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Justificacion: Debe
                            manifestarse de
                            manera
                            clara y
                            precisa del por qué y para qué se va a llevar a cabo el estudio. Causas y propositos que motivan la
                            investigación:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="general_objective" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8" readonly>{{ $project->justification }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Actividades para realizar: Listar las
                            actividades
                            a
                            llevar a cabo en orden:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <textarea name="general_objective" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Redacta aqui..." rows="8" readonly>{{ $project->activities }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <label class="block text-2xl text-center font-bold mb-4 text-teal-800">Estado del Proyecto</label>
            <div class="rating mr-5 mt-4 ">
                <form method="POST" action="{{ route('project.updateStatus', ['project' => $project->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="flex items-center">
                        <select name="status" class="border rounded-md py-1 px-2">
                            <option value="Registrado" {{ $project->status === 'Registrado' ? 'selected' : '' }}>
                                Registrado</option>
                            <option value="En revisión" {{ $project->status === 'En revisión' ? 'selected' : '' }}>En
                                revisión</option>
                            <option value="Rechazado" {{ $project->status === 'Rechazado' ? 'selected' : '' }}>Rechazado
                            </option>
                        </select>
                        <button type="submit"
                            class="relative bg-teal-500 text-white ml-2 px-4 py-2 rounded hover:bg-teal-600 transition-colors">Guardar
                            Estado</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var alerts = document.querySelectorAll('.alert-dismissible');

                alerts.forEach(function(alert) {
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 2500);
                });
            });
        </script>


    @endsection
