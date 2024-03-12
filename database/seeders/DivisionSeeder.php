<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\management\Division;
use App\Models\management\Division_image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear divisiones de ejemplo
        $divisiones = [
            [
                'name' => 'Turismo',
                'description' => 'Descripcion de Super Turismo',
            ],
            [
                'name' => 'Ingenieria',
                'description' => 'Descripcion de Super Ingenieria',
            ],
        ];

        foreach ($divisiones as $divisionData) {
            $division = Division::create($divisionData);

            $imageData = [
                'division_id' => $division->id,
                'image_path' => 'images/divisions/'. 'General' . '.jpg',
            ];
            Division_image::create($imageData);
        }
    }
}
