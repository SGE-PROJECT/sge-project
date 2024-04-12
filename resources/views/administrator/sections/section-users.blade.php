@vite('resources/css/administrator/dashboard.css')

<div class="seccion-projects p-5 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 w-full shadow-lg rounded-xl font-sans">
    <div class="rounded-t mb-0 px-0 border-0">

        <div class="flex flex-wrap items-center">
            <div class="relative w-full max-w-full flex-grow flex-1 mb-4">
                <h3 class="font-bold text-2xl">Usuarios</h3>
            </div>
        </div>

        <div class="block w-full overflow-x-auto">
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th
                            class="px-4 bg-gray-100 align-middle border border-solid border-gray-200 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-bold">
                            Rol de usuario</th>
                        <th
                            class="px-4 bg-gray-100 align-middle border border-solid border-gray-200 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-bold">
                            Total</th>
                        <th
                            class="px-4 bg-gray-100 align-middle border border-solid border-gray-200 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-bold min-w-140-px">
                            Porcentaje</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-blue-800 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Super administrador</span>
                        </th>
                        <td class="border-t-0 px-4 text-center font-bold text-gray-600 border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                            {{$superAdminCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$superAdminPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                        <div style="width: {{$superAdminPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-800">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="">
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-purple-600 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Administrador de División</span>
                        </th>
                        <td
                            class="border-t-0 px-4 text-center font-bold text-base text-gray-600 border-l-0 border-r-0 whitespace-nowrap p-4">
                            {{$managmentAdminCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$managmentAdminPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200">
                                        <div style="width: {{$managmentAdminPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-600">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>


                    <tr class="">
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-orange-400 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Asesor Académico</span>
                        </th>
                        <td
                            class="border-t-0 px-4 text-center font-bold text-base text-gray-600 border-l-0 border-r-0 whitespace-nowrap p-4">
                            {{$adviserCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$adviserPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-orange-200">
                                        <div style="width: {{$adviserPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-400">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="">
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-emerald-400 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Estudiante</span>
                        </th>
                        <td
                            class="border-t-0 px-4 text-center font-bold text-base text-gray-600 border-l-0 border-r-0 whitespace-nowrap p-4">
                            {{$studentCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$studentPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-emerald-200">
                                        <div style="width: {{$studentPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-400">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="">
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-cyan-400 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Presidente Académico</span>
                        </th>
                        <td
                            class="border-t-0 px-4 text-center font-bold text-base text-gray-600 border-l-0 border-r-0 whitespace-nowrap p-4">
                            {{$presidentCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$presidentPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-cyan-200">
                                        <div style="width: {{$presidentPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-cyan-400">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="">
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-fuchsia-500 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Asistente de Dirección</span>
                        </th>
                        <td
                            class="border-t-0 px-4 text-center font-bold text-base text-gray-600 border-l-0 border-r-0 whitespace-nowrap p-4">
                            {{$secretaryCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$secretaryPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-fuchsia-200">
                                        <div style="width: {{$secretaryPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-fuchsia-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>
