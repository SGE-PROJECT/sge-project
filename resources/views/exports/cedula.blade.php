<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cédula de Anteproyecto de Estadía</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {

            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .field {
            margin-bottom: 10px;
        }

        .field label {
            font-weight: bold;
        }

        .field input,
        .field textarea {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('images/logoUt.jpg')}}" alt="Logo" >
    <div class="container" style=" ">
        <h1 style="font-size: 22px; text-align: center; ">CÉDULA DE ANTEPROYECTO DE ESTADÍA PARA APROBACIÓN POR COMISIÓN DE ESTADÍA</h1>

        <div class="section">
            <h2 class="section-title" style="font-size: 15px;"">I. DATOS – ESTUDIANTE(S)</h2>
            <table>
                <tr>
                    <th>División:</th>
                    <td>{{ $student->academicAdvisor->division->name }}</td>
                </tr>
                <tr>
                    <th>Programa educativo:</th>
                    <td>{{ $student->group->program->name }}</td>
                </tr>
                <tr>
                    <th>Título de anteproyecto:</th>
                    <td>{{ $project->name_project }}</td>
                </tr>
                <tr>
                    <th>Título de anteproyecto:</th>
                    <td>{{ $student->user->name }}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th >Matrícula:</th>
                    <td>{{ $student->user->student->registration_number }}</td>
                    <th>Grupo:</th>
                    <td>{{ $student->group->name }}</td>
                </tr>
                <tr>
                    <th>Teléfono:</th>
                    <td>{{ $student->user->phone_number }}</td>
                    <th>Correo Electrónico</th>
                    <td>{{ $student->user->email }}</td>
                </tr>
                <tr>
                    <th>Fecha de inicio del Proyecto:</th>
                    <td>{{ $project->startproject_date }}</td>
                    <th>Fecha de término del proyecto:</th>
                    <td>{{ $project->startproject_date }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2 class="section-title" style="font-size: 15px;">II. DATOS DE LA EMPRESA</h2>
            <table>
                <tr>
                    <th style="width: 30%;">Nombre de la Empresa:</th>
                    <td>{{ $project->company_name }}</td>
                </tr>
                <tr>
                    <th style="width: 30%;">Dirección:</th>
                    <td>{{ $project->company_address }}</td>
                </tr>
                <tr>
                    <th style="width: 30%;">Nombre del (la) asesor (a) empresarial:</th>
                    <td>{{ $project->businessAdvisor->name }}</td>
                </tr>
                <tr>
                    <th style="width: 30%;">Cargo:</th>
                    <td></td>
                </tr>

            </table>

            <table>
                <tr>
                    <th style="width: 20%;">Teléfono:</th>
                    <td></td>
                    <th style="width: 20%;">Correo:</th>
                    <td></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th style="width: 30%;">Área donde se realizará el proyecto:</th>
                    <td>{{$project->project_area}}</td>
                </tr>
            </table>
        </div>


        <div class="section" style="margin-top: 15%">
            <h2 class="section-title" style="font-size: 15px;">III. DATOS DEL PROYECTO</h2>

            <h3>3.1 Planteamiento del Problema: exponer los aspectos, elementos y relaciones del problema.</h3>
        <table>
            <tr>
                <td>{{$project->problem_statement}}</td>
            </tr>
        </table>

        <h3>3.2 Justificación: debe manifestarse de manera clara y precisa del por qué y para qué se va llevar a cabo el estudio. Causas y propósitos que motivan la investigación. Contesta las preguntas: ¿Cuáles son los beneficios que este trabajo proporcionará? ¿Quiénes serán los beneficiados? ¿Cuál es su utilidad?</h3>
        <table>
            <tr>
                <td>{{$project->justification}}</td>
            </tr>
        </table>

        <h3>3.3 Actividades a realizar: listar las actividades a llevar a cabo en orden.</h3>
        <table>
            <tr>
                <td>{{$project->activities}}</td>
            </tr>
        </table>
        </div>

        <div class="section">
            <h2 class="section-title" style="font-size: 15px;">IV. EVALUACIÓN DEL ANTEPROYECTO</h2>
            <h2 class="section-title" style="font-size: 15px; text-align:center;">Para ser llenado Comisión de Estadía</h2>
            <table style="margin-bottom: 25px">
                <tr>
                    <th>Se aprueba:</th>
                    <td>                @if($project->is_project == 1)
                        No Aprobado
                    @elseif($project->is_project == 2)
                        Aprobado
                    @else
                        Pendiente
                    @endif</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th style="width: 30%">Observaciones y/o comentarios:</th>
                    <td style="height: 65%">

                    </td>
                </tr>
            </table>

        </div>

        <div class="section">
            <h2 class="section-title" style="font-size: 15px;">Asesor académico</h2>
            <table>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $student->academicAdvisor->user->name }}</td>
                </tr>
                <tr>
                    <th>Correo:</th>
                    <td>{{ $student->academicAdvisor->user->email }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
