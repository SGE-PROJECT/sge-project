<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model\Project_students
 */
class ProjectStudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => $this -> faker -> numberBetween(1, 5),
            'student_id' => $this -> faker -> numberBetween(1, 10),
            'is_main_student' => $this -> faker -> numberBetween(1, 10),
        ];
    }
}
