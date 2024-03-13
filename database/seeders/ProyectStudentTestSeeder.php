<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyectStudentTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proyect_student_tests')->insert([
            ['id_Proyect_id' => 1, 'id_Student_id' => 1],
            ['id_Proyect_id' => 1, 'id_Student_id' => 2],
            ['id_Proyect_id' => 2, 'id_Student_id' => 3],
            ['id_Proyect_id' => 3, 'id_Student_id' => 4],
            ['id_Proyect_id' => 4, 'id_Student_id' => 5], 
            ['id_Proyect_id' => 4, 'id_Student_id' => 2], 
            ['id_Proyect_id' => 5, 'id_Student_id' => 3],
            ['id_Proyect_id' => 5, 'id_Student_id' => 6],
            ['id_Proyect_id' => 6, 'id_Student_id' => 1],
            ['id_Proyect_id' => 7, 'id_Student_id' => 2],
            ['id_Proyect_id' => 8, 'id_Student_id' => 6] 
        ]);
    }
}
