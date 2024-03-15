<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->count(20)->create();
    }
}

/*
Utiliza la fabrica 'ProjectsFactory' para generar datos de prueba

php artisan db:seed --class=ProjectsTableSeeder

*/
