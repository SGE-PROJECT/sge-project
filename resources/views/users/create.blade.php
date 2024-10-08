@extends('layouts.panel')

@section('titulo')
Crear Usuario
@endsection

@section('contenido')

<div class="max-w-lg mx-auto bg-white mt-8 rounded p-6">
    <h1 class="text-2xl font-bold mb-5">Agregar Usuario</h1>

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

    <form action="{{ route('users.cruduser.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
            <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" required />
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
            <select name="role" id="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ (old('role') == $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="curp" class="block text-gray-700 text-sm font-bold mb-2">Curp:</label>
            <input type="curp" name="curp" id="curp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label for="birthdate" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento:</label>
            <input type="date" name="birthdate" id="birthdate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"/>
        </div>

        <div class="mb-4">
            <label for="sex" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Sexo: </label>
            <select name="sex" id="sex" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="M" {{ old('isReEntry') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('isReEntry') == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="nss" class="block text-gray-700 text-sm font-bold mb-2">Número de Seguridad Social (NSS):</label>
            <input type="text" name="nss" id="nss" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div id="divisionField" class="mb-4">
            <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
            <select name="division_id" id="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Seleccione una División</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" {{ (old('division_id') == $division->id) ? 'selected' : '' }}>{{ $division->name }}</option>
                @endforeach
            </select>
        </div>

    <!-- En caso de ser un estudiante -->

        <div id="studentFields" class="mb-4 hidden">
            <label for="group_id" class="block text-gray-700 text-sm font-bold mb-2">Grupo:</label>
            <select name="group_id" id="group_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Seleccione un Grupo</option>
                @foreach (\App\Models\Group::all() as $group)
                    <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>

            <div class="mb-4">
                <label for="registration_number" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Número de Registro:</label>
                <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            </div>

            <div class="mb-4">
                <label for="isReEntry" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Es Reingreso?</label>
                <select name="isReEntry" id="isReEntry" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="Si" {{ old('isReEntry') == 'Si' ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ old('isReEntry') == 'No' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <label for="academic_advisor_id" class="block text-gray-700 text-sm font-bold mb-2">Asesor Académico:</label>
            <select name="academic_advisor_id" id="academic_advisor_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Seleccione un Asesor Académico</option>
                @foreach ($academicAdvisors as $advisor)
                    <option value="{{ $advisor->id }}" {{ old('academic_advisor_id') == $advisor->id ? 'selected' : '' }}>
                        {{ $advisor->user->name }}
                    </option>
                @endforeach
            </select>

        </div>

        <!-- En caso de ser cualquier otro rol -->

        <div id="other_role" class="mb-4 hidden">

            <div class="mb-4">
                <label for="other_role" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Número de Nómina:</label>
                <input type="text" name="payrol" id="payrol" value="{{ old('payrol') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            </div>

        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between">
            <a href="{{ route('users.cruduser.index') }}" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Volver
            </a>
            <button type="submit" class="modal-button bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Crear Usuario
            </button>
            
        </div>
    </form>
</div>

@endsection

<!-- Área de scripts para las validaciones -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.getElementById('role');
    const studentFields = document.getElementById('studentFields');
    const otherRoleFields = document.getElementById('other_role');
    const divisionField = document.getElementById('divisionField');

    function toggleFields() {
        const selectedRole = roleSelect.value;

        // Estudiante
        studentFields.style.display = selectedRole === 'Estudiante' ? 'block' : 'none';
        Array.from(studentFields.querySelectorAll('input, select')).forEach(input => {
            input.required = selectedRole === 'Estudiante'; 
        });

        // Otros roles específicos
        otherRoleFields.style.display = ['Asistente de Dirección', 'Presidente Académico', 'Asesor Académico', 'Administrador de División'].includes(selectedRole) ? 'block' : 'none';
        Array.from(otherRoleFields.querySelectorAll('input, select')).forEach(input => {
            input.required = ['Asistente de Dirección', 'Presidente Académico', 'Asesor Académico', 'Administrador de División'].includes(selectedRole);
        });

        // División
        divisionField.style.display = selectedRole === 'Super Administrador' ? 'none' : 'block';
        divisionField.querySelector('select').required = selectedRole !== 'Super Administrador';
    }

    toggleFields();
    roleSelect.addEventListener('change', toggleFields);
});

    </script>

