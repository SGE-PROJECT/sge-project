<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'name' => 'Grupo 1',
            'description' => 'Descripción del Grupo 1',
            'program_id' => 1, 
        ]);

        Group::create([
            'name' => 'Grupo 2',
            'description' => 'Descripción del Grupo 2',
            'program_id' => 1, 
        ]);

        Group::create([
            'name' => 'Grupo 3',
            'description' => 'Descripción del Grupo 3',
            'program_id' => 2, 
        ]);

        Group::create([
            'name' => 'Grupo 4',
            'description' => 'Descripción del Grupo 4',
            'program_id' => 2, 
        ]);

        Group::create([
            'name' => 'Grupo 5',
            'description' => 'Descripción del Grupo 5',
            'program_id' => 3, 
        ]);
    }
}
