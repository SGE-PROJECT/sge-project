@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'Editar Anteproyecto')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <li
            class="flex items-center  font-sans hover:text-teal-500 font-semibold  transition-colors duration-300 cursor-pointer">
            <a class="text-xl" href={{ route('home') }}>⭠ Regresar</a>
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
                        placeholder="Ingresa tu nombre completo" type="text" value="{{ $student->user->name }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('fullname_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>


                <div>
                    <label class="text-sm font-semibold">Matricula:</label>
                    <input name="id_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu matricula" type="text" value="{{ $student->registration_number }}" />
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
                        placeholder="Ingresa tu grupo" type="text" value="{{ $student->group->name }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('group_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Número Teléfonico:</label>
                    <input name="phone_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu número teléfonico" type="tel"
                        value="{{ $student->user->phone_number }}" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('phone_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="text-sm font-semibold" for="email">Correo Electrónico:</label>
                    <input name="email_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu correo electrónico" type="email" value="{{ $student->user->email }}" />
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
            </div>
        </form>

        <form action="{{ route('projects.destroy', $proyecto->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button id="btnEliminarProyecto"
                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Eliminar Proyecto</button>
        </form>

    </div>


    <!-- Modal de confirmación de eliminación -->
    <div id="modalEliminar" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity hidden" aria-hidden="true">
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
@endsection

@section('scripts')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtener el botón de eliminar proyecto y el modal de confirmación
    const btnEliminarProyecto = document.getElementById('btnEliminarProyecto');
    const modalEliminar = document.getElementById('modalEliminar');

    // Obtener los botones de cancelar y confirmar eliminar
    const btnCancelar = document.getElementById('btnCancelar');
    const btnConfirmarEliminar = document.getElementById('btnConfirmarEliminar');

    // Agregar un listener para abrir el modal al hacer clic en el botón de eliminar proyecto
    btnEliminarProyecto.addEventListener('click', function() {
        modalEliminar.classList.remove('hidden');
    });

    // Agregar un listener para cerrar el modal al hacer clic en el botón de cancelar
    btnCancelar.addEventListener('click', function() {
        modalEliminar.classList.add('hidden');
    });

    // Agregar un listener para eliminar el proyecto al hacer clic en el botón de confirmar eliminar
    btnConfirmarEliminar.addEventListener('click', function() {
        // Aquí puedes agregar la lógica para enviar una solicitud al servidor para eliminar el proyecto
        // Por ejemplo, podrías hacer una petición AJAX
        // Una vez que recibas la confirmación del servidor de que el proyecto ha sido eliminado, puedes redirigir al usuario o mostrar un mensaje de éxito
        // Por ahora, simplemente ocultaremos el modal
        modalEliminar.classList.add('hidden');
        alert('Proyecto eliminado exitosamente.'); // Esto es solo para fines de demostración
    });
});
    </script>
@endsection
