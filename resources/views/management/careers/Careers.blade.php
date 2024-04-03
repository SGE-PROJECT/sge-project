@extends('layouts.panel')

@section('titulo', 'Carreras')

@section('contenido')


@vite('resources/css/careers/career.css')


<div class="flex justify-between items-start p-8">
  <!-- Gráfica de Carreras -->
  <div class="w-1/2 p-8"> 
    @include('management.careers.graph-career')
  </div>

  <!-- Sección de Divisiones -->
  <div class="divisions w-1/2 mt-10">
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
    <a href="{{ route('carreras.create') }}" class="add-button">Agregar</a>
    <table>
      <thead>
          <tr>
              <th>Logotipo</th>
              <th>Nombre carrera</th>
              <th>División</th>
              <th>Descripción</th>
              <th>Acción</th>
          </tr>
      </thead>
      <tbody>
        @foreach($programs as $program)
        <tr>
            <td>
              @if ($program->programImage)
                  <img src="{{ asset($program->programImage->image_path) }}" alt="Logotipo de la carrera" class="h-16 w-16 object-cover">
              @else
                  <span>Sin Imagen</span>
              @endif
            </td>
            <td>{{ $program->name }}</td>
            <td>{{ $program->division->name }}</td>
            <td>{{ $program->description }}</td>
            <td>
              <div class="flex">
                <a href="{{ route('carreras.edit', $program->id) }}"
                    class="bg-[#03A696] hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 mb-2 ">Editar</a>
                    <form action="{{ route('carreras.destroy', $program->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta carrera?')" class="bg-[#03A696] hover:bg-red-600 text-white py-2 px-4 rounded">Eliminar</button>
                  </form>
                  
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    
  </table>
  
  </div>

@endsection

