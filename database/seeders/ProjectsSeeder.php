<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 5 proyectos de ejemplo
        for ($i = 0; $i < 5; $i++) {
            Project::create([
                'fullname_student' => 'Nombre completo estudiante ' . ($i + 1),
                'id_student' => rand(10000000, 99999999),
                'group_student' => 'Grupo ' . ($i + 1),
                'phone_student' => rand(1000000000, 9999999999),
                'email_student' => 'estudiante' . ($i + 1) . '@example.com',
                'startproject_date' => now(),
                'endproject_date' => now()->addMonths(6),
                'name_project' => 'Proyecto ' . ($i + 1),
                'company_name' => 'Empresa ' . ($i + 1),
                'company_address' => 'Dirección de la empresa ' . ($i + 1),
                'advisor_business_name' => 'Asesor de la empresa ' . ($i + 1),
                'advisor_business_position' => 'Posición del asesor ' . ($i + 1),
                'advisor_business_phone' => rand(1000000000, 9999999999),
                'advisor_business_email' => 'asesor' . ($i + 1) . '@example.com',
                'project_area' => 'Área del proyecto ' . ($i + 1),
                'general_objective' => 'Objetivo general del proyecto ' . ($i + 1),
                'problem_statement' => 'Declaración del problema del proyecto ' . ($i + 1),
                'justification' => 'Justificación del proyecto ' . ($i + 1),
                'activities' => 'Actividades del proyecto ' . ($i + 1),
                'status' => 'Registrado',
                'is_project' => false,
            ]);
        }
    }
}
