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
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required />
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Nueva Contraseña
                    (opcional):</label>
                <input type="password" name="password" id="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

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
            </div>

            <div class="mb-4" id="divisionField">
                <label for="division_id" class="block text-gray-700 text-sm font-bold mb-2">División:</label>
                <select name="division_id" id="division_id"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione una División</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>
                            {{ $division->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Aquí puedes agregar más campos específicos basados en el rol -->

            <div id="studentFields" class="mb-4 hidden">
                <label for="group_id" class="block text-gray-700 text-sm font-bold mb-2">Grupo:</label>
                <select name="group_id" id="group_id"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione un Grupo</option>
                    @foreach (\App\Models\Group::all() as $group)
                        <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}</option>
                    @endforeach
                </select>

                <div class="mb-4">
                    <label for="registration_number" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Número de
                        Registro:</label>
                    <input type="text" name="registration_number" id="registration_number"
                        value="{{ old('registration_number') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>

                <label for="academic_advisor_id" class="block text-gray-700 text-sm font-bold mb-2">Asesor
                    Académico:</label>
                <select name="academic_advisor_id" id="academic_advisor_id"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione un Asesor Académico</option>
                    @foreach ($academicAdvisors as $advisor)
                        <option value="{{ $advisor->id }}"
                            {{ old('academic_advisor_id') == $advisor->id ? 'selected' : '' }}>
                            {{ $advisor->user->name }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div id="other_role" class="mb-4 hidden">

                <div class="mb-4">
                    <label for="other_role" class="block text-gray-700 py-2 pt-2 text-sm font-bold mb-2">Número de
                        Nómina:</label>
                    @if ($payrol)
                        <input type="text" name="payrol" id="payrol" value="{{ old('payrol', $payrol) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    @endif
                </div>

            </div>

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
