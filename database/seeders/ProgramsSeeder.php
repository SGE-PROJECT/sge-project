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
                        'name' => 'TSU en TI Área Desarrollo de Software Multiplataforma',
                        'description' => 'Descripción TSU en TI Área Desarrollo de Software Multiplataforma.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/pexels-lukas-574071.jpg',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en TI Área Infraestructura de Redes Digitales',
                        'description' => 'Descripción TSU en TI Área Infraestructura de Redes Digitales.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/redes.jpeg',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Mantenimiento Área Instalaciones',
                        'description' => 'Descripción TSU en Mantenimiento Área Instalaciones.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/pexels-kateryna-babaieva-2760241.jpg',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Mantenimiento Área Naval',
                        'description' => 'Descripción TSU en Mantenimiento Área Naval.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/pexels-david-mcelwee-16240659.jpg',
                        'end_date' => '2024-12-31',
                    ],
                ],
            ],
            // Económico Administrativo, suponiendo que el ID de esta división es 2
            [
                'division_id' => 2,
                'programs' => [
                    [
                        'name' => 'TSU en Desarrollo de Negocios Área Mercadotecnia',
                        'description' => 'Descripción TSU en Desarrollo de Negocios Área Mercadotecnia.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/pexels-alena-darmel-7710218.jpg',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Contaduría',
                        'description' => 'Descripción TSU en Contaduría.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/Conta_1.jpg',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Administración Área Capital Humano',
                        'description' => 'Descripción TSU en Administración Área Capital Humano.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/b910f4651295.jpg',
                        'end_date' => '2024-12-31',
                    ],
                ],
            ],
            // Continúa con las otras divisiones...
            [
                'division_id' => 3, // Asegúrate de ajustar este ID según tu base de datos
                'programs' => [
                    [
                        'name' => 'TSU en Turismo Área Desarrollo de Productos Alternativos',
                        'description' => 'Preparación en la creación y gestión de productos turísticos innovadores y sostenibles.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/ventas22-696x586.jpg',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Turismo Área en Hotelería',
                        'description' => 'Formación en gestión hotelera, operaciones y servicios de alojamiento turístico.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/hoteleria.jpg',
                        'end_date' => '2024-12-31',
                    ],
                    [
                        'name' => 'TSU en Terapia Física',
                        'description' => 'Estudios enfocados en el desarrollo, promoción y gestión de destinos turísticos y empresas del sector.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/bono-fisioterapia-pamplona.jpg',
                        'end_date' => '2024-12-31',
                    ],
                ],
            ],
            [
                'division_id' => 4, // Asegúrate de ajustar este ID según tu base de datos
                'programs' => [
                    [
                        'name' => 'TSU en Gastronomía',
                        'description' => 'Formación en técnicas culinarias, servicio y gestión de establecimientos gastronómicos.',
                        'start_date' => '2024-01-01',
                        'image_path' => 'images/program/gastronomia.jpg',
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
                    'image_path' => $programData['image_path'] ?? 'images/program/General.jpg',
                ]);
            }
        }
    }
}
