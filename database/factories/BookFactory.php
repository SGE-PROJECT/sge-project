<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => '',
            'description' => '',
            'author' => $this->faker->name,
            'editorial' => $this->faker->company,
            'year_published' => $this->faker->year,
            'price' => $this->faker->numberBetween(300, 520),
            'image_book' => '',
            'state' => true,
        ];
        
    }
}
