@extends('layouts.panel')

@section('titulo')
Roles
@endsection

@section('contenido')

<div class="container mx-auto">
    <h1 class="text-3xl font-medium mb-8 mt-10 text-center">Gestión de Roles y Permisos</h1>

    <!-- Tabla de Roles -->
    <div class="flex justify-center">
        <div class="overflow-x-auto w-3/5 rounded-3xl shadow-xl ">
            <table class="table-auto border-collapse w-full text-center" style="background-color: #DCDAD4; border-collapse: collapse;">
                <thead>
                    <tr class="font-medium" style="background-color: #2F4050; color:white" >
                        <th class=" p-4">Nombre</th>
                        <th class=" p-4">Permisos</th>
                        <th class=" p-4">Editar Permisos</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila de ejemplo -->
                    <tr class="font-bold" style="color: #2F4050">
                        <td class=" p-4">Administrador</td>
                        <td class=" p-4">12 </td>
                        <td class=" p-4">
                            <button class="text-black relative" onclick="mostrarEditarPermisos('editarPermisosAdministrador')">
                                <div class="relative">
                                    <img src="ruta/a/tu/imagen.png" class="h-10 w-10" alt="Editar Icono">
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>
                            
                            
                         </td>
                    </tr>
                    <tr class="font-bold" style="color: #2F4050">
                        <td class=" p-4">Coordinador</td>
                        <td class=" p-4">12 </td>
                        <td class=" p-4">
                            <button class="text-black relative" onclick="mostrarEditarPermisos('editarPermisosAdministrador')">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.198-1.197l1-3a1 1 0 01.242-.39l9-9zM14 6l-8 8v2h2l8-8-2-2z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>
                            
                            
                                                   </td>
                    </tr>
                    <tr class="font-bold" style="color: #2F4050">
                        <td class=" p-4">Asesor</td>
                        <td class=" p-4">12 </td>
                        <td class=" p-4">
                            <!-- Botón para editar permisos -->
                            <button class="text-black relative" onclick="mostrarEditarPermisos('editarPermisosAdministrador')">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.198-1.197l1-3a1 1 0 01.242-.39l9-9zM14 6l-8 8v2h2l8-8-2-2z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>                       </td>
                    </tr>
                    <tr class="font-bold" style="color: #2F4050">
                        <td class=" p-4">Asesor empresarial</td>
                        <td class=" p-4">12 </td>
                        <td class=" p-4">
                            <!-- Botón para editar permisos -->
                            <button class="text-black relative" onclick="mostrarEditarPermisos('editarPermisosAdministrador')">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.198-1.197l1-3a1 1 0 01.242-.39l9-9zM14 6l-8 8v2h2l8-8-2-2z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>                    </td>
                    </tr>
                    <tr class="font-bold" style="color: #2F4050">
                        <td class=" p-4">Estudiante</td>
                        <td class=" p-4">12 </td>
                        <td class=" p-4">
                            <!-- Botón para editar permisos -->
                            <button class="text-black relative" onclick="mostrarEditarPermisos('editarPermisosAdministrador')">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.198-1.197l1-3a1 1 0 01.242-.39l9-9zM14 6l-8 8v2h2l8-8-2-2z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>                       </td>
                    </tr>
                    <!-- Agrega más filas según sea necesario -->
                </tbody>
            </table>
        </div>
    </div>

</div>


   <!-- Modal -->
<div id="modalEditarPermisos" class="fixed bottom-0 left-0 right-0 top-0 bg-black bg-opacity-50 hidden ">
    <div class="relative w-full h-full flex justify-center items-center">
        <div class="bg-white p-12 rounded-lg shadow-xl ">
            <h2 class="text-2xl font-medium mb-4 flex justify-center">Editar Permisos</h2>
            <form id="formularioPermisos">
                <div class="grid grid-cols-4 gap-20 pt-10  flex justify-center">
                    <!-- Permisos para Usuarios -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2 flex justify-center">Usuarios</h3>
                        <div class="grid grid-cols-2 gap-6 pt-5">
                            <div>
                                <input type="checkbox" id="usuarios_create" name="usuarios_create" class="form-checkbox h-5 w-5 mr-2 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="usuarios_create" class="text-black">Agregar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="usuarios_read" name="usuarios_read" class="form-checkbox h-5 w-5 mr-2 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="usuarios_read" class="text-black">Ver</label>
                            </div>
                            <div>
                                <input type="checkbox" id="usuarios_update" name="usuarios_update" class="form-checkbox h-5 w-5 mr-2 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="usuarios_update" class="text-black">Editar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="usuarios_delete" name="usuarios_delete" class="form-checkbox h-5 w-5 mr-2 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="usuarios_delete" class="text-black">Eliminar</label>
                            </div>
                        </div>
                    </div>
                    <!-- Permisos para Proyectos -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2 flex justify-center">Proyectos</h3>
                        <div class="grid grid-cols-2 gap-6  pt-5">
                            <div>
                                <input type="checkbox" id="proyectos_create" name="proyectos_create" class="form-checkbox h-5 w-5 mr-2 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="proyectos_create" class="text-black">Agregar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="proyectos_read" name="proyectos_read" class="form-checkbox h-5 w-5 mr-2 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="proyectos_read" class="text-black">Ver</label>
                            </div>
                            <div>
                                <input type="checkbox" id="proyectos_update" name="proyectos_update" class="form-checkbox h-5 w-5 mr-2 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="proyectos_update" class="text-black">Editar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="proyectos_delete" name="proyectos_delete" class="form-checkbox h-5 w-5 mr-2 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="proyectos_delete" class="text-black">Eliminar</label>
                            </div>
                        </div>
                    </div>
                    <!-- Permisos para Libros -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2 flex justify-center">Libros</h3>
                        <div class="grid grid-cols-2 gap-6  pt-5">
                            <div>
                                <input type="checkbox" id="libros_create" name="libros_create" class="form-checkbox h-5 w-5 mr-2 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="libros_create" class="text-black">Agregar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="libros_read" name="libros_read" class="form-checkbox h-5 w-5 mr-2 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="libros_read" class="text-black">Ver</label>
                            </div>
                            <div>
                                <input type="checkbox" id="libros_update" name="libros_update" class="form-checkbox h-5 w-5 mr-2 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="libros_update" class="text-black">Editar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="libros_delete" name="libros_delete" class="form-checkbox h-5 w-5 mr-2 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="libros_delete" class="text-black">Eliminar</label>
                            </div>
                        </div>
                    </div>
                    <!-- Permisos para Empresas -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2 flex justify-center">Empresas</h3>
                        <div class="grid grid-cols-2 gap-6  pt-5">
                            <div>
                                <input type="checkbox" id="empresas_create" name="empresas_create" class="form-checkbox h-5 w-5 mr-2 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="empresas_create" class="text-black">Agregar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="empresas_read" name="empresas_read" class="form-checkbox h-5 w-5 mr-2 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="empresas_read" class="text-black">Ver</label>
                            </div>
                            <div>
                                <input type="checkbox" id="empresas_update" name="empresas_update" class="form-checkbox h-5 w-5 mr-2 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="empresas_update" class="text-black">Editar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="empresas_delete" name="empresas_delete" class="form-checkbox h-5 w-5 mr-2 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="empresas_delete" class="text-black">Eliminar</label>
                            </div>
                        </div>
                    </div>
                    <!-- Agrega más permisos según sea necesario -->
                </div>
                <!-- Botones de acción -->
                <div class="flex justify-center mt-4 pt-10">
                    <button type="button" class="btn bg-cyan-600 text-white py-2 px-4 rounded hover:bg-cyan-700" onclick="guardarPermisos()">Guardar</button>
                    <button type="button" class="btn bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded ml-4" onclick="cerrarModal()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Estilo para el hover */
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(50, 50, 93, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    }
    button:hover span {
    opacity: 0.5; /* Cambia este valor según prefieras */
    box-shadow: 0 0 10px 5px rgba(46, 213, 115, 0.5); /* Cambia el color de la sombra según prefieras */
}


</style>

<script>
    function mostrarEditarPermisos() {
        // Muestra el modal
        document.getElementById('modalEditarPermisos').classList.remove('hidden');
    }

    function cerrarModal() {
        // Oculta el modal
        document.getElementById('modalEditarPermisos').classList.add('hidden');
    }

    function guardarPermisos() {
        // Aquí puedes agregar la lógica para guardar los permisos
        // Una vez que los permisos se guarden, puedes cerrar el modal
        cerrarModal();
    }
</script>

@endsection
