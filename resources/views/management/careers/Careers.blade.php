@extends('layouts.panel')

@section('titulo', 'Carreras')

@section('contenido')


@vite('resources/css/careers/career.css');




  <div class="card-container">
    <div class="performance-meter-careers">
      <div class="carta-payment-careers">
        <div class="carta-header-careers">
          <div class="amount-careers">
            <div class="gauge-careers">
              <div class="gauge__body-careers">
                <div class="gauge__fill-careers"></div>
                <div class="gauge__cover-careers"></div>
              </div>
            </div>
            <h2 class="ctitulo-careers">Carreras</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="divisions">
      <div class="title-container">
          <h2>Divisiones</h2>
      </div>
      @foreach($divisions as $division)
      <div class="division-item">
          <span class="dot" style="background-color: {{ $division['color'] }}"></span>
          <span>{{ $division['name'] }}</span>
      </div>
      @endforeach
  </div>
  
    
  </div>

  <div class="table-container">
    <button class="add-button">Agregar</button>
    <table>
      <thead>
          <tr>
              <th>Nombre carrera</th>
              <th>División</th>
              <th>Descripción</th>
              <th>Acción</th>
          </tr>
      </thead>
      <tbody>
        @foreach($careers as $career)
        <tr>
            <td>{{ $career['name'] }}</td>
            <td>{{ $career['division'] }}</td>
            <td>{{ $career['description'] }}</td>
            <td>
                <div class="flex">
                    <i><img class="iconImage h-7 w-7" src="images/projects/edit.png"></i>
                    <i><img class="iconImage h-7 w-7" src="images/projects/view.png"></i>
                    <i><img class="iconImage h-7 w-7" src="images/projects/delete.png"></i>
                    <i class="icon download"></i>
                    <i class="icon more-options"></i>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    
  </table>
  
  </div>

@endsection

