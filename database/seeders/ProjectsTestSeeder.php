<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectsTest;
use Illuminate\Support\Facades\DB;

class ProjectsTestSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects_tests')->insert([
            ['name' => 'Desarrollo de Software', 'status' => 'Active','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 1 details'])],
            ['name' => 'Investigación en IA', 'status' => 'Inactive','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 2 details'])],
            ['name' => 'Diseño UX/UI', 'status' => 'Active','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 3 details'])],
            ['name' => 'Desarrollo de Aplicación Móvil', 'status' => 'Active','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 4 details'])],
            ['name' => 'Implementación de Sistema de Gestión', 'status' => 'Active','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 4 details'])],
            ['name' => 'Diseño de Sitio Web', 'status' => 'Active','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 4 details'])],
            ['name' => 'Desarrollo de Plataforma E-commerce', 'status' => 'Active','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 4 details'])],
            ['name' => 'Implementación de Sistema de Automatización', 'status' => 'Active','image' => 'avatar.jpg', 'general_information' => json_encode(['detail' => 'Project 4 details'])]
        ]);
    }
}
