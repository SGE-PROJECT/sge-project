@extends('layouts.panel')

@section('titulo', 'Empresas')

@section('contenido')
    <div class="container mx-auto p-4 flex">
        <!-- Tabla de Tipos de Empresas (Lado Izquierdo) -->
        <div class="w-full md:w-1/3 pr-4">
            <h1 class="text-2xl font-bold mb-4">Empresas</h1>
            <table class="w-full bg-[#F6F5F2] rounded shadow mb-4">
                <thead>
                    <tr class="bg-[#293846] text-white">
                        <th class="py-2 px-4">Tipos:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4">Empresas de tecnología.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas turísticas.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas financieras.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas gastronómicas.</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Empresas comerciales.</td>
                    </tr>
                </tbody>
            </table>
            <!-- Información de la Empresa Seleccionada -->
            <div class="bg-[#F6F5F2] rounded shadow p-4">
                <h2 class="text-lg font-semibold mb-2">Información de la Empresa</h2>
                <div class="flex items-center mb-4 bg-[#F6F5F2]">
                    <img src="images/companies/sge.jpg" alt="Imagen de la empresa" class="w-20 h-20 object-cover mr-4 rounded">
                    <div>
                        <h2 class="font-semibold text-xl">SM53</h2>
                        <p><b>Dirección:</b> Av. Kabah SM53 L65 Calle la UT</p>
                        <p><b>Descripción:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque id nisl aliquam pharetra. Maecenas a consectetur nibh. Suspendisse potenti.</p>
                        <p><b>Teléfono: </b>123456789</p>
                        <p><b>Correo:</b> empresa@example.com</p>
                    </div>
                </div>
                <!-- Agrega más información de la empresa seleccionada si es necesario -->
            </div>
        </div>

        <!-- Tarjetas de Empresas (Lado Derecho) -->
        <div class="w-full md:w-2/3 pl-4">
            <div class="bg-[#293846] rounded-t-lg p-4 text-white">
                <h1 class="text-2xl font-bold">Empresas</h1>
            </div>
            <div class="bg-gray-200 rounded-b-lg p-4" style="background-color: #F6F5F2;">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa" class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img src="images/companies/editar.png" alt="" class="w-7 h-7 rounded"></button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img src="images/companies/borrar.png" alt="" class="w-7 h-7  rounded" ></button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa" class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img src="images/companies/editar.png" alt="" class="w-7 h-7  rounded"></button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img src="images/companies/borrar.png" alt="" class="w-7 h-7  rounded"></button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa" class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img src="images/companies/editar.png" alt="" class="w-7 h-7  rounded"></button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img src="images/companies/borrar.png" alt="" class="w-7 h-7  rounded"></button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <img src="images/companies/sge.jpg" alt="Imagen de la empresa" class="w-full h-40 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold mb-2 text-center">SM53</h2>
                        <p>Empresa de desarrollo de software.</p>
                        <div class="flex justify-center mt-4">
                            <div class="flex flex-wrap">
                                <button class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2 mb-2 md:mb-0"><img src="images/companies/editar.png" alt="" class="w-7 h-7 rounded"></button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0"><img src="images/companies/borrar.png" alt="" class="w-7 h-7 rounded"></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
