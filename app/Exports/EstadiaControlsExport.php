<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;


class EstadiaControlsExport implements FromCollection, WithHeadings, WithStyles, WithMapping, WithEvents
{
    protected $reports;

    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    public function collection()
    {
        return $this->reports;
    }

    public function map($control): array
    {
        $actividadesData = json_decode($control->actividad_realizada, true);
        $actividades = array_map(function($actividad) {
            return $actividad['realizada'] ? 'Sí' : 'No';
        }, $actividadesData);

        return [
            $control->id,
            $control->matricula,
            $control->nombre,
            $this->formatBoolean($control->tradicional),
            $this->formatBoolean($control->excelencia),
            $this->formatBoolean($control->proyecto_investigacion),
            $this->formatBoolean($control->experiencia_profesional),
            $this->formatBoolean($control->certificacion_profesional),
            $this->formatBoolean($control->movilidad_internacional),
            $control->contacto_inicial,
            $control->contacto_seguimiento,
            $control->contacto_cierre,
            $control->evaluacion_asesor_empresarial,
            $control->evaluacion_asesor_academico,
            ...$actividades,
            $this->formatBoolean($control->amonestacion_academica1),
            $this->formatBoolean($control->amonestacion_academica2),
            $this->formatBoolean($control->amonestacion_academica3),
            $this->formatBoolean($control->gestion_empresarial1),
            $this->formatBoolean($control->gestion_empresarial2),
            $this->formatBoolean($control->gestion_empresarial3),
            $control->nombre_asesor,
            $control->correo_asesor,
            $control->titulo_memoria,
            $control->observaciones,
        ];
    }

    public function headings(): array
    {
        $actividadesHeadings = [];

        $actividadesData = json_decode($this->reports->first()->actividad_realizada, true);
        $totalActividades = count($actividadesData);
        for ($i = 0; $i < $totalActividades; $i++) {
            $motivo = $actividadesData[$i]['motivo'];
            $actividadesHeadings[] = $motivo;
        }
        return [
            'No.',
            'MATRÍCULA',
            'NOMBRE DEL ALUMNO',
            'Tradicional',
            'Excelencia',
            'Proyecto de Investigación',
            'Experiencia Profesional',
            'Certificación Profesional',
            'Movilidad Internacional',
            'Contacto Inicial',
            'Contacto de Seguimiento',
            'Contacto de Cierre',
            'Evaluación Asesor Empresarial',
            'Evaluación Asesor Académico',
            ...$actividadesHeadings,
            'Amonestación Académica 1',
            'Amonestación Académica 2',
            'Amonestación Académica 3',
            'Gestión Empresarial 1',
            'Gestión Empresarial 2',
            'Gestión Empresarial 3',
            'NOMBRE ASESOR EMPRESARIAL',
            'CORREO ASESOR EMPRESARIAL',
            'TÍTULO DE LA MEMORIA',
            'OBSERVACIONES',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $totalRows = $this->reports->count();

                $signatureRow = $totalRows + 2;
                $actividadesData = json_decode($this->reports->first()->actividad_realizada, true);
                $totalActividades = count($actividadesData);
                $filaFechaRevision = 3;
                $columnaInicialNumero = Coordinate::columnIndexFromString('O');
                $columnaFinalNumero = $columnaInicialNumero + $totalActividades - 1;
                $columnaFinalLetra = Coordinate::stringFromColumnIndex($columnaFinalNumero);
                $columnaFinal = $columnaFinalLetra . '1';
                $columnaAmonestacionesInicioNumero = $columnaFinalNumero + 1;
                $columnaAmonestacionesFinalNumero = $columnaAmonestacionesInicioNumero + 5;
                $columnasfinalesNumero = $columnaAmonestacionesFinalNumero + 4;
                $columnasfinalesLetra = Coordinate::stringFromColumnIndex($columnasfinalesNumero);
                $columnasfinales = $columnasfinalesLetra.'1';
                $columnaAmonestacionesInicioLetra = Coordinate::stringFromColumnIndex($columnaAmonestacionesInicioNumero);
                $columnaAmonestacionesFinalLetra = Coordinate::stringFromColumnIndex($columnaAmonestacionesFinalNumero);
                $columnaAmonestacionesInicio = $columnaAmonestacionesInicioLetra . '1';
                $columnaAmonestacionesFinal = $columnaAmonestacionesFinalLetra . '1';

                $event->sheet->getDelegate()->mergeCells('A' . $signatureRow . ":$columnasfinalesLetra" . $signatureRow);
                $event->sheet->getDelegate()->setCellValue('A' . $signatureRow, "Nombre y firma del Asesor Académico: ___________");

                $event->sheet->getStyle('A' . $signatureRow)->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ]
                ]);

                $noteRow = $signatureRow + 1;


                $event->sheet->getDelegate()->mergeCells('A' . $noteRow . ":$columnasfinalesLetra" . $noteRow);
                $event->sheet->getDelegate()->setCellValue('A' . $noteRow, "* Para el avance de la memoria, redacte los apartados para TSU, Licenciatura o Ingeniería que deban ser entregados para su revisión por parte del estudiante.");


                $event->sheet->getStyle('A' . $noteRow)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        'wrapText' => true,
                    ],
                    'font' => [
                        'italic' => true,
                    ]
                ]);

                $totalRows = $this->reports->count();
                $sheet = $event->sheet->getDelegate();

                $dataRange = "A2:$columnasfinalesLetra" . ($totalRows + 1);

                $sheet->getStyle($dataRange)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($dataRange)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $totalRows = $this->reports->count() + 3;


                for ($row = 2; $row <= $totalRows; $row++) {
                    $event->sheet->getDelegate()->getRowDimension($row)->setRowHeight(50);
                    if ($row == $totalRows) {
                        $event->sheet->getDelegate()->getRowDimension($row)->setRowHeight(30);
                    }
                }

                $totalRows = $this->reports->count();
                $lastRow = 5 + $totalRows - 2;


                $range = "A2:$columnasfinalesLetra" . $lastRow - 1;


                $borderStyle = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ];

                $event->sheet->getStyle($range)->applyFromArray($borderStyle);



                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(4.26);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(13.86);



                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(35.14);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(4);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(4);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(4);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(4);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(4);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(4);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);

                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(20);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(20);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(20);


                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(7.71);
                $event->sheet->getDelegate()->getRowDimension(0)->setRowHeight(170);
                $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(7.71);
                $event->sheet->getDelegate()->getRowDimension(0)->setRowHeight(170);


                $actividadesData = json_decode($this->reports->first()->actividad_realizada, true);
                $numActividades = count($actividadesData);

                $startLetter = 'O'; // Comenzamos desde 'O'
                $startAscii = ord($startLetter); // Convertimos la letra en su valor ASCII
                $startColumn = 14; // 'O' es la columna 15
                $newColumn = $startColumn + $numActividades; // Calculamos la nueva columna basada en el número de actividades

                for ($i = $newColumn; $i <= ($newColumn+10); $i++) {
                    $columnLetter = Coordinate::stringFromColumnIndex($i);
                    if ($i > ($newColumn+6)) {
                        $event->sheet->getDelegate()->getColumnDimension($columnLetter)->setWidth(28.71);
                        $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                    }else {
                        $event->sheet->getDelegate()->getColumnDimension($columnLetter)->setWidth(5);
                        $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(170);
                    }
                }

                $actividadesData = json_decode($this->reports->first()->actividad_realizada, true);
                $totalActividades = count($actividadesData);
                $filaFechaRevision = 3;
                $columnaInicialNumero = Coordinate::columnIndexFromString('O');
                $columnaFinalNumero = $columnaInicialNumero + $totalActividades - 1;
                $columnaFinalLetra = Coordinate::stringFromColumnIndex($columnaFinalNumero);
                $columnaFinal = $columnaFinalLetra . '1';
                $columnaAmonestacionesInicioNumero = $columnaFinalNumero + 1;
                $columnaAmonestacionesFinalNumero = $columnaAmonestacionesInicioNumero + 5;
                $columnasfinalesNumero = $columnaAmonestacionesFinalNumero + 4;
                $columnasfinalesLetra = Coordinate::stringFromColumnIndex($columnasfinalesNumero);
                $columnasfinales = $columnasfinalesLetra.'1';
                $columnaAmonestacionesInicioLetra = Coordinate::stringFromColumnIndex($columnaAmonestacionesInicioNumero);
                $columnaAmonestacionesFinalLetra = Coordinate::stringFromColumnIndex($columnaAmonestacionesFinalNumero);
                $columnaAmonestacionesInicio = $columnaAmonestacionesInicioLetra . '1';
                $columnaAmonestacionesFinal = $columnaAmonestacionesFinalLetra . '1';

                $event->sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A1:C1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $event->sheet->getStyle('D1:N1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle("O1:$columnasfinales")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle("O1:$columnasfinales")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


                $event->sheet->getStyle('D1:N1')->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("O1:$columnaFinal")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("$columnaAmonestacionesInicio:$columnaAmonestacionesFinal")->getAlignment()->setTextRotation(90);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->getRowDimension(1)->setRowHeight(200);
                $event->sheet->getRowDimension(2)->setRowHeight(20);

                $highestColumn = $event->sheet->getHighestColumn();
                $event->sheet->mergeCells('A1:' . $highestColumn . '1');
                $event->sheet->mergeCells('A2:' . $highestColumn . '2');


                $drawing = new Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Logo');
                $drawing->setPath(__DIR__ . '/LogoUT.png');
                $drawing->setHeight(90);
                $drawing->setCoordinates('K1');


                $drawing->setOffsetX(10);
                $drawing->setOffsetY(10);
                $drawing->setWorksheet($event->sheet->getDelegate());


                $textoTitulo = "CONTROL DE ESTADÍAS\n";
                $textoTitulo .= "PROGRAMA EDUCATIVO: _______________________                                                                    PERÍODO CUATRIMESTRAL: _______________________\n";
                $textoTitulo .= "ASESOR ACADÉMICO: _______________________                                                                      FECHA DE ACTUALIZACIÓN: _______________________";



                $event->sheet->getDelegate()->getRowDimension(2)->setRowHeight(100);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(100);


                $event->sheet->setCellValue('A2', $textoTitulo);


                $event->sheet->getStyle('A2')->getAlignment()->setWrapText(true);
                $event->sheet->getStyle('A2')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                ]);



                $event->sheet->insertNewRowBefore(3, 1);


                $event->sheet->getDelegate()->mergeCells('D3:I3');
                $event->sheet->setCellValue('D3', 'TIPO DE MEMORIA');

                $event->sheet->getDelegate()->mergeCells('J3:L3');
                $event->sheet->setCellValue('J3', 'SEGUIMIENTO CON ASESOR EMPRESARIAL');

                $event->sheet->getDelegate()->mergeCells('M3:N3');
                $event->sheet->setCellValue('M3', 'EVALUACIONES');

                $actividadesData = json_decode($this->reports->first()->actividad_realizada, true);
                $totalActividades = count($actividadesData);
                $filaFechaRevision = 3;
                $columnaInicialNumero = Coordinate::columnIndexFromString('O');
                $columnaFinalNumero = $columnaInicialNumero + $totalActividades - 1;
                $columnaFinalLetra = Coordinate::stringFromColumnIndex($columnaFinalNumero);
                $columnaFinal = $columnaFinalLetra . '3';
                $event->sheet->mergeCells("O3:$columnaFinal");
                $columnaO = Coordinate::columnIndexFromString('O');
                $columnaFinalNumero = Coordinate::columnIndexFromString($columnaFinalLetra);
                for ($i = $columnaO; $i <= $columnaFinalNumero; $i++) {
                    $event->sheet->getColumnDimensionByColumn($i)->setWidth(10);
                }
                $event->sheet->setCellValue('O3', 'FECHA DE REVISIÓN DE AVANCE DE MEMORIA*');
                $event->sheet->getStyle("O3:$columnaFinal")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle("O3:$columnaFinal")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $columnaAmonestacionesInicioNumero = $columnaFinalNumero + 1;
                $columnaAmonestacionesFinalNumero = $columnaAmonestacionesInicioNumero + 5;
                $columnaAmonestacionesInicioLetra = Coordinate::stringFromColumnIndex($columnaAmonestacionesInicioNumero);
                $columnaAmonestacionesFinalLetra = Coordinate::stringFromColumnIndex($columnaAmonestacionesFinalNumero);
                $columnaAmonestacionesInicio = $columnaAmonestacionesInicioLetra . '3';
                $columnaAmonestacionesFinal = $columnaAmonestacionesFinalLetra . '3';
                $event->sheet->mergeCells("$columnaAmonestacionesInicio:$columnaAmonestacionesFinal");
                $event->sheet->setCellValue($columnaAmonestacionesInicio, 'AMONESTACIONES');
                $event->sheet->getStyle("$columnaAmonestacionesInicio:$columnaAmonestacionesFinal")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle("$columnaAmonestacionesInicio:$columnaAmonestacionesFinal")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


                $event->sheet->getDelegate()->getRowDimension(3)->setRowHeight(40);

                $textStyle = [
                    'font' => [
                        'size' => 10
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true
                    ],
                ];

                $event->sheet->getStyle('D3:I3')->applyFromArray($textStyle);
                $event->sheet->getStyle('J3:L3')->applyFromArray($textStyle);
                $event->sheet->getStyle('M3:N3')->applyFromArray($textStyle);
                $event->sheet->getStyle("O3:$columnaFinal")->applyFromArray($textStyle);
                $event->sheet->getStyle("$columnaAmonestacionesInicio:$columnaAmonestacionesFinal")->applyFromArray($textStyle);




                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                        ],
                    ],
                ];



                $event->sheet->getStyle('D3:I3')->applyFromArray($styleArray);
                $event->sheet->getStyle('J3:L3')->applyFromArray($styleArray);
                $event->sheet->getStyle('M3:N3')->applyFromArray($styleArray);
                $event->sheet->getStyle("O3:$columnaFinal")->applyFromArray($styleArray);
                $event->sheet->getStyle("$columnaAmonestacionesInicio:$columnaAmonestacionesFinal")->applyFromArray($styleArray);
            },
        ];
    }


    public function styles(Worksheet $sheet)
    {
        $numReportColumns = count($this->reports->first()->getAttributes());
        $actividadesData = json_decode($this->reports->first()->actividad_realizada, true);
        $numActividades = count($actividadesData) - 3;
        $totalColumns = $numReportColumns + $numActividades;
        $columnRange = 'A1:' . Coordinate::stringFromColumnIndex($totalColumns) . '1';

        $sheet->getStyle($columnRange)->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('D1:N1')->applyFromArray([
            'font' => ['bold' => false],
        ]);
    }

    private function formatBoolean($value)
    {
        return $value ? 'Sí' : 'No';
    }
}
