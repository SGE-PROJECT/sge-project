<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project_likes>
 */
class ProjectLikesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'academic_advisor_id' => $this -> faker -> numberBetween(1, 20),
            'project_id' => $this -> faker -> numberBetween(1, 20),
        ];
    }
}
