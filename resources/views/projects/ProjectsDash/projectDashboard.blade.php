@extends('layouts.panelUsers')

@section('titulo', 'DashboardProjects')

@section('contenido')
    <div class="container-ProyectDashboard">
        <!-- Moví el enlace a la hoja de estilo dentro de la sección head -->
        <link rel="stylesheet" href="{{ asset('css/projects/projectDashboardStyle.css') }}">

        <div class="project-administrator-card">
            @include('administrator.graphs.graph-projects')
        </div>


        <div class="project-section-projects">
            @include('administrator.section-projects', ['number' => 12, 'name' => 'Proyectos'])
        </div>

        <h1 class="proyect-table-title">Anteproyectos</h1>
        <table class="project-table">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Integrantes</th>
                    <th>Estado</th>
                    <th>Asesor</th>
                    <th>Carrera</th>
                    <th>Empresa</th>
                    <th>Es Proyecto</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Projects as $project)
                    <tr>
                        <td>{{ $project->name_project }}</td>
                        <td>{{ $project->fullname_student }}</td>
                        <td><span class="project-status">{{ $project->status }}</span></td>
                        <td>Rafael Villegas</td>
                        <td>Software</td>
                        <td>{{ $project->company_name }}</td>
                        <td>{{ $project->is_project ? 'Sí' : 'No' }}</td>
                        <td>
                            <!-- Íconos de acción -->
                            <div class="flex-dash-project">
                                <a href="{{route('projects.edit', $project-> id)}}" class="bg-[#03A696] hover:bg-blue-600 cursor-pointer text-white py-2 px-4 rounded mr-2 mb-1 ">Editar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="proyects-dash-links m-6">
        {{ $Projects->links() }}
    </div>

    @include('layouts.modal', [
        'title' => 'Eliminar Proyecto',
        'message' => '¿Estás seguro de que deseas borrar el proyecto? Esta acción no se puede deshacer.',
        'cancelButton' => 'Cancelar',
        'confirmButton' => 'Eliminar',
    ])
@endsection
