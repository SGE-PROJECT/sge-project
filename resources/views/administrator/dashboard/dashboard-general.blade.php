@extends('layouts.panel')

@vite('resources/css/administrator/dashboard.css')

@section('titulo', 'Dashboard')

@section('contenido')

<div class="flex flex-wrap place-content-between w-full items-center gap-5 p-5">
@include('administrator.card', ['number' => 12, 'name' => 'Proyectos'])
@include('administrator.card', ['number' => 86, 'name' => 'Usuarios'])
@include('administrator.card', ['number' => 79, 'name' => 'Empresas'])
@include('administrator.card', ['number' => 34, 'name' => 'Libros'])
</div>


<div class="flex xl:flex-nowrap flex-wrap gap-5 justify-center p-5">
    <!--SECCION CARRERAS-->
    <div class="seccion-carreras">

        <div class="seccion-titulo">
            <span>Carreras</span>
            <hr>
        </div>

        <div class="cartas-carreras">
          
            @include('administrator.career', ['Namecareer' => 'TI Área Desarrollo de Software Multiplataforma', 'icon' => 'images/administrator/codigo-de-la-computadora-portatil.png'])
            @include('administrator.career', ['Namecareer' => 'Desarrollo de Negocios Área Mercadotecnia', 'icon' => 'images/administrator/bombilla-encendida.png'])
            @include('administrator.career', ['Namecareer' => 'Contaduría', 'icon' => 'images/administrator/grafico-histograma.png'])
            @include('administrator.career', ['Namecareer' => 'Gastronomía', 'icon' => 'images/administrator/sombrero-chef.png'])
            @include('administrator.career', ['Namecareer' => 'Mantenimiento Área Instalaciones', 'icon' => 'images/administrator/herramientas.png'])
            @include('administrator.career', ['Namecareer' => 'Mantenimiento Área Naval', 'icon' => 'images/administrator/barco.png'])
            @include('administrator.career', ['Namecareer' => 'TI Área Infraestructura de Redes Digitales', 'icon' => 'images/administrator/globo.png'])
            @include('administrator.career', ['Namecareer' => 'Turismo Área Desarrollo de Productos Alternativos', 'icon' => 'images/administrator/caja-abierta-llena.png'])
            @include('administrator.career', ['Namecareer' => 'Turismo Área en Hotelería', 'icon' => 'images/administrator/hotel.png'])
            @include('administrator.career', ['Namecareer' => 'Terapia Física', 'icon' => 'images/administrator/414265.png'])

        </div>
    </div>

    
    <div class="flex flex-wrap w-full flex-col gap-5">
    <!--SECCION PROYECTOS-->
        @include('administrator.section-projects')

    <!--SECCION DE RESUMEN-->
    <div class="resumen">
        <div class="seccion-titulo">
            <span>Resumen</span>
            <button class="btn-export transition ease-in-out delay-150 bg-green-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 ">Exportar</button>
            <hr>
        </div>

         <!-- Agrega elementos de resumen individuales aquí -->
         <div class="resumen-item">
            <div class="resumen-icono"><!-- Icono --></div>
            <div class="resumen-info">
              <span class="resumen-nombre">Proyectos</span>
              <div class="resumen-barra">
                <div class="resumen-barra-relleno" style="width: 70%;"></div>
              </div>
              <span class="resumen-numero">43</span>
            </div>
          </div>

          <div class="resumen-item">
            <div class="resumen-icono"><!-- Icono --></div>
            <div class="resumen-info">
              <span class="resumen-nombre">Equipos</span>
              <div class="resumen-barra">
                <div class="resumen-barra-relleno" style="width: 70%;"></div>
              </div>
              <span class="resumen-numero">43</span>
            </div>
          </div>

          <div class="resumen-item">
            <div class="resumen-icono"><!-- Icono --></div>
            <div class="resumen-info">
              <span class="resumen-nombre">Asesores academicos</span>
              <div class="resumen-barra">
                <div class="resumen-barra-relleno" style="width: 70%;"></div>
              </div>
              <span class="resumen-numero">43</span>
            </div>
          </div>

          <div class="resumen-item">
            <div class="resumen-icono"><!-- Icono --></div>
            <div class="resumen-info">
              <span class="resumen-nombre">Asesores empresariales</span>
              <div class="resumen-barra">
                <div class="resumen-barra-relleno" style="width: 70%;"></div>
              </div>
              <span class="resumen-numero">43</span>
            </div>
          </div>

    </div>
    </div>

</div>

@endsection