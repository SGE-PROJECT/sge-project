<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectsTest>
 */
class ProjectsTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true), // Genera un nombre de proyecto de 3 palabras
            'status' => $this->faker->randomElement(['active', 'inactive', 'pending']), // Estado aleatorio
            'general_information' => json_encode([
                'description' => $this->faker->sentence,
                'start_date' => $this->faker->date,
                'end_date' => $this->faker->date,
                'budget' => $this->faker->randomNumber(2),
            ]),
            'id_main_student_id' => $this->faker->numberBetween(1,9),
            'id_collaborative_student_id' => $this->faker->numberBetween(1, 9),
        ];
    }
}
