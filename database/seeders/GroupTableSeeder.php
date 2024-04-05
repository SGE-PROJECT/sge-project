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
            [
                'name' => 'SM51',
                'description' => 'Grupo 1 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
            ],
            [
                'name' => 'SM52',
                'description' => 'Grupo 2 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
            ],
            [
                'name' => 'SM53',
                'description' => 'Grupo 3 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
            ],
            [
                'name' => 'SM54',
                'description' => 'Grupo 4 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
            ],
            [
                'name' => 'SM55',
                'description' => 'Grupo 5 de la carrera de Ingeniería en Sistemas',
                'program_id' => 1,
            ],

        ];

        foreach ($groups as $group) {
            \App\Models\Group::create($group);
        }


    }
}
