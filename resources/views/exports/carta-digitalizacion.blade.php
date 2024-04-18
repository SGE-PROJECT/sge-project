<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Carta de Digitalización</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
        }
        .container-title {
            text-align: center;
        }
        .container-fecha {
            text-align: right;
            margin-bottom: 10px;
        }
        .container-asunto {
            text-align: right;
            width: 100%;
        }
        .container-asunto-text {
            display: inline-block;
            text-align: center;
            width: auto;
        }
        .section-datos {
            text-align: center;
            width: 100%;
        }
        .section-datos span {
            font-size: medium;
            display: inline-block;
            text-align: justify;
            width: auto;
        }
        .section-table {
            margin-left: 15%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        table, th {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
        }

        td:first-child {
            text-align: center;
        }

        .firma {
            text-align: center;
            padding: 0;
            width: 45%;
            gap: 20px;
        }

        .linea-firma {
            border-top: 1px solid black;
            margin-top: 5px;
            width: 98%;
        }

        .footer {
            font-size: small;
            text-align: center;
            margin-top: 70px;
        }

    </style>
</head>
<body>
    <img src="{{ public_path('images/logoUt.jpg')}}" alt="Logo">
    <div class="container">
        <h3 class="container-title">Dirección de la División {{ $student->academicAdvisor->division->name }}</h3>
        <div class="container-fecha">
            <?php
            $dia = date('d');
            $mes = date('F'); 
            $ano = date('Y'); 
            $meses = [
                'January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo',
                'April' => 'Abril', 'May' => 'Mayo', 'June' => 'Junio',
                'July' => 'Julio', 'August' => 'Agosto', 'September' => 'Septiembre',
                'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'
            ];
    
            $mes = $meses[date('F')];
            echo "Cancún, Quintana Roo; a $dia de $mes de $ano";
            ?>
        </div>

        <div class="container-asunto">
            <span class="container-asunto-text">
                <p><b>Asunto: </b>Autorización de digitalización.</p>
                <p><b>Of: </b>XXX.</p>
            </span>
        </div>

        <div class="section-datos">
            <span>
                <p>Se autoriza al (a) estudiante <strong>{{ $student->user->name }}</strong> del grupo <strong>{{ $student->group->name }}</strong></p>
                <p>con número de matrícula: <strong>{{ $student->user->student->registration_number }}</strong> la digitalización de la MEMORIA en</p>
                <p>modalidad:</p>
            </span> 
        </div>

        <div class="section-table">
            <table>
                <tr>
                    <th>&nbsp;</th>
                    <th style="text-align: left; width: 40%;">Tradicional</th>
                    <th style="width: 50%;">Escribir el título</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black;  width: 10%;"></td>
                    <th style="text-align: left; border: 1px solid black;">Excelencia académica</th>
                    <td rowspan="5" style="border-right: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"></td>
                    <th style="text-align: left; border: 1px solid black;">Experiencia Laboral</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"></td>
                    <th style="text-align: left; border: 1px solid black;">Movilidad internacional</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"></td>
                    <th style="text-align: left; border: 1px solid black;">Proyecto de investigación</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"></td>
                    <th style="text-align: left; border: 1px solid black;">Certificación Profesional</th>
                </tr>
            </table>
        </div>

        <p style="width: 100%; margin-left: 11%; margin-top: 5%;">Lo anterior para los trámites correspondientes a su titulación.</p>
        <p style="width: 100%; text-align: center;"><b>Vo. Bo.</b></p>
<table style="text-align: left; border: none;">
    <tr>
        <td  class="firma" style="border: 5px ">
            <div style="margin-bottom:20%"><p><b>ASESOR ACADÉMICO</b></p></div>
            <div>{{ $student->academicAdvisor->user->name }}</div>
            <div class="linea-firma"></div>
            <div>Nombre y firma</div>
        </td>
        <td class="firma" style="border: 5px ">
            <div style="margin-bottom:20%"><p><b>COMISIÓN ACADÉMICA</b></p></div>
            <div>&nbsp;</div>
            <div class="linea-firma"></div>
            <div>Nombre, cargo, firma y sello de Dirección</div>
        </td>
    </tr>
</table>
       

        <div class="footer">
            <table class="footer-table">
                <tr>
                    <td style="border: 1px solid black;">Fecha de Revisión: 31 de julio de 2024</td>
                    <td style="border: 1px solid black;">Revisión No. 6</td>
                    <td style="border: 1px solid black;">AEP-P03-F05</td>
                </tr>
            </table>
        </div> 
    </div>
</body>
</html>
