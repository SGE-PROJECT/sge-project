@vite('resources/css/app.css')
@extends('layouts.panelUsers')

@section('titulo', 'Formulario Anteproyecto')

@section('contenido')
    <div class="rounded-lg bg-white  p-8 shadow-lg lg:col-span-3 lg:p-12">
        <li
            class="flex items-center font-sans hover:text-teal-500 text-xl antialiased font-semibold leading-normal transition-colors duration-300 cursor-pointer">
            <a href={{ route('home') }}>⭠ Regresar</a>
        </li>
        <h2 class="text-3xl font-bold sm:text-4xl text-center mb-6">CÉDULA DE ANTEPROYECTO </h2>
        <form id="projectForm" action="{{ route('envproyecto') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Nombre completo:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="fullname_student"
                                class="w-full rounded-lg border-2 bg-gray-100 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa tu nombre completo" type="text" value="{{ Auth::user()->name }}"
                                readonly />
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
                                value="{{ Auth::user()->student->registration_number }}"readonly />
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
                                value="{{ Auth::user()->student->group->name }}" readonly />
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
                                placeholder="Ingresa tu nombre completo" type="text" value="{{ Auth::user()->email }}"
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
                                placeholder="Ingresa tu numero teléfonico" type="text"
                                value="{{ old('phone_student') }}" />
                            <div class="text-red-400 font-bold text-lg">
                                @error('phone_student')
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
                        <h2 class="text-xl font-semibold text-white mb-0">Fecha de inicio del Proyecto:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="startproject_date" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa la fecha de inicio del proyecto" type="date"
                                value="{{ old('startproject_date') }}" />
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
                    <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                        <h2 class="text-xl font-semibold text-white mb-0">Fecha de término del Proyecto:</h2>
                    </div>
                    <div class="relative">
                        <div class="mt-6 pb-6 p-3">
                            <input name="endproject_date" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                                placeholder="Ingresa la fecha de finalización del proyecto" type="date"
                                value="{{ old('endproject_date') }}" />
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
                                value="{{ old('name_project') }}" />
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
                                value="{{ old('company_name') }}" />
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
                                value="{{ old('company_address') }}" />
                            <div class="text-red-400 font-bold text-lg">
                                @error('company_address')
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
            <h2 class="text-xl font-semibold text-white mb-0">Asesor Empresarial:</h2>
        </div>
        <div class="relative">
            <div class="mt-6 pb-6 p-3">
                    <select name="project_status_area" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm" onchange="showHideFields(this.value)">
                        <option value="">Selecciona un asesor</option>
                        @foreach($businessAdvisors as $advisor)
                        <option value="{{ $advisor->id }}" data-name="{{ $advisor->name }}" data-position="{{ $advisor->position }}" data-phone="{{ $advisor->phone }}" data-email="{{ $advisor->email }}">{{ $advisor->name }}</option>
                        @endforeach
                        <option value="Otro">Otro</option>
                    </select>
                <div class="text-red-400 font-bold text-lg">
                    @error('project_area')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<div id="otrosCampos" style="display: none;">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div class="relative group overflow-hidden rounded-lg bg-white border border-gray-200 mt-0">
            <div class="bg-gradient-to-r from-[#00ab84] to-[#2e9980] py-1 px-4">
                <h2 class="text-xl font-semibold text-white mb-0">Nombre del Asesor Empresarial:</h2>
            </div>
            <div class="relative">
                <div class="mt-6 pb-6 p-3">
                    <input id="nombreAsesor" name="name" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el nombre del asesor" type="text" value="{{ old('name') }}" readonly />
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
                    <input id="cargoAsesor" name="position" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el cargo del asesor" type="text"
                        value="{{ old('position') }}" readonly/>
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
                    <input id="telefonoAsesor" name="phone" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el número teléfonico del asesor" type="tel"
                        value="{{ old('phone') }}" readonly />
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
                    <input id="emailAsesor" name="email" class="w-full rounded-lg border-2 border-gray-300 p-3 text-sm"
                        placeholder="Ingresa el correo electrónico del asesor" type="email"
                        value="{{ old('email') }}" readonly/>
                    <div class="text-red-400 font-bold text-lg">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
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
                                placeholder="Ingresa tu área actual" type="text" value="{{ old('project_area') }}" />
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
                                placeholder="Redacta aqui..." rows="8">{{ old('general_objective') ?: '' }}</textarea>
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
                                placeholder="Redacta aqui..." rows="8">{{ old('problem_statement') ? old('problem_statement') : '' }}</textarea>
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
                                placeholder="Redacta aqui..." rows="8">{{ old('justification') }}</textarea>
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
                                placeholder="Redacta aqui..." rows="8">{{ old('activities') }}</textarea>
                            <div class="absolute bottom-[-1px] text-red-400 font-bold text-lg">
                                @error('activities')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-center text-center space-x-6">
                <button type="submit" action value="guardar"
                    class="font-bold bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">Guardar</button>
            </div>
            <input type="hidden" name="is_project" value="0">
        </form>
    </div>
    <script>
    function showHideFields(value) {
        if (value === 'Otro') {
            document.getElementById('otrosCampos').style.display = 'block';
            document.getElementById('nombreAsesor').value = ''; // Vaciar el campo
            document.getElementById('cargoAsesor').value = ''; // Vaciar el campo
            document.getElementById('telefonoAsesor').value = ''; // Vaciar el campo
            document.getElementById('emailAsesor').value = ''; // Vaciar el campo
            document.getElementById('nombreAsesor').removeAttribute('readonly');
            document.getElementById('cargoAsesor').removeAttribute('readonly');
            document.getElementById('telefonoAsesor').removeAttribute('readonly');
            document.getElementById('emailAsesor').removeAttribute('readonly');
        } else {
            document.getElementById('otrosCampos').style.display = 'block';
            document.getElementById('nombreAsesor').setAttribute('readonly', 'true');
            document.getElementById('cargoAsesor').setAttribute('readonly', 'true');
            document.getElementById('telefonoAsesor').setAttribute('readonly', 'true');
            document.getElementById('emailAsesor').setAttribute('readonly', 'true');

            // Obtener la opción seleccionada
            var selectedOption = document.querySelector('select[name="project_status_area"] option[value="' + value + '"]');

            // Llenar los campos con la información del asesor seleccionado
            document.getElementById('nombreAsesor').value = selectedOption.dataset.name;
            document.getElementById('cargoAsesor').value = selectedOption.dataset.position;
            document.getElementById('telefonoAsesor').value = selectedOption.dataset.phone;
            document.getElementById('emailAsesor').value = selectedOption.dataset.email;
        }
    }
</script>



    @include('layouts.modal', [
        'title' => 'Publicar Proyecto',
        'message' =>
            '¿Estás seguro de que deseas publicar tu proyecto? Una vez subido ya no se pueden hacer cambios. Esta acción no se puede deshacer.',
        'cancelButton' => 'Cancelar',
        'confirmButton' => 'Publicar',
    ])
@endsection
