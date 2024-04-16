<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            //Aquí van los grupos para el programa 1
            [
                'name' => 'SM11',
                'description' => 'Grupo 1 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
                'four-month-period' => 1,
            ],
            [
                'name' => 'SM22',
                'description' => 'Grupo 2 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
                'four-month-period' => 2,
            ],
            [
                'name' => 'SM33',
                'description' => 'Grupo 3 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
                'four-month-period' => 3,
            ],
            [
                'name' => 'SM44',
                'description' => 'Grupo 4 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
                'four-month-period' => 4,
            ],
            [
                'name' => 'SM55',
                'description' => 'Grupo 5 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 2

            [
                'name' => 'SM11',
                'description' => 'Grupo 1 de la carrera de Ingeniería en Sistemas',
                'program_id' => 2,
                'four-month-period' => 1,
            ],
            [
                'name' => 'SM22',
                'description' => 'Grupo 2 de la carrera de Ingeniería en Sistemas',
                'program_id' => 2,
                'four-month-period' => 2,

            ],
            [
                'name' => 'SM33',
                'description' => 'Grupo 3 de la carrera de Ingeniería en Sistemas',
                'program_id' => 2,
                'four-month-period' => 3,
            ],
            [
                'name' => 'SM44',
                'description' => 'Grupo 4 de la carrera de Ingeniería en Sistemas',
                'program_id' => 2,
                'four-month-period' => 4,

            ],
            [
                'name' => 'SM55',
                'description' => 'Grupo 5 de la carrera de Ingeniería en Sistemas',
                'program_id' => 2,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 3

            [
                'name' => 'SM11',
                'description' => 'Grupo 1 de la carrera de Ingeniería en Sistemas',
                'program_id' => 3,
                'four-month-period' => 1,
            ],
            [
                'name' => 'SM22',
                'description' => 'Grupo 2 de la carrera de Ingeniería en Sistemas',
                'program_id' => 3,
                'four-month-period' => 2,
            ],
            [
                'name' => 'SM33',
                'description' => 'Grupo 3 de la carrera de Ingeniería en Sistemas',
                'program_id' => 3,
                'four-month-period' => 3,
            ],
            [
                'name' => 'SM44',
                'description' => 'Grupo 4 de la carrera de Ingeniería en Sistemas',
                'program_id' => 3,
                'four-month-period' => 4,
            ],
            [
                'name' => 'SM55',
                'description' => 'Grupo 5 de la carrera de Ingeniería en Sistemas',
                'program_id' => 3,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 4

            [
                'name' => 'SM11',
                'description' => 'Grupo 1 de la carrera de Ingeniería en Sistemas',
                'program_id' => 4,
                'four-month-period' => 1,
            ],
            [
                'name' => 'SM22',
                'description' => 'Grupo 2 de la carrera de Ingeniería en Sistemas',
                'program_id' => 4,
                'four-month-period' => 2,
            ],
            [
                'name' => 'SM33',
                'description' => 'Grupo 3 de la carrera de Ingeniería en Sistemas',
                'program_id' => 4,
                'four-month-period' => 3,
            ],
            [
                'name' => 'SM44',
                'description' => 'Grupo 4 de la carrera de Ingeniería en Sistemas',
                'program_id' => 4,
                'four-month-period' => 4,
            ],
            [
                'name' => 'SM55',
                'description' => 'Grupo 5 de la carrera de Ingeniería en Sistemas',
                'program_id' => 4,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 5

            [
                'name' => 'Merca11',
                'description' => 'Grupo 1 de la carrera de Mercadotecnía',
                'program_id' => 5,
                'four-month-period' => 1,
            ],
            [
                'name' => 'Merca22',
                'description' => 'Grupo 2 de la carrera de Mercadotecnía',
                'program_id' => 5,
                'four-month-period' => 2,
            ],
            [
                'name' => 'Merca33',
                'description' => 'Grupo 3 de la carrera de Mercadotecnía',
                'program_id' => 5,
                'four-month-period' => 3,
            ],
            [
                'name' => 'Merca44',
                'description' => 'Grupo 4 de la carrera de Mercadotecnía',
                'program_id' => 5,
                'four-month-period' => 4,
            ],
            [
                'name' => 'Merca55',
                'description' => 'Grupo 5 de la carrera de Mercadotecnía',
                'program_id' => 5,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 6

            [
                'name' => 'Conta11',
                'description' => 'Grupo 1 de la carrera de Contabilidad',
                'program_id' => 6,
                'four-month-period' => 1,
            ],
            [
                'name' => 'Conta22',
                'description' => 'Grupo 2 de la carrera de Contabilidad',
                'program_id' => 6,
                'four-month-period' => 2,
            ],
            [
                'name' => 'Conta33',
                'description' => 'Grupo 3 de la carrera de Contabilidad',
                'program_id' => 6,
                'four-month-period' => 3,
            ],
            [
                'name' => 'Conta44',
                'description' => 'Grupo 4 de la carrera de Contabilidad',
                'program_id' => 6,
                'four-month-period' => 4,
            ],
            [
                'name' => 'Conta55',
                'description' => 'Grupo 5 de la carrera de Contabilidad',
                'program_id' => 6,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 7

            [
                'name' => 'Capital11',
                'description' => 'Grupo 1 de la carrera de Capital',
                'program_id' => 7,
                'four-month-period' => 1,
            ],
            [
                'name' => 'Capital22',
                'description' => 'Grupo 2 de la carrera de Capital',
                'program_id' => 7,
                'four-month-period' => 2,
            ],
            [
                'name' => 'Capital33',
                'description' => 'Grupo 3 de la carrera de Capital',
                'program_id' => 7,
                'four-month-period' => 3,
            ],
            [
                'name' => 'Capital44',
                'description' => 'Grupo 4 de la carrera de Capital',
                'program_id' => 7,
                'four-month-period' => 4,
            ],
            [
                'name' => 'Capital55',
                'description' => 'Grupo 5 de la carrera de Capital',
                'program_id' => 7,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 8

            [
                'name' => 'Productos11',
                'description' => 'Grupo 1 de la carrera de Turismo',
                'program_id' => 8,
                'four-month-period' => 1,
            ],
            [
                'name' => 'Productos22',
                'description' => 'Grupo 2 de la carrera de Turismo',
                'program_id' => 8,
                'four-month-period' => 2,
            ],
            [
                'name' => 'Productos33',
                'description' => 'Grupo 3 de la carrera de Turismo',
                'program_id' => 8,
                'four-month-period' => 3,
            ],
            [
                'name' => 'Productos44',
                'description' => 'Grupo 4 de la carrera de Turismo',
                'program_id' => 8,
                'four-month-period' => 4,
            ],
            [
                'name' => 'Productos55',
                'description' => 'Grupo 5 de la carrera de Turismo',
                'program_id' => 8,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 9

            [
                'name' => 'Hotelería11',
                'description' => 'Grupo 1 de la carrera de Turismo',
                'program_id' => 9,
                'four-month-period' => 1,
            ],
            [
                'name' => 'Hotelería22',
                'description' => 'Grupo 2 de la carrera de Turismo',
                'program_id' => 9,
                'four-month-period' => 2,
            ],
            [
                'name' => 'Hotelería33',
                'description' => 'Grupo 3 de la carrera de Turismo',
                'program_id' => 9,
                'four-month-period' => 3,
            ],
            [
                'name' => 'Hotelería44',
                'description' => 'Grupo 4 de la carrera de Turismo',
                'program_id' => 9,
                'four-month-period' => 4,
            ],
            [
                'name' => 'Hotelería55',
                'description' => 'Grupo 5 de la carrera de Turismo',
                'program_id' => 9,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 10

            [
                'name' => 'Terapia11',
                'description' => 'Grupo 1 de la carrera de Turismo',
                'program_id' => 10,
                'four-month-period' => 1,
            ],
            [
                'name' => 'Terapia22',
                'description' => 'Grupo 2 de la carrera de Turismo',
                'program_id' => 10,
                'four-month-period' => 2,
            ],
            [
                'name' => 'Terapia33',
                'description' => 'Grupo 3 de la carrera de Turismo',
                'program_id' => 10,
                'four-month-period' => 3,
            ],
            [
                'name' => 'Terapia44',
                'description' => 'Grupo 4 de la carrera de Turismo',
                'program_id' => 10,
                'four-month-period' => 4,
            ],
            [
                'name' => 'Terapia55',
                'description' => 'Grupo 5 de la carrera de Turismo',
                'program_id' => 10,
                'four-month-period' => 5,
            ],

            //Aquí van los grupos para el programa 11

            [
                'name' => 'Gastro11',
                'description' => 'Grupo 1 de la carrera de Turismo',
                'program_id' => 11,
                'four-month-period' => 1,

            ],
            [
                'name' => 'Gastro22',
                'description' => 'Grupo 2 de la carrera de Turismo',
                'program_id' => 11,
                'four-month-period' => 2,
            ],
            [
                'name' => 'Gastro33',
                'description' => 'Grupo 3 de la carrera de Turismo',
                'program_id' => 11,
                'four-month-period' => 3,
            ],
            [
                'name' => 'Gastro44',
                'description' => 'Grupo 4 de la carrera de Turismo',
                'program_id' => 11,
                'four-month-period' => 4,
            ],
            [
                'name' => 'Gastro55',
                'description' => 'Grupo 5 de la carrera de Turismo',
                'program_id' => 11,
                'four-month-period' => 5,
            ],

        ];

        foreach ($groups as $group) {
            \App\Models\Group::create($group);
        }


    }
}
