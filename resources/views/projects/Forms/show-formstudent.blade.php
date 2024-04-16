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


        <div class="flex-icons justify-between">
            <li
                class="flex items-center font-sans hover:text-teal-500 text-xl antialiased font-semibold leading-normal transition-colors duration-300 cursor-pointer">
                <a href="/vistanteproyectos">⭠ Regresar</a>
            </li>
            
            <form method="POST" action="{{ route('project.like', ['user' => $user->id, 'project' => $project->id]) }}">
                @csrf
                <button type="submit" class="relative flex items-center">
                    <span
                        class="w-30 bg-teal-600 text-white cursor-pointer font-semibold px-4 py-2 rounded-lg hover:bg-teal-800 focus:outline-none relative">
                        @if ($project->likes->where('academic_advisor_id', $getAcademicAdvisorId->id)->count() > 0)
                            <i class='bx bxs-dislike'></i>
                        @else
                            <i class='bx bxs-like'></i>
                        @endif
                        @if ($project->likes->where('academic_advisor_id', $getAcademicAdvisorId->id)->count() > 0)
                            Eliminar Like
                        @else
                            Dar Like
                        @endif
                    </span>
                </button>
            </form>
        </div>


        <h2 class="text-3xl font-bold sm:text-4xl text-center mb-6">CÉDULA DE ANTEPROYECTO </h2>

        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-[#00ab84] to-[#00e7b1]  py-2 px-4">
                <h1 class="text-xl font-bold sm:text-2xl text-white text-center">DATOS GENERALES</h1>
            </div>
            <div class="px-8 py-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="mb-4">
                            <label class=" font-semibold">Nombre Completo:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span class="mt-6">{{ $project->fullname_student }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('fullname_student')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class=" font-semibold">Matrícula:</label>
                            <div class="w-full rounded-lg  bg-white">
                                <span>{{ $project->id_student }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('id_student')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="mb-4">
                            <label class=" font-semibold">Grupo:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->group_student }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('group_student')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class=" font-semibold" for="phone">Número Teléfonico:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->phone_student }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('phone_student')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="mb-4">
                            <label class=" font-semibold" for="email">Correo Electrónico:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->email_student }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('email_student')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="font-semibold">Nombre del Proyecto:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->name_project }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('name_project')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="mb-4">
                            <label class=" font-semibold">Empresa:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->company_name }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('company_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class=" font-semibold">Dirección de la Empresa:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->company_address }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('company_address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="mb-4">
                            <label class=" font-semibold">Nombre del Asesor Empresarial:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->BusinessAdvisor->name }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('advisor_business_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class=" font-semibold">Cargo del Asesor:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->BusinessAdvisor->position }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('advisor_business_position')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="mb-4">
                            <label class=" font-semibold">Número Teléfonico del Asesor:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->BusinessAdvisor->phone }}</span>
                            </div>
                            <div class="text-red-400 font-bold text-lg">
                                @error('advisor_business_phone')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class=" font-semibold">Correo Electrónico:</label>
                            <div class="w-full rounded-lg bg-white">
                                <span>{{ $project->BusinessAdvisor->email }}</span>
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
                    @if (!$project->is_project)
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
                        <span>{{ $project->project_area }}</span>
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
                        <span>{{ $project->general_objective }}</span>
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
                        <span>{{ $project->problem_statement }}</span>
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
                        <span>{{ $project->justification }}</span>
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
                        <span>{{ $project->activities }}</span>
                    </div>
                    <div class="text-red-400 font-bold text-lg">
                        @error('activities')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <label class="block text-2xl text-center font-bold mb-8 mt-5 text-teal-800">Estado del Proyecto</label>
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
                                        <img src="{{ asset($like->academicAdvisor->user->photo) }}" alt="Avatar"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <p class="text-white font-bold">{{ $like->academicAdvisor->user->name }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </span>

        </div>
        <div class="tooltip mb-12 mt-4">
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
                                        <img src="{{ asset($score->AcademicAdvisor->user->photo) }}" alt="Avatar"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <p class="text-white font-bold">{{ $score->AcademicAdvisor->user->name }}</p>
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


        <div class=" bg-white shadow-lg p-5 pb-12 mb-5 rounded-lg">
            <label class="block text-2xl text-center font-bold mb-4 text-teal-800">Agregar un nuevo comentario</label>
            <form method="POST"
                action="{{ route('comentario.store', ['user' => $user->id, 'project' => $project->id]) }}">
                @csrf
                <label for="content_message" class="block text-lg font-bold mb-1 text-teal-800">Añade un comentario:</label>
                <div class="mt-1 flex">
                    <img src="{{ asset(auth()->user()->photo) }}" alt="Imagen" class="h-8 w-8 mr-1 rounded-full">
                    <textarea id="content_message" name="content_message"
                        class="block w-full text-lg rounded-md border-0 px-3.5 py-2 text-black shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-700 sm:text-sm sm:leading-6"
                        placeholder="Agrega un comentario"></textarea>
                </div>
                @error('content_message')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
                <div class="flex justify-end">
                    <input type="submit" value="Enviar comentario"
                        class="w-30 bg-teal-500 text-white cursor-pointer font-semibold px-4 py-2 rounded-lg hover:bg-teal-700 focus:outline-none">
                </div>
            </form>
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if ($project->comments->count())
                    @foreach ($project->comments as $comment)
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

            <label class="block text-2xl text-center font-bold mb-8 text-teal-800">Asigna una calificación este
                proyecto</label>

            <div class="rating mr-5 mt-4 ">
                <!-- Formulario de calificación -->
                <form method="POST" action="{{ route('rateProject', $project->id) }}">
                    @csrf
                    <div class="flex items-center">
                        <label class="mr-2" for="score">Calificación:</label>
                        <select name="score" id="score" class="border rounded-md py-1 px-2">
                            <option value="1">⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                        </select>
                        <button type="submit"
                            class="relative bg-teal-500 text-white ml-2 px-4 py-2 rounded hover:bg-teal-600 transition-colors">Calificar</button>
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
