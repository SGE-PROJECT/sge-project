@extends('dashboard.panel')

@section('titulo')
    Gestión De Sanciones (GS)
@endsection

@section('contenido')
<div class="container mx-auto px-4 sm:px-8">
    <h1 class="text-center font-bold pt-4 pb-12">
        Mis Asesorados
    </h1>

    <div class="flex justify-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-s-3xl pt-4">
            <table class="w-fit h-fit text-sm text-left rtl:text-right text-gray-900 dark:text-gray-900">
                <thead class="text-xs text-white uppercase bg-[#03A696] dark:bg-[#03A696] dark:text-white w-fit h-fit">
                    <tr class="w-fit h-fit">
                        <th scope="col" class="px-6 py-3">
                            Grupo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Matrícula
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre(s)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellido(s)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            SM-53
                        </th>
                        <td class="px-6 py-4">
                            22393204
                        </td>
                        <td class="px-6 py-4">
                            Guillermo
                        </td>
                        <td class="px-6 py-4">
                            Garcia
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Sancionar</a>
                        </td>
                    </tr>
                    <!-- Repetir para cada fila de datos -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@extends('users.Plantilla')
@endsection
