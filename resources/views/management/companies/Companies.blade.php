@extends('layouts.panel')

@section('titulo', 'Empresas')

@section('contenido')
    <div class="container mx-auto p-4 flex">
        <!-- Tabla de Tipos de Empresas (Lado Izquierdo) -->
        <div class="w-full md:w-1/3 pr-4">
            <h1 class="text-2xl font-bold mb-4 uppercase">Empresas</h1>
            <table class="w-full bg-[#F6F5F2] rounded-xl shadow mb-4">
                <thead>
                    <tr class="bg-[#293846] text-white">
                        <th class="py-2 px-4 rounded-t-lg uppercase">Tipos:</th>
                    </tr>
                </thead>
                <tbody class="text-center ">
                    <tr>
                        <td class="py-2 px-4">Empresas de Tecnología.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas Turísticas.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas Financieras.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas Gastronómicas.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas Comerciales.</td>
                    </tr>
                </tbody>
            </table>
            <!-- Información de la Empresa Seleccionada -->
            <div>
                <table class="bg-[#F6F5F2] rounded-md shadow p-4">
                    <thead>
                        <tr class="bg-[#293846] text-white">
                            <th class="text-lg rounded-t-lg font-semibold px-4 py-2" colspan="2">Información de la Empresa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-[#F6F5F2]">
                            <td class="flex px-4 py-2">

                                <div>
                                    <div class="inline-flex items-center">
                                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa" class="mt-2 w-20 h-20 object-cover mr-4 rounded-full">
                                        @php
                                            $text = "afdfgfasfsdf";
                                            $words = explode(' ', $text);
                                            $wordsPerLine = 3;
                                            $wrappedText = '';
                                            foreach ($words as $index => $word) {
                                                $wrappedText .= $word . ' ';
                                                if (($index + 1) % $wordsPerLine === 0) {
                                                    $wrappedText .= '\n';
                                                }
                                            }
                                        @endphp
                                        <h2 class="font-bold text-xl text-center whitespace-pre-line">{{ $wrappedText }}</h2>
                                    </div>
                                    <p><b>Dirección:</b> Av. Kabah SM53 L65 Calle la UT</p>
                                    <p><b>Descripción:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque id nisl aliquam pharetra. Maecenas a consectetur nibh. Suspendisse potenti.</p>
                                    <p><b>Teléfono: </b>123456789</p>
                                    <p><b>Correo:</b> empresa@example.com</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Tarjetas de Empresas (Lado Derecho) -->
        <div class="w-full md:w-2/3 pl-4 mt-12">
            <div class="bg-[#293846] rounded-t-lg p-4 text-white">
                <h1 class="text-2xl font-bold">Empresas</h1>
            </div>
            <div class="bg-gray-200 rounded-b-lg p-4" style="background-color: #F6F5F2;">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa"
                            class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img
                                        src="images/companies/editar.png" alt="" class="w-7 h-7 rounded"></button>
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img
                                        src="images/companies/borrar.png" alt="" class="w-7 h-7  rounded"></button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa"
                            class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img
                                        src="images/companies/editar.png" alt="" class="w-7 h-7  rounded"></button>
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img
                                        src="images/companies/borrar.png" alt="" class="w-7 h-7  rounded"></button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa"
                            class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img
                                        src="images/companies/editar.png" alt="" class="w-7 h-7  rounded"></button>
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img
                                        src="images/companies/borrar.png" alt="" class="w-7 h-7  rounded"></button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa"
                            class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button
                                    class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img
                                        src="images/companies/editar.png" alt="" class="w-7 h-7 rounded"></button>
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img
                                        src="images/companies/borrar.png" alt="" class="w-7 h-7 rounded"></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
