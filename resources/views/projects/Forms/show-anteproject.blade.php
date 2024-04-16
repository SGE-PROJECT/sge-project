@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'Ver mi Anteproyecto')

@section('contenido')
    <div class="p-8 mt-8 mr-8 ml-8 mb-8 bg-white rounded-lg shadow-lg">
        @if (session('success'))
            <div class="bg-green-100 border mb-2 border-green-400 text-green-700 px-4 py-3 rounded relative alert-dismissible"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="">
            <div class="flex justify-between items-center">
                <li
                    class="flex items-center font-sans hover:text-teal-500 font-semibold transition-colors duration-300 cursor-pointer">
                    <a class="text-2xl" href={{ route('home') }}>⭠ Regresar</a>
                </li>
                <div class="flex justify-end flex-wrap">
                    <div class="">
                        <div class="tooltip">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Personas que han dado like
                            </button>
                            <span class="tooltip-text">
                                @if ($proyecto->likes->isEmpty())
                                    <p>Nadie ha dado like</p>
                                @else
                                    @foreach ($proyecto->likes as $like)
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
                                @if ($proyecto->scores->isEmpty())
                                    <p>Nadie ha calificado este proyecto</p>
                                @else
                                    @foreach ($proyecto->scores as $score)
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
            <div class="px-8 py-6 border-b border-gray-300 mb-4">
                <h2 class="text-3xl font-bold sm:text-4xl text-center mt-8">CÉDULA DE ANTEPROYECTO
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
                                    <span>{{ $proyecto->phone_student }}</span>
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
                    <div class="mb-4">
                        <label class=" font-semibold" for="message">Objetivo General (Utiliza un verbo en infinitivo para
                            indicar claramente qué acción deseas lograr. Evita términos confusos y sé específico, mantén el
                            objetivo
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
                            precisa del por qué y para qué se va a llevar a cabo el estudio. Causas y propositos que motivan
                            la
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

            <div class="mt-8 flex justify-center text-center space-x-2 h-10">
                <form id="formEliminar" action="{{ route('projects.destroy', $proyecto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="btnEliminarProyecto" type="button" class="ProjectDeleteButton">
                        <i class='bx bx-trash'></i> Eliminar
                    </button>
                                    </form>
                <a href="editanteproyecto"
                    class="font-bold bg-blue-500 hover:bg-blue-600 text-white ml-16 px-6 py-2 rounded transition-colors"><i class='bx bx-edit-alt'></i>Editar</a>
                @if ($proyecto->is_public != 1 && $proyecto->status == "En revisión")
                    <form action="{{ route('projects.updateIsPublic', $proyecto->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="font-bold bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">
                            <i class='bx bx-archive-out'></i>  Publicar
                        </button>
                    </form>
                @endif
            </div>

            </form>
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if ($proyecto->comments->count())
                    @foreach ($proyecto->comments as $comment)
                        <div class="p-4 border-b border-gray-300 relative">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center">
                                        <img src="{{ asset($comment->academic_advisor->user->photo) }}" alt="Avatar"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <p class="text-gray-800 font-bold">{{ $comment->academic_advisor->user->name }} <i
                                                class='bx bxs-badge-check text-[#03A696] text-2xl'></i>
                                        </p>
                                    </div>

                                    <p class="mt-1">{{ $comment->content_message }}</p>
                                    <p class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>

                                @if (Auth::check() && Auth::user()->id === $comment->academic_advisor->user->id)
                                    <form method="POST"
                                        action="{{ route('comentario.destroy', ['comment' => $comment->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Resolver"
                                            class="w-30 bg-teal-500 text-white cursor-pointer font-semibold px-4 py-2 rounded-lg hover:bg-teal-700 focus:outline-none">
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 font-semibold text-xl text-center font-poppins">No hay comentarios aún.</p>

                @endif
            </div>
        </div>


        <!-- Modal de confirmación de eliminación -->
        <div id="modalEliminar"
            class="ProjectDeleteModal fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity hidden">
            <div class="bg-white rounded p-8 max-w-md mx-auto z-50">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">¿Seguro que quieres eliminar?</h2>
                </div>
                <div class="flex justify-end">
                    <button id="btnCancelar"
                        class="mr-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Cancelar</button>
                    <button id="btnConfirmarEliminar"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                </div>
            </div>
        </div>

        <form id="formEliminar" action="{{ route('projects.destroy', $proyecto->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button id="btnEliminarProyecto" type="button" style="display: none;" class="ProjectDeleteButton">Eliminar</button>
        </form>




        <!-- Formulario de invitación -->
        <div id="modalInvitarEstudiante" class="modalInvitar">
            <form id="formInvitarEstudiante" action="{{ route('invitar.estudiante') }}" method="POST"
                class="modal-content-invite">
                @csrf
                <div class="container">
                    <h2>Invitar Estudiante</h2>
                    <label for="nombre_estudiante">Nombre del Estudiante:</label>
                    <input type="text" id="nombre_estudiante" name="nombre_estudiante" required>
                    <label for="email_estudiante">Correo Electrónico:</label>
                    <input type="email" id="email_estudiante" name="email_estudiante" required>
                    <input type="hidden" id="project_id" name="project_id" value="{{ $proyecto->id }}">
                    <button type="submit">Enviar Invitación</button>
                </div>
            </form>
        </div>


    @endsection

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const btnEliminarProyecto = document.getElementById('btnEliminarProyecto');
                const modalEliminar = document.getElementById('modalEliminar');
                const btnCancelar = document.getElementById('btnCancelar');
                const btnConfirmarEliminar = document.getElementById('btnConfirmarEliminar');

                btnEliminarProyecto.addEventListener('click', function() {
                    modalEliminar.classList.remove('hidden');
                });

                btnCancelar.addEventListener('click', function() {
                    modalEliminar.classList.add('hidden');
                });

                btnConfirmarEliminar.addEventListener('click', function() {
                    const formEliminar = document.getElementById('formEliminar');
                    formEliminar.submit();
                    modalEliminar.classList.add('hidden'); // Oculta el modal después de enviar el formulario
                });
            });

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
