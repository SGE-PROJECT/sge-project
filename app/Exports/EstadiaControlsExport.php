<?php

namespace App\Exports;

use App\Models\Report;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class EstadiaControlsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithMapping
{
    protected $dynamicActivityHeadings = []; // Declarar la propiedad encabezados_actividades

    public function __construct()
    {
        $this->encabezados_actividades = []; // Inicializar la propiedad encabezados_actividades
    }

    public function collection()
    {
        return Report::all();
        // Calcular los encabezados dinámicos para todas las filas
        foreach ($reports as $report) {
            $actividades = json_decode($report->actividad_realizada, true);
            foreach ($actividades as $actividad) {
                if ($actividad['realizada']) {
                    $this->dynamicActivityHeadings[] = $actividad['motivo'];
                }
            }
        }

        // Eliminar duplicados y mantener el orden
        $this->dynamicActivityHeadings = array_values(array_unique($this->dynamicActivityHeadings));

        return $reports;
    }

    public function map($report): array
    {
        // Decodificar la columna actividad_realizada JSON en un array legible
        $actividades = json_decode($report->actividad_realizada, true);

        // Inicializar un arreglo para almacenar los datos de las actividades realizadas
        $actividades_realizadas = [];

        // Inicializar un arreglo para almacenar los encabezados dinámicos de actividades realizadas
        $this->encabezados_actividades = []; // Reinicializar la propiedad encabezados_actividades

        // Recorrer todas las actividades y agregarlas al arreglo de datos y encabezados
        foreach ($actividades as $actividad) {
            // Si la actividad está marcada como realizada, agregarla al arreglo de datos
            if ($actividad['realizada']) {
                $actividades_realizadas[] = $actividad['motivo'];

                // Agregar el encabezado de la actividad al arreglo de encabezados
                $this->encabezados_actividades[] = $actividad['motivo'];
            }
        }

        // Devolver los datos de la entidad Report junto con las actividades realizadas
        return array_merge([
            $report->matricula,
            $report->nombre,
            $this->formatBoolean($report->tradicional),
            $this->formatBoolean($report->excelencia),
            $this->formatBoolean($report->proyecto_investigacion),
            $this->formatBoolean($report->experiencia_profesional),
            $this->formatBoolean($report->certificacion_profesional),
            $this->formatBoolean($report->movilidad_internacional),
            $report->contacto_inicial,
            $report->contacto_seguimiento,
            $report->contacto_cierre,
            $report->evaluacion_asesor_empresarial,
            $report->evaluacion_asesor_academico,
        ], $actividades_realizadas, [
            $this->formatBoolean($report->amonestacion_academica1),
            $this->formatBoolean($report->amonestacion_academica2),
            $this->formatBoolean($report->gestion_empresarial1),
            $this->formatBoolean($report->gestion_empresarial2),
            $report->nombre_asesor,
            $report->correo_asesor,
            $report->titulo_memoria,
            $report->observaciones,
        ]);
    }

    public function headings(): array
    {
        // Encabezados estáticos
        $headings = [
            'Matrícula',
            'Nombre del Alumno',
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
        ];

        // Agregar encabezados dinámicos para las actividades realizadas
        $headings = array_merge($headings, $this->dynamicActivityHeadings);

        // Encabezados estáticos restantes
        $headings = array_merge($headings, [
            'Amonestación Académica 1',
            'Amonestación Académica 2',
            'Gestión Empresarial 1',
            'Gestión Empresarial 2',
            'Nombre Asesor',
            'Correo Asesor',
            'Título de la Memoria',
            'Observaciones',
        ]);

        return $headings;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:W1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFCCCCCC'],
            ],
        ]);
    }

    private function formatBoolean($value)
    {
        return $value ? 'Sí' : 'No';
    }

    private function getDynamicActivityHeadings()
    {
        // Obtener encabezados únicos de actividades realizadas
        return array_unique($this->encabezados_actividades);
    }
}
