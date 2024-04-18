<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BooksExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $data;
 
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Nu. Estudiante',
            'Nu. Libro',
            'Nombre del estudiante',
            'Matrícula',
            'Fecha de la donación',
            'Precio del libro',
            'Titulo',
            'Autor',
            'Carrera',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para los encabezados de la fila 1
            1    => ['font' => ['bold' => true]],
        ];
    }
}
