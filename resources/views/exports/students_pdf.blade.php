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
               
                        <tr>
                            <th >Matricula</th>
                            <th>Nombre</th>
                            <th >Email</th>
                            <th>Grupo</th>
                            <th>Asesor Académico</th>
                            <th>Carrera</th>
                        </tr>
                    <tbody>
                        @foreach ($students as $student)

                                <tr>
                                    <td>{{ $student->student_matricula }}</td>
                                    <td>{{ $student->student_name }}</td>
                                    <td>{{ $student->student_email }}</td>
                                    <td>{{ $student->group_name }}</td>
                                    <td>{{ $student->advisor_name }}</td>
                                    <td>{{ $student->program_name }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>