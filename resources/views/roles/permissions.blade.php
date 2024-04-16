@extends(Auth::check() && Auth::user()->hasRole('Super Administrador') ? 'layouts.panel' : 'layouts.panelUsers')

@section('titulo', 'Roles y permisos')

@section('contenido')

    @vite('resources/css/roles/roles.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="container">
        <h1 class="mt-8 mb-4 uppercase">Gestión de Roles con Permisos</h1>
        <div class="botonagregar">
            <a href="{{ route('roles.permissions.create') }}" class="mb-4 bg-[#03A696] text-white font-medium w-32 h-10 rounded-md flex justify-center items-center">Agregar Rol</a>
        </div>
        <div class="cards-container">
            @foreach ($roles as $role)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $role->name }} </h5>
                        <div class="card-iconos">
                            @switch($role->name)
                                @case('Super Administrador')
                                    <i class="fas fa-user-shield"></i>
                                @break

                                @case('Administrador de División')
                                    <i class="fas fa-cogs"></i>
                                @break

                                @case('Asesor Académico')
                                    <i class="fas fa-user-tie"></i>
                                @break

                                @case('Estudiante')
                                    <i class="fas fa-user-graduate"></i>
                                @break

                                @case('Presidente Académico')
                                    <i class="fas fa-user-circle"></i>
                                @break

                                @case('Asistente de Dirección')
                                    <i class="fas fa-user-secret"></i>
                                @break

                                @default
                                    <i class="fas fa-exclamation-triangle"></i>
                            @endswitch
                        </div>
                    </div>
                    <div class="card-footer flex justify-between">
                        <div class="button-container">
                            <a href="{{ route('roles.permissions.show', $role->id) }}" class="px-5 py-2 bg-[#03A696] text-white font-medium w-auto h-11 rounded-md flex justify-center items-center">
                                <i class="bx bx-show text-lg"></i>Ver
                            </a>
                        </div>

                        <div class="button-container">
                            <a href="{{ route('roles.permissions.edit', $role->id) }}" class=" bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none mb-2">
                                <i class='bx bx-edit-alt text-lg'></i>Editar
                            </a>
                        </div>

                        <div class="button-container">
                            <button type="button" class="bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white px-4 py-2 transition duration-150 ease-in-out disabled:opacity-50 disabled:pointer-events-none mb-2" onclick="showConfirmModal({{ $role->id }})">
                                <i class='bx bx-trash text-lg'></i>Eliminar
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="confirmModal"
        class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded p-8 max-w-md">
            <h2 class="text-xl font-semibold mb-4">¿Estás seguro de que deseas eliminar este Rol?</h2>
            <div class="flex justify-end">
                <form action="{{ route('roles.permissions.destroy', $role->id) }}" id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Eliminar</button>
                </form>
                <button type="button" onclick="hideConfirmModal()"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancelar</button>
            </div>
        </div>
    </div>


    <script>
        function showConfirmModal(roleId) {
            var modal = document.getElementById('confirmModal');
            var form = document.getElementById('deleteForm');
            form.action = "{{ url('roles-permisos') }}" + '/' + roleId;
            modal.classList.remove('hidden');
        }

        function hideConfirmModal() {
            var modal = document.getElementById('confirmModal');
            modal.classList.add('hidden');
        }
    </script>
@endsection
