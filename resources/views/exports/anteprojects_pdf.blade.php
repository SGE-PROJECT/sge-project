<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 4px; /* Reduce el padding para hacerlo más compacto */
        text-align: center; /* Centra el texto */
        font-size: 10px; /* Reduce el tamaño de la fuente */
        word-wrap: break-word; /* Asegura que el texto no salga de la celda */
    }
    th {
        background-color: #f2f2f2;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Nombre del Proyecto</th>
            <th>Estudiante Principal</th>
            <th>Correo Electrónico</th>
            <th>División</th>
            <th>Grupo</th>
            <th>Programa</th>
            <th>Asesor Académico</th>
            <th>Nombre de la Compañía</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($anteprojects as $anteproject)
        <tr>
            <td>{{ $anteproject->name_project }}</td>
            @foreach ($anteproject->students as $student)
            <td>{{ $student->user->name }} ({{ $student->registration_number }})</td>
            <td>{{ $student->user->email }}</td>
            <td>{{ $student->group->program->division->name }}</td>
            <td>{{ $student->group->name }}</td>
            <td>{{ $student->group->program->name }}</td>
            <td>{{ $student->academicAdvisor->user->name }} ({{ $student->academicAdvisor->payrol }})</td>
            @endforeach
            <td>{{ $anteproject->company_name }}</td>
            <td>{{ $anteproject->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
