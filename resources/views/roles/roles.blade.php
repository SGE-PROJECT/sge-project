@extends('layouts.panel')

@section('titulo')
    Roles
@endsection

@section('contenido')
    <link rel="stylesheet" href="css/roles/roles.css">
    <div class="container">
        <h1>Gestión de Roles y Permisos</h1>

        <div class="grid grid-cols-3 gap-8 ">
            {{-- cards cuerpo --}}
            <div class="cards-container">

                <div class="card" id="administrador-card">

                    <img src="images/roles/admin.png" alt="Administrador" class="card-image">
                    <h5 class="card-title">Administrador</h5>
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="administrador-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="../../form-result.php" method="post" target="_blank">
                            <div class="permissions-administrador">
                                <p class="permissions-title">Permisos administrador</p>
                                <br>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="crear-usuarios" type="checkbox" value="crear-usuarios" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="crear-usuarios"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Crear
                                        usuarios</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="editar-usuarios" type="checkbox" value="editar-usuarios" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="editar-usuarios"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Editar
                                        usuarios</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-usuarios" type="checkbox" value="ver-usuarios" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-usuarios"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        usuarios</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="eliminar-usuarios" type="checkbox" value="eliminar-usuarios"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="eliminar-usuarios"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Eliminar
                                        usuarios</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="crear-roles" type="checkbox" value="crear-roles" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="crear-roles"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Crear
                                        roles</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="editar-roles" type="checkbox" value="editar-roles" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="editar-roles"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Editar
                                        roles</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-roles" type="checkbox" value="ver-roles" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-roles"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        roles</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="eliminar-roles" type="checkbox" value="eliminar-roles" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="eliminar-roles"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Eliminar
                                        roles</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="crear-proyectos" type="checkbox" value="crear-proyectos" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="crear-proyectos"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Crear
                                        proyectos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="editar-proyectos" type="checkbox" value="editar-proyectos" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="editar-proyectos"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Editar
                                        proyectos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="eliminar-proyectos" type="checkbox" value="eliminar-proyectos"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="eliminar-proyectos"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Eliminar
                                        proyectos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="crear-empresas" type="checkbox" value="crear-empresas" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="crear-empresas"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Crear
                                        empresas</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="editar-empresas" type="checkbox" value="editar-empresas"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="editar-empresas"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Editar
                                        empresas</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="eliminar-empresas" type="checkbox" value="eliminar-empresas"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="eliminar-empresas"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Eliminar
                                        empresas</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="agregar-libros" type="checkbox" value="agregar-libros" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="agregar-libros"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Agregar
                                        libros</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="editar-libros" type="checkbox" value="editar-libros" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="editar-libros"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Editar
                                        libros</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="eliminar-libros" type="checkbox" value="eliminar-libros"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="eliminar-libros"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Eliminar
                                        libros</label>
                                </div>
                            </div>
                        </form>
                        <button
                            class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                            permisos</button>
                        <button
                            class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                    </div>
                </div>

                <div class="card" id="coordinadora-card">
                    <img src="images/roles/coordinadora.png" alt="Coordinadora" class="card-image">
                    <h5 class="card-title">Coordinadora</h5>
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="coordinadora-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="../../form-result.php" method="post" target="_blank">
                            <div class="permissions-coordinadora">
                                <p class="permissions-title">Permisos Coordinadora</p>
                                <br>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-estudiantes" type="checkbox" value="ver-estudiantes"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-estudiantes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        estudiantes inscritos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="aprobar-solicitudes" type="checkbox" value="aprobar-solicitudes"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="aprobar-solicitudes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Aprobar
                                        solicitudes de estudiantes</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="asignar-supervisores" type="checkbox" value="asignar-supervisores"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="asignar-supervisores"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Asignar
                                        supervisores</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-informes" type="checkbox" value="ver-informes" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-informes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        informes de progreso</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="gestionar-reuniones" type="checkbox" value="gestionar-reuniones"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gestionar-reuniones"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Gestionar
                                        reuniones</label>
                                </div>
                            </div>

                        </form>
                        <button
                            class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                            permisos</button>
                        <button
                            class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                    </div>
                </div>
                <div class="card" id="directora-card">
                    <img src="images/roles/director.png" alt="Directora" class="card-image">
                    <h5 class="card-title">Directora</h5>
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="directora-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="../../form-result.php" method="post" target="_blank">
                            <div class="permissions-directora">
                                <p class="permissions-title">Permisos Directora</p>
                                <br>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-estudiantes" type="checkbox" value="ver-estudiantes"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-estudiantes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        estudiantes inscritos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="aprobar-solicitudes" type="checkbox" value="aprobar-solicitudes"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="aprobar-solicitudes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Aprobar
                                        solicitudes de estudiantes</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="asignar-supervisores" type="checkbox" value="asignar-supervisores"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="asignar-supervisores"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Asignar
                                        supervisores</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-informes" type="checkbox" value="ver-informes" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-informes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        informes de progreso</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="gestionar-reuniones" type="checkbox" value="gestionar-reuniones"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gestionar-reuniones"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Gestionar
                                        reuniones</label>
                                </div>
                            </div>
                        </form>
                        <button
                            class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                            permisos</button>
                        <button
                            class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                    </div>
                </div>

                <div class="card" id="asesorempresa-card">
                    <img src="images/roles/asesoremp.png" alt="Asesor empresa" class="card-image">
                    <h5 class="card-title">Asesor empresarial</h5>
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="asesorempresa-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="../../form-result.php" method="post" target="_blank">
                            <div class="permissions-asesor-empresa">
                                <p class="permissions-title">Permisos Asesor Empresarial</p>
                                <br>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-estudiantes" type="checkbox" value="ver-estudiantes"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-estudiantes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        estudiantes inscritos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-informes" type="checkbox" value="ver-informes" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-informes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        informes de progreso</label>
                                </div>
                            </div>

                        </form>
                        <button
                            class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                            permisos</button>
                        <button
                            class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                    </div>
                </div>

                <div class="card" id="asesoracademico-card">
                    <img src="images/roles/asesor.png" alt="Asesor academico" class="card-image">
                    <h5 class="card-title">Asesor Académico</h5>
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="asesoracademico-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="../../form-result.php" method="post" target="_blank">
                            <div class="permissions-asesoracademico">
                                <p class="permissions-title">Permisos Asesor Académico</p>
                                <br>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-estudiantes" type="checkbox" value="ver-estudiantes"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-estudiantes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        estudiantes inscritos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-informes" type="checkbox" value="ver-informes" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-informes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        informes de progreso</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="gestionar-reuniones" type="checkbox" value="gestionar-reuniones"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gestionar-reuniones"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Gestionar
                                        reuniones</label>
                                </div>
                            </div>
                        </form>
                        <button
                            class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                            permisos</button>
                        <button
                            class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                    </div>
                </div>


                <div class="card" id="estudiante-card">
                    <img src="images/roles/estudiante.png" alt="estudiante" class="card-image">
                    <h5 class="card-title">Estudiante</h5>
                    <button
                        class="edit-permissions-btn  text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        data-card="estudiante-card">Editar permisos</button>
                </div>

                <div class="permissions-container hidden">
                    <div class="permissions-list">
                        <form action="../../form-result.php" method="post" target="_blank">
                            <div class="permissions-estudiante">
                                <p class="permissions-title">Permisos para Estudiante</p>
                                <br>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="ver-proyectos" type="checkbox" value="ver-proyectos" name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="ver-proyectos"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ver
                                        proyectos</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="enviar-informes" type="checkbox" value="enviar-informes"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="enviar-informes"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Enviar
                                        informes de progreso</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="participar-reuniones" type="checkbox" value="participar-reuniones"
                                        name="permisos[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="participar-reuniones"
                                        class="w-full py-4 ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Participar
                                        en reuniones</label>
                                </div>
                            </div>

                        </form>
                        <button
                            class="update-btn text-lg font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-blue-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar
                            permisos</button>
                        <button
                            class="cancel-btn text-lg font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</button>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editPermissionsBtns = document.querySelectorAll(".edit-permissions-btn");
            const permissionsContainer = document.querySelectorAll(".permissions-container");
            const cancelBtns = document.querySelectorAll(".cancel-btn");
            const cardsContainer = document.querySelector(".cards-container");

            editPermissionsBtns.forEach((btn, index) => {
                btn.addEventListener("click", function(event) {
                    event.preventDefault();
                    const cardId = btn.dataset.card;
                    const selectedCard = document.getElementById(cardId);
                    const selectedPermissionsContainer = permissionsContainer[index];

                    // Ocultar todas las tarjetas excepto la seleccionada
                    cardsContainer.querySelectorAll(".card").forEach(card => {
                        if (card !== selectedCard) {
                            card.style.display = "none";
                        }
                    });

                    // Ocultar el botón de editar permisos dentro de la tarjeta seleccionada
                    selectedCard.querySelector(".edit-permissions-btn").style.display = "none";
                    // Ocultar el título
                    document.querySelector("h1").style.visibility = "hidden";
                    // Mostrar la lista de permisos correspondiente a la tarjeta seleccionada
                    selectedPermissionsContainer.classList.remove("hidden");
                });
            });

            cancelBtns.forEach(cancelBtn => {
                cancelBtn.addEventListener("click", function(event) {
                    event.preventDefault();
                    // Mostrar el título
                    document.querySelector("h1").style.visibility = "visible";
                    // Mostrar todas las tarjetas
                    cardsContainer.querySelectorAll(".card").forEach(card => {
                        card.style.display = "flex";
                    });
                    // Mostrar todos los botones de editar permisos
                    editPermissionsBtns.forEach(btn => {
                        btn.style.display = "block";
                    });

                    // Ocultar todas las secciones de permisos
                    permissionsContainer.forEach(container => {
                        container.classList.add("hidden");
                    });
                });
            });
        });
    </script>
@endsection
