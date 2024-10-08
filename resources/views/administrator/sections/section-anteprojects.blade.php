@vite('resources/css/administrator/dashboard.css')

<div class="seccion-projects p-5 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 w-full shadow-lg rounded-xl font-sans">
    <div class="rounded-t mb-0 px-0 border-0">

        <div class="flex flex-wrap items-center">
            <div class="relative w-full max-w-full flex-grow flex-1 mb-4">
                <h3 class="font-bold text-2xl">Anteproyectos</h3>
            </div>
        </div>

        <div class="block w-full overflow-x-auto">
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th
                            class="px-4 bg-gray-100 align-middle border border-solid border-gray-200 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-bold">
                            Estado</th>
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
                            <div class="rounded-lg bg-green-500 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Registrados</span>
                        </th>
                        <td class="border-t-0 px-4 text-center font-bold text-gray-600 border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                            {{$registradosCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$registradosPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-green-200">
                                        <div style="width: {{$registradosPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="">
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-yellow-400 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">En revisión</span>
                        </th>
                        <td
                            class="border-t-0 px-4 text-center font-bold text-base text-gray-600 border-l-0 border-r-0 whitespace-nowrap p-4">
                            {{$enRevisionCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$enRevisionPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-yellow-200">
                                        <div style="width: {{$enRevisionPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center justify-center">
                            <div class="rounded-lg bg-red-400 w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-base text-gray-600">Rechazados</span>
                        </th>
                        <td class="border-t-0 px-4 text-center font-bold text-gray-600 border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                            {{$rechazadosCount}}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{$rechazadosPercentage}}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                        <div style="width: {{$rechazadosPercentage}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-400">
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
