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
            @foreach ($divisions->where('isActive', true) as $division)
                <div class="division-item">
                    <span class="dot" style="background-color: {{ $division['color'] }}"></span>
                    <span>{{ $division['name'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    @if (Auth::check() && Auth::user()->hasAnyRole(['Super Administrador']))
        <div class="ml-7 mb-8">
            <a href="{{ route('carreras.create') }}"
                class="bg-teal-500 text-white mt-8 px-6 py-2 rounded hover:bg-teal-600 transition-colors">Agregar
                Carrera</a>
        </div>
    @endif
    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>Logotipo</th>
                    <th>Nombre carrera</th>
                    <th>División</th>
                    <th>Descripción</th>
                    @if (auth()->user()->hasRole(['Super Administrador']))
                    <th>Acción</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>
                            @if ($program->programImage)
                                <img src="{{ asset($program->programImage->image_path) }}" alt="Logotipo de la carrera"
                                    class="h-16 w-16 object-cover">
                            @else
                                <span>Sin Imagen</span>
                            @endif
                        </td>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->division->name }}</td>
                        <td>{{ $program->description }}</td>
                        <td>

                            @if (auth()->user()->hasRole(['Super Administrador']))
                            <div class="flex">
                                <a href="{{ route('carreras.edit', $program->id) }}"
                                    class="bg-[#03A696] hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 mb-2 ">Editar</a>
                                <form action="{{ route('carreras.destroy', $program->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta carrera?')"
                                        class="bg-[#03A696] hover:bg-red-600 text-white py-2 px-4 rounded">Eliminar</button>
                                </form>

                            </div>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

@endsection
