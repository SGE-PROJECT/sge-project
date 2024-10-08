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
        /*
        // Crear 5 proyectos de ejemplo
        for ($i = 0; $i < 6; $i++) {
            Project::create([
                'fullname_student' => 'Nombre completo estudiante ' . ($i + 1),
                'id_student' => ($i + 1),
                'group_student' => 'Grupo ' . ($i + 1),
                'phone_student' => rand(1000000000, 9999999999),
                'email_student' => 'estudiante' . ($i + 1) . '@example.com',
                'startproject_date' => now(),
                'endproject_date' => now()->addMonths(6),
                'name_project' => 'Proyecto ' . ($i + 1),
                'company_name' => 'Empresa ' . ($i + 1),
                'company_address' => 'Dirección de la empresa ' . ($i + 1),
                'business_advisor_id' => $i + 1,
                'project_area' => 'Área del proyecto ' . ($i + 1),
                'general_objective' => 'Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.',
                'problem_statement' => 'Declaración del problema del proyecto ' . ($i + 1),
                'justification' => 'Justificación del proyecto ' . ($i + 1),
                'activities' => 'Actividades del proyecto ' . ($i + 1),
                'status' => 'Registrado',
                'is_project' => false,
            ]);
        }

        $statuses = ['En curso', 'Finalizado', 'Reprobado', 'Aprobado'];

        for ($i = 0; $i < 5; $i++) {
            $randomStatus = $statuses[array_rand($statuses)];

            Project::create([
                'fullname_student' => 'Nombre estudiante ' . ($i + 1),
                'id_student' => ($i + 1),
                'group_student' => 'Sm ' . ($i + 1),
                'phone_student' => rand(1000000000, 9999999999),
                'email_student' => 'alumno' . ($i + 1) . '@example.com',
                'startproject_date' => now(),
                'endproject_date' => now()->addMonths(6),
                'name_project' => 'Proyectos ' . ($i + 1),
                'company_name' => 'Empresas ' . ($i + 1),
                'company_address' => 'Dirección empresa ' . ($i + 1),
                'business_advisor_id' => $i + 1,
                'project_area' => 'Área proyecto ' . ($i + 1),
                'general_objective' => 'Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.',
                'problem_statement' => 'Declaración del proyecto ' . ($i + 1),
                'justification' => 'Justificación del proyecto ' . ($i + 1),
                'activities' => 'Actividad del proyecto ' . ($i + 1),
                'status' => $randomStatus,
                'is_project' => true,
            ]);
        } */

        for ($i = 0; $i < 9; $i++) {
            $is_project = (bool)rand(0, 1);
            $status = (!$is_project) ? 'Registrado' : collect(['En curso', 'Finalizado', 'Reprobado', 'Aprobado'])->random();

            $projectNames = [
                'Niux - Comercio electrónico',
                'Melox Mix',
                'UTuri | Agencia de viajes',
                'Marings',
                'Astronet',
                'Salud Digna Bot',
                'Artesanos Web',
                'Mundo Óptico Web',
                'Chatbot para despegar!'
            ];

            $corporation = [
                'DotNet',
                'Firenow Solutions',
                'Dapper Tech',
                'Upnify',
                'Go1',
                'Monkey Software',
                'Ancona Autopartes',
                'Hilad Hotel',
                'Despegar'
            ];

            Project::create([
                'fullname_student' => 'Nombre completo estudiante ' . ($i + 1),
                'id_student' => ($i + 1),
                'group_student' => 'Grupo ' . ($i + 1),
                'phone_student' => rand(1000000000, 9999999999),
                'email_student' => 'estudiante' . ($i + 1) . '@example.com',
                'startproject_date' => now(),
                'endproject_date' => now()->addMonths(6),
                'name_project' => $projectNames[$i % count($projectNames)],
                'company_name' => $corporation[$i % count($corporation)],
                'company_address' => 'Dirección de la empresa ' . ($i + 1),
                'business_advisor_id' => $i + 1,
                'project_area' => 'Área del proyecto ' . ($i + 1),
                'general_objective' => 'Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que también ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.',
                'problem_statement' => 'Declaración del problema del proyecto ' . ($i + 1),
                'justification' => 'Justificación del proyecto ' . ($i + 1),
                'activities' => 'Actividades del proyecto ' . ($i + 1),
                'status' => $status,
                'is_project' => 0,
                'is_public' => 1,
            ]);
        }
    }
}
