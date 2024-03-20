<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\management\Division;
use App\Models\management\Division_image;

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
                'name' => 'Ingenieria y Tecnologia',
                'description' => 'Division de Ingenieria y Tecnologia',
            ],
            [
                'name' => 'Económico Administrativo',
                'description' => 'División Economico Administrativa',
            ],
            [
                'name'=> 'Turismo',
                'description'=> 'División de Turismo. ',
            ],
            [
                'name'=> 'Gastronomia',
                'description'=> 'División de Gastronomia. ',
            ]
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
