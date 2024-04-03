<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectStudent;


class projectStudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectStudent::create([
            'project_id' => 1,
            'student_id' => 1,
            'is_main_student' => 1,
        ]);

        ProjectStudent::create([
            'project_id' => 2,
            'student_id' => 2,
            'is_main_student' => 0,
        ]);

        ProjectStudent::create([
            'project_id' => 3,
            'student_id' => 3,
            'is_main_student' => 1,
        ]);

        ProjectStudent::create([
            'project_id' => 4,
            'student_id' => 4,
            'is_main_student' => 0,
        ]);

        ProjectStudent::create([
            'project_id' => 5,
            'student_id' => 5,
            'is_main_student' => 1,
        ]);

        ProjectStudent::create([
            'project_id' => 1,
            'student_id' => 6,
            'is_main_student' => 0,
        ]);

        ProjectStudent::create([
            'project_id' => 2,
            'student_id' => 7,
            'is_main_student' => 1,
        ]);

        ProjectStudent::create([
            'project_id' => 3,
            'student_id' => 8,
            'is_main_student' => 0,
        ]);

        ProjectStudent::create([
            'project_id' => 4,
            'student_id' => 9,
            'is_main_student' => 1,
        ]);

        ProjectStudent::create([
            'project_id' => 5,
            'student_id' => 10,
            'is_main_student' => 0,
        ]);
    }
}
