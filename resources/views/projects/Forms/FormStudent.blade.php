@vite('resources/css/app.css')
@extends('layouts.panel')

@section('titulo', 'FormProject')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <h2 class="text-3xl font-bold sm:text-4xl text-center mb-6">CÉDULA DE ANTEPROYECTO </h2>
        <form action="{{ url('projectform') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Nombre Completo:</label>
                    <input name="fullname_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu nombre completo" type="text" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('fullname_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>


                <div>
                    <label class="text-sm font-semibold" for="phone">Matricula:</label>
                    <input name="id_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu matricula" type="text" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('id_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div>
                    <label class="text-sm font-semibold" for="email">Grupo:</label>
                    <input name="group_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu grupo" type="text" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('group_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Número Teléfonico:</label>
                    <input name="phone_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu número teléfonico" type="tel" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('phone_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="text-sm font-semibold" for="phone">Correo Electrónico:</label>
                    <input name="email_student" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu correo electrónico" type="email" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('email_student')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Fecha de inicio del Proyecto:</label>
                    <input name="startproject_date" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la fecha de inicio del proyecto" type="date" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('startproject_date')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Fecha de término del Proyecto:</label>
                    <input name="endproject_date" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la fecha de finalización del proyecto" type="date" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('endproject_date')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Empresa:</label>
                    <input name="company_name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre de la empresa" type="text" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('company_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Dirreción de la Empresa:</label>
                    <input name="company_address" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa la dirección de la empresa" type="text" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('company_address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Nombre del Asesor Empresarial:</label>
                    <input name="advisor_name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre del asesor" type="text" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Cargo del Asesor:</label>
                    <input name="advisor_position" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el cargo del asesor" type="text" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_position')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-semibold" for="email">Número Teléfonico del Asesor:</label>
                    <input name="advisor_phone" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el número teléfonico del asesor" type="tel" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_phone')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-semibold" for="phone">Correo Electrónico:</label>
                    <input name="advisor_email" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el correo electrónico del asesor" type="email" />
                    <div class="text-red-400 font-bold text-lg">
                        @error('advisor_email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="text-sm font-semibold" for="email">Área donde se realizara el proyecto:</label>
                    <input name="project_area" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa tu área actual" type="text" />
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

                <textarea name="general_objective" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                    placeholder="Redacta aqui..." rows="8"></textarea>
                <div class="text-red-400 font-bold text-lg">
                    @error('general_objective')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Planteamiento del problema: Exponer los aspectos,
                    elementos y relaciones del problema:</label>

                <textarea name="problem_statement" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                    placeholder="Redacta aqui..." rows="8"></textarea>
                <div class="text-red-400 font-bold text-lg">
                    @error('problem_statement')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold text-justify" for="message">Justificacion: Debe manifestarse de
                    manera
                    clara y
                    precisa del por qué y para qué se va a llevar a cabo el estudio. Causas y propositos que motivan la
                    investigación:</label>

                <textarea name="justification" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                    placeholder="Redacta aqui..." rows="8"></textarea>
                <div class="text-red-400 font-bold text-lg">
                    @error('justification')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <label class="text-sm font-semibold" for="message">Actividades para realizar: Listar las actividades a
                    llevar a cabo en orden:</label>
                <textarea name="activities" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                    placeholder="Redacta aqui..." rows="8"></textarea>
                <div class="text-red-400 font-bold text-lg">
                    @error('activities')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-center text-center space-x-6">
                <button type="submit"
                    class=" font-bold bg-teal-500 text-white  px-6 py-2 rounded hover:bg-teal-700 transition-colors">Editar</button>
                <button type="submit"
                    class=" font-bold bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">Guardar</button>
                <button id="openModalButton"
                    class="overflow-hidden w-32 p-2  bg-teal-500 text-white border-none rounded text-medium font-medium cursor-pointer relative z-10 group">
                    Publicar
                    <span
                        class="absolute w-36 h-32 -top-8 -left-2 bg-white rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-500 duration-1000 origin-left"></span>
                    <span
                        class="absolute w-36 h-32 -top-8 -left-2 bg-teal-500 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"></span>
                    <span
                        class="absolute w-36 h-32 -top-8 -left-2 bg-teal-950 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"></span>
                    <span
                        class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2 left-9 z-10">Seguro?</span>
                </button>
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
