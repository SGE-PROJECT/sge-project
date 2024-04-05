<?php

namespace Database\Seeders;

use App\Models\BusinessAdvisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessAdvisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 0; $i < 5; $i++) {
            BusinessAdvisor::create([
                'name' => 'Asesor de la empresa ' . ($i + 1),
                'position' => 'Posición del asesor ' . ($i + 1),
                'phone' => rand(1000000000, 9999999999),
                'email' => 'asesor' . ($i + 1) . '@example.com',
            ]);
        }
    }
}
