@extends('layouts.panel')

@section('titulo')
    Roles
@endsection
@php
    $role = \Spatie\Permission\Models\Role::find(1);
    $role2 = \Spatie\Permission\Models\Role::find(2);
    $role3 = \Spatie\Permission\Models\Role::find(3);
    $role4 = \Spatie\Permission\Models\Role::find(4);
    $role5 = \Spatie\Permission\Models\Role::find(5);
    $role6 = \Spatie\Permission\Models\Role::find(6);
    $role7 = \Spatie\Permission\Models\Role::find(7);

    $role1Permissions = \Spatie\Permission\Models\Role::where('id', 1)->first()->permissions->pluck('name')->toArray();
    $role2Permissions = \Spatie\Permission\Models\Role::where('id', 2)->first()->permissions->pluck('name')->toArray();
    $role3Permissions = \Spatie\Permission\Models\Role::where('id', 3)->first()->permissions->pluck('name')->toArray();
    $role4Permissions = \Spatie\Permission\Models\Role::where('id', 4)->first()->permissions->pluck('name')->toArray();
    $role5Permissions = \Spatie\Permission\Models\Role::where('id', 5)->first()->permissions->pluck('name')->toArray();
    $role6Permissions = \Spatie\Permission\Models\Role::where('id', 6)->first()->permissions->pluck('name')->toArray();
    $role7Permissions = \Spatie\Permission\Models\Role::where('id', 7)->first()->permissions->pluck('name')->toArray();
@endphp
@section('contenido')
    <link rel="stylesheet" href="css/roles/roles.css">
    <h1>Gestión de Roles y Permisos</h1>

    <div class="container">

        <div class="grid grid-cols-3 gap-8 ">
            {{-- cards cuerpo --}}
            <div class="cards-container">

                <div class="card" id="administrador-card">

                    <img src="images/roles/admin.png" alt="Administrador" class="card-image">
                    @if ($role)
                        <h5 class="card-title">{{ $role->name }}</h5>
                    @endif


                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="administrador-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="{{ route('roles.permissions.update', ['roles_permiso' => $role->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="permissions-administrador">
                                <p class="permissions-title">Permisos administrador</p>
                                <br>
                                <?php
                                // Arreglo asociativo de nombres alternativos para los permisos
                                $permissionNames = [
                                    'administrator.dashboard.DashboardUsers' => 'Ver dashboard usuarios',
                                    'administrator.dashboard.dashboardTeam' => 'Ver dashboard equipos',
                                    'books-notifications.books.list' => 'Ver lista de libros',
                                ];
                                ?>

                                @foreach ($role1Permissions as $permission)
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="{{ $permission }}" type="checkbox" value="{{ $permission }}"
                                            name="permisos[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission }}"
                                            class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                                            {{ isset($permissionNames[$permission]) ? $permissionNames[$permission] : $permission }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit"
                                class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                                permisos</button>

                            <button type="button"
                                class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                        </form>
                    </div>
                </div>


                <div class="card" id="presidente-card">

                    <img src="images/roles/presidente.png" alt="Presidente" class="card-image">
                    @if ($role7)
                        <h5 class="card-title">{{ $role7->name }}</h5>
                    @endif
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="administrador-card">Editar permisos</button>
                </div>
                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="{{ route('roles.permissions.update', ['roles_permiso' => $role->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="permissions-presidente">
                                <p class="permissions-title">Permisos de Presidente Académico</p>
                                <br>
                                @foreach ($role7Permissions as $permission)
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="{{ $permission }}" type="checkbox" value="{{ $permission }}"
                                            name="permisos[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission }}"
                                            class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                                permisos</button>

                            <button type="button"
                                class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                        </form>
                    </div>
                </div>


                <div class="card" id="coordinadora-card">
                    <img src="images/roles/coordinadora.png" alt="Coordinadora" class="card-image">
                    @if ($role2)
                        <h5 class="card-title">{{ $role2->name }}</h5>
                    @endif
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="coordinadora-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="{{ route('roles.permissions.update', ['roles_permiso' => $role->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="permissions-coordinadora">
                                <p class="permissions-title">Permisos de Profesor</p>
                                <br>
                                @foreach ($role2Permissions as $permission)
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="{{ $permission }}" type="checkbox" value="{{ $permission }}"
                                            name="permisos[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission }}"
                                            class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                                permisos</button>

                            <button type="button"
                                class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                        </form>

                    </div>
                </div>
                <div class="card" id="directora-card">
                    <img src="images/roles/director.png" alt="Directora" class="card-image">
                    @if ($role3)
                        <h5 class="card-title">{{ $role3->name }}</h5>
                    @endif
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="directora-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="{{ route('roles.permissions.update', ['roles_permiso' => $role->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="permissions-directora">
                                <p class="permissions-title">Permisos Asesor Académico</p>
                                <br>
                                @foreach ($role5Permissions as $permission)
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="{{ $permission }}" type="checkbox" value="{{ $permission }}"
                                            name="permisos[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission }}"
                                            class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                                permisos</button>

                            <button type="button"
                                class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                        </form>

                    </div>
                </div>

                <div class="card" id="asesorempresa-card">
                    <img src="images/roles/asesoremp.png" alt="Asesor empresa" class="card-image">
                    @if ($role4)
                        <h5 class="card-title">{{ $role4->name }}</h5>
                    @endif
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="asesorempresa-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="{{ route('roles.permissions.update', ['roles_permiso' => $role->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="permissions-asesor-empresa">
                                <p class="permissions-title">Permisos de Estudiante</p>
                                <br>
                                @foreach ($role4Permissions as $permission)
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="{{ $permission }}" type="checkbox" value="{{ $permission }}"
                                            name="permisos[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission }}"
                                            class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                                permisos</button>

                            <button type="button"
                                class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                        </form>

                    </div>
                </div>

                <div class="card" id="asesoracademico-card">
                    <img src="images/roles/asesor.png" alt="Asesor academico" class="card-image">
                    @if ($role5)
                        <h5 class="card-title">{{ $role5->name }}</h5>
                    @endif
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="asesoracademico-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="{{ route('roles.permissions.update', ['roles_permiso' => $role->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="permissions-asesoracademico">
                                <p class="permissions-title">Permisos de Director</p>
                                <br>
                                @foreach ($role5Permissions as $permission)
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="{{ $permission }}" type="checkbox" value="{{ $permission }}"
                                            name="permisos[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission }}"
                                            class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                                permisos</button>

                            <button type="button"
                                class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                        </form>

                    </div>
                </div>


                <div class="card" id="estudiante-card">
                    <img src="images/roles/estudiante.png" alt="estudiante" class="card-image">
                    @if ($role6)
                        <h5 class="card-title">{{ $role6->name }}</h5>
                    @endif <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="estudiante-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="{{ route('roles.permissions.update', ['roles_permiso' => $role->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="permissions-estudiante">
                                <p class="permissions-title">Permisos de Licenciado</p>
                                <br>
                                @foreach ($role6Permissions as $permission)
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="{{ $permission }}" type="checkbox" value="{{ $permission }}"
                                            name="permisos[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $permission }}"
                                            class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                                permisos</button>

                            <button type="button"
                                class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                        </form>

                    </div>
                </div>

            </div>


        </div>
    </div>

    <script src="{{ asset('js/permissions.js') }}"></script>
@endsection
