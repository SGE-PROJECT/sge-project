<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carta de Aprobación de Memoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 93%;
            border-collapse: collapse;
            text-align: center;
            margin-top: 30px; 
            }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            margin-top: 30px;
            text-align: center;
            font-size: 22px;
        }

        .fecha {
            margin-top: 40px;
            margin-right: 46px;
            text-align: right;
            font-size: 20px;
        }

        .student-name {
            text-transform: uppercase;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: left;
            margin-top: 35px;
            margin-left: 45px;
        }

        .director-name {
            width: 280px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: left;
            margin-left: 45px;
        }

        .director-name2 {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: left;
            margin-left: 45px;
            margin-top: 20px;
        }

        .contenedor_proyectos {
            display: flex;
            margin: 20px;
        }

        .texto-principal {
            font-size: 18px;
            margin-top: 35px;
            margin-left: 45px;
            margin-right: 45px;
            text-align: justify;
        }

        .text-principal {
            font-size: 18px;
            margin-top: 20px;
            margin-left: 45px;
            margin-right: 45px;
            text-align: justify;
        }

        .firmas {
            margin-top: 90px;
            text-align: center;
        }

        .firma {
            display: inline-block;
            width: 40%;
            text-align: center;
            margin: 0 10px;
        }

        .linea {
            border-top: 1px solid black;
            margin-top: 100px;
        }

        
        .footer {
            font-size: small;
            text-align: center;
            margin-top: 70px;
            margin-left: 50px;
        }

    </style>
</head>

<body>
        <img src="{{ public_path('images/logoUt.jpg') }}" alt="Logo">
        <h1>{{ $title }}</h1>
        <?php
        use Carbon\Carbon;
        $fechaActual = Carbon::now();
        
        $dia = $fechaActual->day;
        $mes = $fechaActual->monthName;
        $año = $fechaActual->year;
        ?>
        <div class="fecha">Cancún Quintana Roo; a {{ $dia }} de {{ $mes }} del {{ $año }}
        </div>
    <div class="student-name">{{ $student->user->name }}</div>
    <div class="director-name">DIRECTOR DE LA CARRERA DE DIVISIÓN</div>
    <div class="director-name2">PRESENTE</div>

    <div class="texto-principal">Sirva la presente para informarle que el estudiante
        <u><b>{{ $student->user->name }}</b></u>
        ha concluido satisfactoriamente la elaboración de su memoria titulada
        <u><b>{{ strtoupper($project->name_project) }}</b></u> que como requisito para la conclusión de su estadía y
        proceso de titulación establece la normatividad de la Universidad Tecnológica de Cancún.</div>
    <div class="text-principal">Así mismo, hago de su conocimiento que la memoria en mención cuenta con la
        correspondiente revisión y por consiguiente aprobación por quienes fungimos como asesores en el ámbito
        empresarial y académico.</div>
    <div class="text-principal">Sin otro particular al respecto, quedamos de usted.</div>

    <div class="firmas">
        <div class="firma">
            <div>ASESOR EMPRESARIAL</div>
            <div class="linea"></div>
            <div>{{ $project->businessAdvisor->name }}</div>
        </div>
        <div class="firma">
            <div>ASESOR ACADÉMICO</div>
            <div class="linea"></div>
            <div>Mtro. {{ $student->academicAdvisor->user->name }}</div>
        </div>
    </div>
    <div class="footer">
        <table class="footer-table">
            <tr>
                <td style="border: 1px solid black;">Fecha de Revisión: 31 de julio de 2024</td>
                <td style="border: 1px solid black;">Revisión No. 6</td>
                <td style="border: 1px solid black;">AEP-P03-F05</td>
            </tr>
        </table>
    </div> 

</body>

</html>
