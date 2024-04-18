@extends('layouts.panel')

@section('titulo')
    Editar Usuario
@endsection

@section('contenido')
<div class="max-w-lg mx-auto bg-white mt-8 rounded p-6">
    <h1 class="text-2xl font-bold mb-5">Editar Usuario</h1>
        @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Hay problemas con los datos ingresados.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.cruduser.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Nombre -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required />
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required />
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nueva Contraseña -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Nueva Contraseña
                (opcional):</label>
            <input type="password" name="password" id="password" value="{{$user->password}}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" />
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('phone_number')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- CURP -->
        {{-- <div class="mb-4">
            <label for="curp" class="block text-gray-700 text-sm font-bold mb-2">CURP:</label>
            <input type="text" name="curp" id="curp" value="{{ $user->curp }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('curp')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div> --}}

        <!-- Rol -->
        <div class="mb-4">
            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
            <select name="role" id="role"
                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                onchange="roleChanged()">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $userRole == $role->name ? 'selected' : '' }}>
                        {{ $role->name }}</option>
                @endforeach
            </select>
            @error('role')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div class="mb-4">
            <label for="sex" class="block text-gray-700 text-sm font-bold mb-2">Sexo:</label>
            <select name="sex" id="sex"
                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="M" {{ $user->sex == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ $user->sex == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
            @error('sex')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div> --}}


<!-- Campo de entrada Division según el rol del usuario -->
@if ($userRole === 'Asistente de Dirección')
    <!-- Si el rol es "Asistente de Dirección", muestra el campo de División -->
    <div class="mb-4" id="divisionField">
        <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
        <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione una División</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $user->secretary && $user->secretary->division_id == $division->id ? 'selected' : '' }}>
                    {{ $division->name }}
                </option>
            @endforeach
        </select>
        @error('division_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
@elseif ($userRole === 'Asesor Académico')
    <!-- Si el rol es "Asesor Académico", muestra el campo de División -->
    <div class="mb-4" id="divisionField">
        <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
        <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione una División</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $user->academicAdvisor && $user->academicAdvisor->division_id == $division->id ? 'selected' : '' }}>
                    {{ $division->name }}
                </option>
            @endforeach
        </select>
        @error('division_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
@elseif ($userRole === 'Presidente Académico')
    <!-- Si el rol es "Presidente Académico", muestra el campo de División -->
    <div class="mb-4" id="divisionField">
        <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
        <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione una División</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $user->academicDirector && $user->academicDirector->division_id == $division->id ? 'selected' : '' }}>
                    {{ $division->name }}
                </option>
            @endforeach
        </select>
        @error('division_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
@elseif ($userRole === 'Administrador de División')
    <!-- Si el rol es "Administrador de División", muestra el campo de División -->
    <div class="mb-4" id="divisionField">
        <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
        <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione una División</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $user->managmentAdmin && $user->managmentAdmin->division_id == $division->id ? 'selected' : '' }}>
                    {{ $division->name }}
                </option>
            @endforeach
        </select>
        @error('division_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
@else
    <!-- Si el rol es otro, muestra el campo de División -->
    <div class="mb-4" id="divisionField">
        <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
        <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione una División</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $user->student && $user->student->group && $user->student->group->program && $user->student->group->program->division_id == $division->id ? 'selected' : '' }}>
                    {{ $division->name }}
                </option>
            @endforeach
        </select>
        @error('division_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
@endif




        <!-- Campos específicos para Estudiante -->
        <div id="studentFields" class="mb-4 hidden">
            <!-- Sexo -->


            <!-- Fecha de Nacimiento -->
            {{-- <div class="mb-4">
                <label for="birthdate" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento:</label>
                <input type="date" name="birthdate" id="birthdate"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $user->birthdate }}" />
                @error('birthdate')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- NSS -->
            <div class="mb-4">
                <label for="nss" class="block text-gray-700 text-sm font-bold mb-2">Número de Seguridad Social
                    (NSS):</label>
                <input type="text" name="nss" id="nss"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $user->nss}}" />
                @error('nss')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

                <!-- Reingreso -->
                <label for="isReEntry" class="block text-gray-700 text-sm font-bold mb-2">Es Reingreso?</label>
                <select name="isReEntry" id="isReEntry"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Si" {{ $user->isReEntry == 'Si' ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ $user->isReEntry == 'No' ? 'selected' : '' }}>No</option>
                </select>
                @error('isReEntry')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <label for="group_id" class="block text-gray-700 text-sm font-bold mb-2">Grupo:</label>
            <select name="group_id" id="group_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Seleccione un Grupo</option>
                @foreach (\App\Models\Group::all() as $group)
                    <option value="{{ $user->student->group->id }}" {{  $user->student->group->id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
            @error('group_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

        <label for="academic_advisor_id" class="block text-gray-700 text-sm font-bold mb-2">Asesor Académico:</label>
        <select name="academic_advisor_id" id="academic_advisor_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @if ($user->student && $user->student->academicAdvisor)
                <option value="{{ $user->student->academicAdvisor->id }}" selected>
                    {{ $user->student->academicAdvisor->user->name }}
                </option>
                @foreach ($academicAdvisors as $advisor)
                    @if ($user->student->academicAdvisor->id != $advisor->id)
                        <option value="{{ $advisor->id }}">{{ $advisor->user->name }}</option>
                    @endif
                @endforeach
            @else
                <option value="">Seleccione un Asesor Académico</option>
                @foreach ($academicAdvisors as $advisor)
                    <option value="{{ $advisor->id }}">{{ $advisor->user->name }}</option>
                @endforeach
            @endif
        </select>

            <div class="mb-4">
                <label for="registration_number" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Número de Registro:</label>
                <input type="text" name="registration_number" id="registration_number" value="{{ $user->student->registration_number }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            </div>
        </div>



        <!-- Fin de campos específicos para Estudiante -->

        <!-- Campos específicos para otros roles -->
        <div id="other_role" class="mb-4 hidden">
            <div class="mb-4">
                <label for="payrol" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Número de
                    Nómina:</label>
                <input type="text" name="payrol" id="payrol"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $payrol ?? '' }}" />
                @error('payrol')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <!-- Fin de campos específicos para otros roles -->

        <div class="flex flex-col sm:flex-row items-center justify-between">
            <button type="submit"
                class="modal-button bg-teal-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Editar Usuario
            </button>
            <a href="{{ route('users.cruduser.index') }}"
                class="modal-button bg-teal-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
        </div>
    </form>
</div>

<script>
    function roleChanged() {
        // Aquí puedes poner el código que quieres ejecutar cuando cambie el valor del select
        console.log('El valor del rol ha cambiado');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role');
        const studentFields = document.getElementById('studentFields');
        const otherRoleFields = document.getElementById('other_role');
        const divisionField = document.getElementById('divisionField');

        function toggleFields() {
            const selectedRole = roleSelect.value;
            studentFields.style.display = selectedRole === 'Estudiante' ? 'block' : 'none';
            otherRoleFields.style.display = ['Asistente de Dirección', 'Presidente Académico',
                'Asesor Académico', 'Administrador de División'
            ].includes(selectedRole) ? 'block' : 'none';
            divisionField.style.display = selectedRole === 'Super Administrador' ? 'none' : 'block';
        }

        toggleFields();
        roleSelect.addEventListener('change', toggleFields);
    });
</script>

@endsection
