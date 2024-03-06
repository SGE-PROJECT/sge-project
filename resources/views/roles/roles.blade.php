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
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="80px" height="80px"><path fill="#78a0cf" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"/><path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"/><path fill="#cee1f4" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"/><path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"/><path fill="#78a0cf" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"/><path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"/><path fill="#78a0cf" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"/><path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"/><path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"/><path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"/><g><path fill="#f1bc19" d="M65,28c3.86,0,7,3.14,7,7v30c0,3.86-3.14,7-7,7H35c-3.86,0-7-3.14-7-7V35c0-3.86,3.14-7,7-7H65"/><path fill="#472b29" d="M65,28.4c3.639,0,6.6,2.961,6.6,6.6v30c0,3.639-2.961,6.6-6.6,6.6H35c-3.639,0-6.6-2.961-6.6-6.6V35 c0-3.639,2.961-6.6,6.6-6.6H65 M65,27H35c-4.418,0-8,3.582-8,8v30c0,4.418,3.582,8,8,8h30c4.418,0,8-3.582,8-8V35 C73,30.582,69.418,27,65,27L65,27z"/><path fill="#fdfcee" d="M63,69H37c-3.309,0-6-2.691-6-6V37c0-3.309,2.691-6,6-6h26c3.309,0,6,2.691,6,6v26 C69,66.309,66.309,69,63,69z"/><path fill="#472b29" d="M63 69H37c-3.309 0-6-2.691-6-6V37c0-3.309 2.691-6 6-6h24.625C61.832 31 62 31.168 62 31.375s-.168.375-.375.375H37c-2.895 0-5.25 2.355-5.25 5.25v26c0 2.895 2.355 5.25 5.25 5.25h26c2.895 0 5.25-2.355 5.25-5.25V48.375c0-.207.168-.375.375-.375S69 48.168 69 48.375V63C69 66.309 66.309 69 63 69zM68.625 42c-.207 0-.375-.168-.375-.375v-1.278c0-.207.168-.375.375-.375S69 40.14 69 40.347v1.278C69 41.832 68.832 42 68.625 42z"/><path fill="#472b29" d="M68.625,47c-0.207,0-0.375-0.168-0.375-0.375v-3.25c0-0.207,0.168-0.375,0.375-0.375 S69,43.168,69,43.375v3.25C69,46.832,68.832,47,68.625,47z"/></g><g><path fill="#f1bc19" d="M57.687,39.376c-0.401,0-0.75,0.119-1,0.368L42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922 c-0.322,0.851-0.597,1.574-0.757,1.933c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086 c0.417-0.188,1.188-0.481,2.083-0.82c1.907-0.724,4.256-1.615,4.702-2.061l14.377-14.39c0.743-0.744,0.323-2.376-0.936-3.637 C59.483,39.842,58.482,39.376,57.687,39.376z"/><path fill="#fdfcee" d="M42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.417-0.188,1.188-0.481,2.083-0.82 c1.907-0.724,4.256-1.615,4.702-2.061l0.003-0.003L42.311,54.132z"/><path fill="#4a5397" d="M40.181,59.003c-0.006,0.017-0.013,0.035-0.02,0.052c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.39-0.176,1.095-0.445,1.916-0.756 L40.181,59.003z"/><path fill="#7782ac" d="M55.385 41.048H58.193V47.5H55.385z" transform="rotate(-45.001 56.788 44.275)"/><path fill="#fcb9b9" d="M60.036,45.536l1.219-1.22c0.743-0.744,0.323-2.376-0.936-3.637 c-0.836-0.837-1.837-1.303-2.632-1.303c-0.401,0-0.75,0.119-1,0.368l-1.221,1.222L60.036,45.536z"/></g><g><path fill="#472b29" d="M57.69,39.75L57.69,39.75c0.722,0,1.628,0.458,2.364,1.194c1.208,1.21,1.459,2.583,0.936,3.107 L46.612,58.441c-0.389,0.389-2.893,1.339-4.55,1.968l-0.075,0.028c-0.875,0.332-1.63,0.619-2.097,0.798l-0.129-0.129 c0.173-0.394,0.454-1.136,0.751-1.92c0.62-1.639,1.658-4.382,2.064-4.789L56.952,40.01C57.125,39.837,57.373,39.75,57.69,39.75 M57.69,39c-0.501,0-0.944,0.155-1.268,0.479L42.046,53.867c-0.481,0.482-1.264,2.486-2.235,5.054 c-0.319,0.842-0.59,1.558-0.749,1.913c-0.119,0.265-0.063,0.569,0.142,0.775l0.156,0.156C39.513,61.919,39.715,62,39.921,62 c0.11,0,0.222-0.024,0.327-0.071c0.408-0.185,1.183-0.478,2.08-0.819c2.525-0.958,4.35-1.673,4.815-2.139l14.378-14.389 c0.905-0.906,0.494-2.736-0.936-4.167C59.668,39.497,58.586,39,57.69,39L57.69,39z"/><path fill="#472b29" d="M44.346 53.186H44.846V59.65H44.346z" transform="rotate(-45.001 44.59 56.416)"/><path fill="#472b29" d="M40.839 58.497H41.339V61.325H40.839z" transform="rotate(-45.001 41.088 59.912)"/><path fill="#472b29" d="M55.546 42.04H56.046V48.492H55.546z" transform="rotate(-45.001 55.796 45.267)"/><path fill="#472b29" d="M57.531 40.055H58.031V46.507H57.531z" transform="rotate(-45.001 57.781 43.282)"/><path fill="#472b29" d="M54.615 44.049L54.385 43.951 55.51 41.326 55.74 41.424zM55.49 44.799L55.26 44.701 56.385 42.076 56.615 42.174zM56.365 45.549L56.135 45.451 57.26 42.826 57.49 42.924zM57.144 46.522L56.915 46.424 58.135 43.576 58.365 43.674zM57.981 47.361L57.751 47.263 59.01 44.326 59.24 44.424z"/></g></svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="80px" height="80px"><path fill="#78a0cf" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"/><path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"/><path fill="#cee1f4" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"/><path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"/><path fill="#78a0cf" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"/><path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"/><path fill="#78a0cf" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"/><path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"/><path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"/><path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"/><g><path fill="#f1bc19" d="M65,28c3.86,0,7,3.14,7,7v30c0,3.86-3.14,7-7,7H35c-3.86,0-7-3.14-7-7V35c0-3.86,3.14-7,7-7H65"/><path fill="#472b29" d="M65,28.4c3.639,0,6.6,2.961,6.6,6.6v30c0,3.639-2.961,6.6-6.6,6.6H35c-3.639,0-6.6-2.961-6.6-6.6V35 c0-3.639,2.961-6.6,6.6-6.6H65 M65,27H35c-4.418,0-8,3.582-8,8v30c0,4.418,3.582,8,8,8h30c4.418,0,8-3.582,8-8V35 C73,30.582,69.418,27,65,27L65,27z"/><path fill="#fdfcee" d="M63,69H37c-3.309,0-6-2.691-6-6V37c0-3.309,2.691-6,6-6h26c3.309,0,6,2.691,6,6v26 C69,66.309,66.309,69,63,69z"/><path fill="#472b29" d="M63 69H37c-3.309 0-6-2.691-6-6V37c0-3.309 2.691-6 6-6h24.625C61.832 31 62 31.168 62 31.375s-.168.375-.375.375H37c-2.895 0-5.25 2.355-5.25 5.25v26c0 2.895 2.355 5.25 5.25 5.25h26c2.895 0 5.25-2.355 5.25-5.25V48.375c0-.207.168-.375.375-.375S69 48.168 69 48.375V63C69 66.309 66.309 69 63 69zM68.625 42c-.207 0-.375-.168-.375-.375v-1.278c0-.207.168-.375.375-.375S69 40.14 69 40.347v1.278C69 41.832 68.832 42 68.625 42z"/><path fill="#472b29" d="M68.625,47c-0.207,0-0.375-0.168-0.375-0.375v-3.25c0-0.207,0.168-0.375,0.375-0.375 S69,43.168,69,43.375v3.25C69,46.832,68.832,47,68.625,47z"/></g><g><path fill="#f1bc19" d="M57.687,39.376c-0.401,0-0.75,0.119-1,0.368L42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922 c-0.322,0.851-0.597,1.574-0.757,1.933c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086 c0.417-0.188,1.188-0.481,2.083-0.82c1.907-0.724,4.256-1.615,4.702-2.061l14.377-14.39c0.743-0.744,0.323-2.376-0.936-3.637 C59.483,39.842,58.482,39.376,57.687,39.376z"/><path fill="#fdfcee" d="M42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.417-0.188,1.188-0.481,2.083-0.82 c1.907-0.724,4.256-1.615,4.702-2.061l0.003-0.003L42.311,54.132z"/><path fill="#4a5397" d="M40.181,59.003c-0.006,0.017-0.013,0.035-0.02,0.052c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.39-0.176,1.095-0.445,1.916-0.756 L40.181,59.003z"/><path fill="#7782ac" d="M55.385 41.048H58.193V47.5H55.385z" transform="rotate(-45.001 56.788 44.275)"/><path fill="#fcb9b9" d="M60.036,45.536l1.219-1.22c0.743-0.744,0.323-2.376-0.936-3.637 c-0.836-0.837-1.837-1.303-2.632-1.303c-0.401,0-0.75,0.119-1,0.368l-1.221,1.222L60.036,45.536z"/></g><g><path fill="#472b29" d="M57.69,39.75L57.69,39.75c0.722,0,1.628,0.458,2.364,1.194c1.208,1.21,1.459,2.583,0.936,3.107 L46.612,58.441c-0.389,0.389-2.893,1.339-4.55,1.968l-0.075,0.028c-0.875,0.332-1.63,0.619-2.097,0.798l-0.129-0.129 c0.173-0.394,0.454-1.136,0.751-1.92c0.62-1.639,1.658-4.382,2.064-4.789L56.952,40.01C57.125,39.837,57.373,39.75,57.69,39.75 M57.69,39c-0.501,0-0.944,0.155-1.268,0.479L42.046,53.867c-0.481,0.482-1.264,2.486-2.235,5.054 c-0.319,0.842-0.59,1.558-0.749,1.913c-0.119,0.265-0.063,0.569,0.142,0.775l0.156,0.156C39.513,61.919,39.715,62,39.921,62 c0.11,0,0.222-0.024,0.327-0.071c0.408-0.185,1.183-0.478,2.08-0.819c2.525-0.958,4.35-1.673,4.815-2.139l14.378-14.389 c0.905-0.906,0.494-2.736-0.936-4.167C59.668,39.497,58.586,39,57.69,39L57.69,39z"/><path fill="#472b29" d="M44.346 53.186H44.846V59.65H44.346z" transform="rotate(-45.001 44.59 56.416)"/><path fill="#472b29" d="M40.839 58.497H41.339V61.325H40.839z" transform="rotate(-45.001 41.088 59.912)"/><path fill="#472b29" d="M55.546 42.04H56.046V48.492H55.546z" transform="rotate(-45.001 55.796 45.267)"/><path fill="#472b29" d="M57.531 40.055H58.031V46.507H57.531z" transform="rotate(-45.001 57.781 43.282)"/><path fill="#472b29" d="M54.615 44.049L54.385 43.951 55.51 41.326 55.74 41.424zM55.49 44.799L55.26 44.701 56.385 42.076 56.615 42.174zM56.365 45.549L56.135 45.451 57.26 42.826 57.49 42.924zM57.144 46.522L56.915 46.424 58.135 43.576 58.365 43.674zM57.981 47.361L57.751 47.263 59.01 44.326 59.24 44.424z"/></g></svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="80px" height="80px"><path fill="#78a0cf" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"/><path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"/><path fill="#cee1f4" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"/><path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"/><path fill="#78a0cf" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"/><path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"/><path fill="#78a0cf" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"/><path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"/><path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"/><path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"/><g><path fill="#f1bc19" d="M65,28c3.86,0,7,3.14,7,7v30c0,3.86-3.14,7-7,7H35c-3.86,0-7-3.14-7-7V35c0-3.86,3.14-7,7-7H65"/><path fill="#472b29" d="M65,28.4c3.639,0,6.6,2.961,6.6,6.6v30c0,3.639-2.961,6.6-6.6,6.6H35c-3.639,0-6.6-2.961-6.6-6.6V35 c0-3.639,2.961-6.6,6.6-6.6H65 M65,27H35c-4.418,0-8,3.582-8,8v30c0,4.418,3.582,8,8,8h30c4.418,0,8-3.582,8-8V35 C73,30.582,69.418,27,65,27L65,27z"/><path fill="#fdfcee" d="M63,69H37c-3.309,0-6-2.691-6-6V37c0-3.309,2.691-6,6-6h26c3.309,0,6,2.691,6,6v26 C69,66.309,66.309,69,63,69z"/><path fill="#472b29" d="M63 69H37c-3.309 0-6-2.691-6-6V37c0-3.309 2.691-6 6-6h24.625C61.832 31 62 31.168 62 31.375s-.168.375-.375.375H37c-2.895 0-5.25 2.355-5.25 5.25v26c0 2.895 2.355 5.25 5.25 5.25h26c2.895 0 5.25-2.355 5.25-5.25V48.375c0-.207.168-.375.375-.375S69 48.168 69 48.375V63C69 66.309 66.309 69 63 69zM68.625 42c-.207 0-.375-.168-.375-.375v-1.278c0-.207.168-.375.375-.375S69 40.14 69 40.347v1.278C69 41.832 68.832 42 68.625 42z"/><path fill="#472b29" d="M68.625,47c-0.207,0-0.375-0.168-0.375-0.375v-3.25c0-0.207,0.168-0.375,0.375-0.375 S69,43.168,69,43.375v3.25C69,46.832,68.832,47,68.625,47z"/></g><g><path fill="#f1bc19" d="M57.687,39.376c-0.401,0-0.75,0.119-1,0.368L42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922 c-0.322,0.851-0.597,1.574-0.757,1.933c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086 c0.417-0.188,1.188-0.481,2.083-0.82c1.907-0.724,4.256-1.615,4.702-2.061l14.377-14.39c0.743-0.744,0.323-2.376-0.936-3.637 C59.483,39.842,58.482,39.376,57.687,39.376z"/><path fill="#fdfcee" d="M42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.417-0.188,1.188-0.481,2.083-0.82 c1.907-0.724,4.256-1.615,4.702-2.061l0.003-0.003L42.311,54.132z"/><path fill="#4a5397" d="M40.181,59.003c-0.006,0.017-0.013,0.035-0.02,0.052c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.39-0.176,1.095-0.445,1.916-0.756 L40.181,59.003z"/><path fill="#7782ac" d="M55.385 41.048H58.193V47.5H55.385z" transform="rotate(-45.001 56.788 44.275)"/><path fill="#fcb9b9" d="M60.036,45.536l1.219-1.22c0.743-0.744,0.323-2.376-0.936-3.637 c-0.836-0.837-1.837-1.303-2.632-1.303c-0.401,0-0.75,0.119-1,0.368l-1.221,1.222L60.036,45.536z"/></g><g><path fill="#472b29" d="M57.69,39.75L57.69,39.75c0.722,0,1.628,0.458,2.364,1.194c1.208,1.21,1.459,2.583,0.936,3.107 L46.612,58.441c-0.389,0.389-2.893,1.339-4.55,1.968l-0.075,0.028c-0.875,0.332-1.63,0.619-2.097,0.798l-0.129-0.129 c0.173-0.394,0.454-1.136,0.751-1.92c0.62-1.639,1.658-4.382,2.064-4.789L56.952,40.01C57.125,39.837,57.373,39.75,57.69,39.75 M57.69,39c-0.501,0-0.944,0.155-1.268,0.479L42.046,53.867c-0.481,0.482-1.264,2.486-2.235,5.054 c-0.319,0.842-0.59,1.558-0.749,1.913c-0.119,0.265-0.063,0.569,0.142,0.775l0.156,0.156C39.513,61.919,39.715,62,39.921,62 c0.11,0,0.222-0.024,0.327-0.071c0.408-0.185,1.183-0.478,2.08-0.819c2.525-0.958,4.35-1.673,4.815-2.139l14.378-14.389 c0.905-0.906,0.494-2.736-0.936-4.167C59.668,39.497,58.586,39,57.69,39L57.69,39z"/><path fill="#472b29" d="M44.346 53.186H44.846V59.65H44.346z" transform="rotate(-45.001 44.59 56.416)"/><path fill="#472b29" d="M40.839 58.497H41.339V61.325H40.839z" transform="rotate(-45.001 41.088 59.912)"/><path fill="#472b29" d="M55.546 42.04H56.046V48.492H55.546z" transform="rotate(-45.001 55.796 45.267)"/><path fill="#472b29" d="M57.531 40.055H58.031V46.507H57.531z" transform="rotate(-45.001 57.781 43.282)"/><path fill="#472b29" d="M54.615 44.049L54.385 43.951 55.51 41.326 55.74 41.424zM55.49 44.799L55.26 44.701 56.385 42.076 56.615 42.174zM56.365 45.549L56.135 45.451 57.26 42.826 57.49 42.924zM57.144 46.522L56.915 46.424 58.135 43.576 58.365 43.674zM57.981 47.361L57.751 47.263 59.01 44.326 59.24 44.424z"/></g></svg>
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>
                                            </td>
                    </tr>
                    <tr class="font-bold" style="color: #2F4050">
                        <td class=" p-4">Asesor empresarial</td>
                        <td class=" p-4">12 </td>
                        <td class=" p-4">
                            <!-- Botón para editar permisos -->
                            <button class="text-black relative" onclick="mostrarEditarPermisos('editarPermisosAdministrador')">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="80px" height="80px"><path fill="#78a0cf" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"/><path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"/><path fill="#cee1f4" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"/><path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"/><path fill="#78a0cf" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"/><path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"/><path fill="#78a0cf" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"/><path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"/><path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"/><path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"/><g><path fill="#f1bc19" d="M65,28c3.86,0,7,3.14,7,7v30c0,3.86-3.14,7-7,7H35c-3.86,0-7-3.14-7-7V35c0-3.86,3.14-7,7-7H65"/><path fill="#472b29" d="M65,28.4c3.639,0,6.6,2.961,6.6,6.6v30c0,3.639-2.961,6.6-6.6,6.6H35c-3.639,0-6.6-2.961-6.6-6.6V35 c0-3.639,2.961-6.6,6.6-6.6H65 M65,27H35c-4.418,0-8,3.582-8,8v30c0,4.418,3.582,8,8,8h30c4.418,0,8-3.582,8-8V35 C73,30.582,69.418,27,65,27L65,27z"/><path fill="#fdfcee" d="M63,69H37c-3.309,0-6-2.691-6-6V37c0-3.309,2.691-6,6-6h26c3.309,0,6,2.691,6,6v26 C69,66.309,66.309,69,63,69z"/><path fill="#472b29" d="M63 69H37c-3.309 0-6-2.691-6-6V37c0-3.309 2.691-6 6-6h24.625C61.832 31 62 31.168 62 31.375s-.168.375-.375.375H37c-2.895 0-5.25 2.355-5.25 5.25v26c0 2.895 2.355 5.25 5.25 5.25h26c2.895 0 5.25-2.355 5.25-5.25V48.375c0-.207.168-.375.375-.375S69 48.168 69 48.375V63C69 66.309 66.309 69 63 69zM68.625 42c-.207 0-.375-.168-.375-.375v-1.278c0-.207.168-.375.375-.375S69 40.14 69 40.347v1.278C69 41.832 68.832 42 68.625 42z"/><path fill="#472b29" d="M68.625,47c-0.207,0-0.375-0.168-0.375-0.375v-3.25c0-0.207,0.168-0.375,0.375-0.375 S69,43.168,69,43.375v3.25C69,46.832,68.832,47,68.625,47z"/></g><g><path fill="#f1bc19" d="M57.687,39.376c-0.401,0-0.75,0.119-1,0.368L42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922 c-0.322,0.851-0.597,1.574-0.757,1.933c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086 c0.417-0.188,1.188-0.481,2.083-0.82c1.907-0.724,4.256-1.615,4.702-2.061l14.377-14.39c0.743-0.744,0.323-2.376-0.936-3.637 C59.483,39.842,58.482,39.376,57.687,39.376z"/><path fill="#fdfcee" d="M42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.417-0.188,1.188-0.481,2.083-0.82 c1.907-0.724,4.256-1.615,4.702-2.061l0.003-0.003L42.311,54.132z"/><path fill="#4a5397" d="M40.181,59.003c-0.006,0.017-0.013,0.035-0.02,0.052c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.39-0.176,1.095-0.445,1.916-0.756 L40.181,59.003z"/><path fill="#7782ac" d="M55.385 41.048H58.193V47.5H55.385z" transform="rotate(-45.001 56.788 44.275)"/><path fill="#fcb9b9" d="M60.036,45.536l1.219-1.22c0.743-0.744,0.323-2.376-0.936-3.637 c-0.836-0.837-1.837-1.303-2.632-1.303c-0.401,0-0.75,0.119-1,0.368l-1.221,1.222L60.036,45.536z"/></g><g><path fill="#472b29" d="M57.69,39.75L57.69,39.75c0.722,0,1.628,0.458,2.364,1.194c1.208,1.21,1.459,2.583,0.936,3.107 L46.612,58.441c-0.389,0.389-2.893,1.339-4.55,1.968l-0.075,0.028c-0.875,0.332-1.63,0.619-2.097,0.798l-0.129-0.129 c0.173-0.394,0.454-1.136,0.751-1.92c0.62-1.639,1.658-4.382,2.064-4.789L56.952,40.01C57.125,39.837,57.373,39.75,57.69,39.75 M57.69,39c-0.501,0-0.944,0.155-1.268,0.479L42.046,53.867c-0.481,0.482-1.264,2.486-2.235,5.054 c-0.319,0.842-0.59,1.558-0.749,1.913c-0.119,0.265-0.063,0.569,0.142,0.775l0.156,0.156C39.513,61.919,39.715,62,39.921,62 c0.11,0,0.222-0.024,0.327-0.071c0.408-0.185,1.183-0.478,2.08-0.819c2.525-0.958,4.35-1.673,4.815-2.139l14.378-14.389 c0.905-0.906,0.494-2.736-0.936-4.167C59.668,39.497,58.586,39,57.69,39L57.69,39z"/><path fill="#472b29" d="M44.346 53.186H44.846V59.65H44.346z" transform="rotate(-45.001 44.59 56.416)"/><path fill="#472b29" d="M40.839 58.497H41.339V61.325H40.839z" transform="rotate(-45.001 41.088 59.912)"/><path fill="#472b29" d="M55.546 42.04H56.046V48.492H55.546z" transform="rotate(-45.001 55.796 45.267)"/><path fill="#472b29" d="M57.531 40.055H58.031V46.507H57.531z" transform="rotate(-45.001 57.781 43.282)"/><path fill="#472b29" d="M54.615 44.049L54.385 43.951 55.51 41.326 55.74 41.424zM55.49 44.799L55.26 44.701 56.385 42.076 56.615 42.174zM56.365 45.549L56.135 45.451 57.26 42.826 57.49 42.924zM57.144 46.522L56.915 46.424 58.135 43.576 58.365 43.674zM57.981 47.361L57.751 47.263 59.01 44.326 59.24 44.424z"/></g></svg>
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>                   </td>
                    </tr>
                    <tr class="font-bold" style="color: #2F4050">
                        <td class=" p-4">Estudiante</td>
                        <td class=" p-4">12 </td>
                        <td class=" p-4">
                            <!-- Botón para editar permisos -->
                            <button class="text-black relative" onclick="mostrarEditarPermisos('editarPermisosAdministrador')">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="80px" height="80px"><path fill="#78a0cf" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"/><path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"/><path fill="#cee1f4" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"/><path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"/><path fill="#78a0cf" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"/><path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"/><path fill="#78a0cf" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"/><path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"/><path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"/><path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"/><g><path fill="#f1bc19" d="M65,28c3.86,0,7,3.14,7,7v30c0,3.86-3.14,7-7,7H35c-3.86,0-7-3.14-7-7V35c0-3.86,3.14-7,7-7H65"/><path fill="#472b29" d="M65,28.4c3.639,0,6.6,2.961,6.6,6.6v30c0,3.639-2.961,6.6-6.6,6.6H35c-3.639,0-6.6-2.961-6.6-6.6V35 c0-3.639,2.961-6.6,6.6-6.6H65 M65,27H35c-4.418,0-8,3.582-8,8v30c0,4.418,3.582,8,8,8h30c4.418,0,8-3.582,8-8V35 C73,30.582,69.418,27,65,27L65,27z"/><path fill="#fdfcee" d="M63,69H37c-3.309,0-6-2.691-6-6V37c0-3.309,2.691-6,6-6h26c3.309,0,6,2.691,6,6v26 C69,66.309,66.309,69,63,69z"/><path fill="#472b29" d="M63 69H37c-3.309 0-6-2.691-6-6V37c0-3.309 2.691-6 6-6h24.625C61.832 31 62 31.168 62 31.375s-.168.375-.375.375H37c-2.895 0-5.25 2.355-5.25 5.25v26c0 2.895 2.355 5.25 5.25 5.25h26c2.895 0 5.25-2.355 5.25-5.25V48.375c0-.207.168-.375.375-.375S69 48.168 69 48.375V63C69 66.309 66.309 69 63 69zM68.625 42c-.207 0-.375-.168-.375-.375v-1.278c0-.207.168-.375.375-.375S69 40.14 69 40.347v1.278C69 41.832 68.832 42 68.625 42z"/><path fill="#472b29" d="M68.625,47c-0.207,0-0.375-0.168-0.375-0.375v-3.25c0-0.207,0.168-0.375,0.375-0.375 S69,43.168,69,43.375v3.25C69,46.832,68.832,47,68.625,47z"/></g><g><path fill="#f1bc19" d="M57.687,39.376c-0.401,0-0.75,0.119-1,0.368L42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922 c-0.322,0.851-0.597,1.574-0.757,1.933c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086 c0.417-0.188,1.188-0.481,2.083-0.82c1.907-0.724,4.256-1.615,4.702-2.061l14.377-14.39c0.743-0.744,0.323-2.376-0.936-3.637 C59.483,39.842,58.482,39.376,57.687,39.376z"/><path fill="#fdfcee" d="M42.311,54.132c-0.463,0.465-1.438,3.042-2.149,4.922c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.417-0.188,1.188-0.481,2.083-0.82 c1.907-0.724,4.256-1.615,4.702-2.061l0.003-0.003L42.311,54.132z"/><path fill="#4a5397" d="M40.181,59.003c-0.006,0.017-0.013,0.035-0.02,0.052c-0.322,0.851-0.597,1.574-0.757,1.933 c-0.056,0.125-0.03,0.261,0.066,0.358l0.155,0.155c0.122,0.123,0.305,0.159,0.468,0.086c0.39-0.176,1.095-0.445,1.916-0.756 L40.181,59.003z"/><path fill="#7782ac" d="M55.385 41.048H58.193V47.5H55.385z" transform="rotate(-45.001 56.788 44.275)"/><path fill="#fcb9b9" d="M60.036,45.536l1.219-1.22c0.743-0.744,0.323-2.376-0.936-3.637 c-0.836-0.837-1.837-1.303-2.632-1.303c-0.401,0-0.75,0.119-1,0.368l-1.221,1.222L60.036,45.536z"/></g><g><path fill="#472b29" d="M57.69,39.75L57.69,39.75c0.722,0,1.628,0.458,2.364,1.194c1.208,1.21,1.459,2.583,0.936,3.107 L46.612,58.441c-0.389,0.389-2.893,1.339-4.55,1.968l-0.075,0.028c-0.875,0.332-1.63,0.619-2.097,0.798l-0.129-0.129 c0.173-0.394,0.454-1.136,0.751-1.92c0.62-1.639,1.658-4.382,2.064-4.789L56.952,40.01C57.125,39.837,57.373,39.75,57.69,39.75 M57.69,39c-0.501,0-0.944,0.155-1.268,0.479L42.046,53.867c-0.481,0.482-1.264,2.486-2.235,5.054 c-0.319,0.842-0.59,1.558-0.749,1.913c-0.119,0.265-0.063,0.569,0.142,0.775l0.156,0.156C39.513,61.919,39.715,62,39.921,62 c0.11,0,0.222-0.024,0.327-0.071c0.408-0.185,1.183-0.478,2.08-0.819c2.525-0.958,4.35-1.673,4.815-2.139l14.378-14.389 c0.905-0.906,0.494-2.736-0.936-4.167C59.668,39.497,58.586,39,57.69,39L57.69,39z"/><path fill="#472b29" d="M44.346 53.186H44.846V59.65H44.346z" transform="rotate(-45.001 44.59 56.416)"/><path fill="#472b29" d="M40.839 58.497H41.339V61.325H40.839z" transform="rotate(-45.001 41.088 59.912)"/><path fill="#472b29" d="M55.546 42.04H56.046V48.492H55.546z" transform="rotate(-45.001 55.796 45.267)"/><path fill="#472b29" d="M57.531 40.055H58.031V46.507H57.531z" transform="rotate(-45.001 57.781 43.282)"/><path fill="#472b29" d="M54.615 44.049L54.385 43.951 55.51 41.326 55.74 41.424zM55.49 44.799L55.26 44.701 56.385 42.076 56.615 42.174zM56.365 45.549L56.135 45.451 57.26 42.826 57.49 42.924zM57.144 46.522L56.915 46.424 58.135 43.576 58.365 43.674zM57.981 47.361L57.751 47.263 59.01 44.326 59.24 44.424z"/></g></svg>
                                    <span class="absolute inset-0 shadow-md rounded-full opacity-0 transition-opacity duration-300"></span>
                                </div>
                                Editar
                            </button>                      </td>
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
