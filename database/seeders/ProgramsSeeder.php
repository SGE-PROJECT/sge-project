<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\management\Program;
use App\Models\management\ProgramImage;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = [
            // Ingeniería y Tecnología, suponiendo que el ID de esta división es 1
            [
                'division_id' => 1,
                'programs' => [
                    [
                        'name' => 'TSU en Mantenimiento área Instalaciones*',
                        'description' => 'Descripción TSU en Mantenimiento área Instalaciones.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Mantenimiento área Naval*',
                        'description' => 'Descripción TSU en Mantenimiento área Naval.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Tecnologías de la Información área Desarrollo de Software Multiplataforma*',
                        'description' => 'Descripción TSU en área Desarrollo de Software Multiplataforma.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Tecnologías de la Información área Infraestructura de Redes Digitales*',
                        'description' => 'Descripción TSU en área Infraestructura de Redes Digitales.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Ingeniería en Mantenimiento Industrial*',
                        'description' => 'Descripción Ingenieria en Mantenimiento.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Ingeniería en Desarrollo y Gestión de Software*',
                        'description' => 'Descripción ingeniería en Desarrollo y Gestión de Software',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Ingeniería en Redes Inteligentes y Ciberseguridad*',
                        'description' => 'Descripción Ingeniería en Redes Inteligentes y Ciberseguridad.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                ],
            ],
            // Económico Administrativo, suponiendo que el ID de esta división es 2
            [
                'division_id' => 2,
                'programs' => [
                    [
                        'name' => 'TSU en Administración área Capital Humano*',
                        'description' => 'Descripción TSU en Administración área Capital Humano.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Desarrollo de Negocios área Mercadotecnia*',
                        'description' => 'Descripción TSU en Desarrollo de Negocios área Mercadotecnia.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Contaduría*',
                        'description' => 'Descripción TSU en Contaduría.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Licenciatura en Gestión del Capital Humano*',
                        'description' => 'Descripción Licenciatura en Gestión del Capital Humano',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Licenciatura en Innovación de Negocios y Mercadotecnia*',
                        'description' => 'Descripción Licenciatura en Innovación de Negocios y Mercadotecnia',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Licenciatura en Contaduría*',
                        'description' => 'Descripción Licenciatura en Contaduría',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                ],
            ],
            // Continúa con las otras divisiones...
            [
                'division_id' => 3, // Asegúrate de ajustar este ID según tu base de datos
                'programs' => [
                    [
                        'name' => 'TSU en Turismo área Desarrollo de Productos Alternativos*',
                        'description' => 'Preparación en la creación y gestión de productos turísticos innovadores y sostenibles.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Turismo área Hotelería*',
                        'description' => 'Formación en gestión hotelera, operaciones y servicios de alojamiento turístico.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Licenciatura en Gestión y Desarrollo Turístico*',
                        'description' => 'Estudios enfocados en el desarrollo, promoción y gestión de destinos turísticos y empresas del sector.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                ],
            ],
            [
                'division_id' => 4, // Asegúrate de ajustar este ID según tu base de datos
                'programs' => [
                    [
                        'name' => 'TSU en Gastronomía*',
                        'description' => 'Formación en técnicas culinarias, servicio y gestión de establecimientos gastronómicos.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'Licenciatura en Gastronomía*',
                        'description' => 'Estudios avanzados en gastronomía, incluyendo cocina internacional, gestión de restaurantes y nutrición.',
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31',
                    ],
                ],
            ],
                        

        ];

        foreach ($carreras as $division) {
            foreach ($division['programs'] as $programData) {
                $program = Program::create([
                    'name' => $programData['name'],
                    'description' => $programData['description'],
                    'division_id' => $division['division_id'],
                    'start_date' => $programData['start_date'],
                    'end_date' => $programData['end_date'],
                ]);

                // Añadir imagen por defecto
                ProgramImage::create([
                    'program_id' => $program->id,
                    'image_path' => 'images/program/General.jpg',
                ]);
            }
        }
    }
}
