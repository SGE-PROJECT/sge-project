@vite('resources/css/administrator/dashboard.css')

@php
    // Define un array con clases de colores de Tailwind para usar en las iteraciones
    $colors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500'];
    // Calcula el número de colores disponibles para ciclar a través de ellos
    $numberOfColors = count($colors);
@endphp

<div class="seccion-projects p-5 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 w-full shadow-lg rounded-xl font-sans">
    <div class="rounded-t mb-0 px-0 border-0">

        <div class="flex flex-wrap items-center">
            <div class="relative w-full max-w-full flex-grow flex-1 mb-4">
                <h3 class="font-bold text-2xl">Estudiantes</h3>
            </div>
        </div>

        <div class="block w-full overflow-x-auto">
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th
                            class="px-4 bg-gray-100 align-middle border border-solid border-gray-200 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-bold">
                            Carrera</th>
                        <th
                            class="px-4 bg-gray-100 align-middle border border-solid border-gray-200 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-bold">
                            Total</th>
                        <th
                            class="px-4 bg-gray-100 align-middle border border-solid border-gray-200 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-bold min-w-140-px">
                            Porcentaje</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($programsData as $index => $program)
                    @php
                    // Selecciona un color de la lista basado en el índice actual
                    $colorClass = $colors[$index % $numberOfColors];
                @endphp
                    <tr>
                        <th class="border-t-0 px-4  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex items-center ">
                            <div class="rounded-lg {{ $colorClass }} w-2.5 h-2.5 mr-3"></div>
                            <span class="font-bold text-md text-gray-600">{{ $program['program_name'] }}</span>
                        </th>
                        <td class="border-t-0 px-4 text-center font-bold text-gray-600 border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                            {{ $program['student_count'] }}
                        </td>
                        <td
                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <span class="mr-2 font-bold text-gray-600">{{ $program['percentage'] }}%</span>
                                <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                        <div style="width: {{ $program['percentage'] }}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center {{ $colorClass }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
