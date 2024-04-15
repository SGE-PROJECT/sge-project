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
            margin: 10px;
            width: 97%;
            border-collapse: collapse;
            margin-top: 50px;
            margin-bottom: 480px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            font-size: 22px;
        }

        .student-name {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: left;
            margin-top: 40px;
            margin-left: 40px;
        }

        .director-name {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: left;
            margin-left: 40px;
        }

        .contenedor_proyectos {
            display: flex;
            margin: 20px;
        }

        .texto-principal {
            margin-top: 35px;
            margin-left: 40px;
            margin-right: 40px;
            text-align: justify;
        }

        .text-principal {
            margin-top: 20px;
            margin-left: 40px;
            margin-right: 40px;
            text-align: justify;
        }

        footer {
            background-color: #00937D;
            color: white;
            text-align: center;
            align-content: center;
            justify-content: center;
            padding-top: 5px;
            height: 20px;
        }

        .firmas {
            margin-top: 90px;
            text-align: center;
        }

        .firma {
            display: inline-block;
            width: 45%;
            text-align: center;
            margin: 0 10px;
        }

        .linea {
            border-top: 1px solid black;
            margin-top: 120px;
        }
    </style>
</head>

<body>
    <div class="contenedor_proyectos">
        <img src="{{ public_path('images/logoUt.jpg')}}" alt="Logo">
        <h1>{{ $title }}</h1>
        <?php
        use Carbon\Carbon;
        $fechaActual = Carbon::now();
        
        $dia = $fechaActual->day;
        $mes = $fechaActual->monthName;
        $año = $fechaActual->year;
        ?>
        <h1>Cancún Quintana Roo a {{ $dia }} de {{ $mes }} del {{ $año }}</h1>
    </div>
    <div class="student-name">{{ $student->user->name }}</div>
    <div class="director-name">DIRECTOR DE LA CARRERA DE DIVISIÓN</div>
    <div class="director-name">PRESENTE:</div>

    <div class="texto-principal">Sirva la presente para informarle que el (la) estudiante {{ $student->user->name }}
        ha concluido satisfactoriamente la elaboración de su memoria titulada {{ $project->name_project }} que como requisito para la conclusión de su estadía y
        proceso de titulación establece la normatividad de la Universidad Tecnológica de Cancún.</div>
    <div class="text-principal">Así mismo, hago de su conocimiento que la memoria en mención cuenta con la
        correspondiente revisión y por consiguiente aprobación por quienes fungimos como asesores en el ámbito
        empresarial y académico.</div>
    <div class="text-principal">Sin otro particular al respecto, quedamos de usted.</div>

    <div class="firmas">
        <div class="firma">
            <div>ASESOR EMPRESARIAL</div>
            <div class="linea"></div>
            <div>Nombre y firma</div>
        </div>
        <div class="firma">
            <div>ASESOR ACADÉMICO</div>
            <div class="linea"></div>
            <div>Nombre y firma</div>
        </div>
    </div>

</body>

</html>
