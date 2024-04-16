<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $academy = new Academy();
        $academy->name = 'Tecnologías de la información';
        $academy->save();

        $academy = new Academy();
        $academy->name = 'Mantenimiento';
        $academy->save();

    }
}
