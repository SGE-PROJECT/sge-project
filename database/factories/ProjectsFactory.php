<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this -> faker -> sentence(),
            'status' => $this -> faker -> randomElement(['Aprobado', 'Rechazado', 'En desarrollo', 'Finalizado']),
            'general_information' => $this -> faker -> paragraph(),
            'general_objective' => $this -> faker -> paragraph(),
            'problem_statement' => $this -> faker -> paragraph(),
            'justification' => $this -> faker -> paragraph(),
            'activities' => $this -> faker -> paragraph(),
            'program_id' => $this -> faker -> numberBetween(1, 10),
            'company_id' => $this -> faker -> numberBetween(1, 20),
            'start_date' => $this -> faker -> dateTimeBetween('-1 year', 'now'),
            'end_date' => $this -> faker -> dateTimeBetween('now', '+1 year'),
            'approved' => $this ->faker -> boolean(),
            'academic_advisor_id' => $this -> faker -> numberBetween(1, 50),
            'business_advisor_id'=> $this -> faker -> numberBetween(1, 50),
        ];
    }
}


//Se utilizara para llenar nuestros registros
//Primero se debe indicar el modelo que administra esa tabla

/*
Fábrica que generará datos de prueba para poblar la tabla 'projects'
con valores aleatorios
*/
