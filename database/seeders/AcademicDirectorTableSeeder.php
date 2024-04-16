<?php

namespace Database\Seeders;

use App\Models\AcademicDirector;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicDirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PresidentUser = AcademicDirector::create([
            'user_id' => 42,
            'payrol' => '1111',
            'division_id' => 1,
            'academy_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser1 = AcademicDirector::create([
            'user_id' => 43,
            'payrol' => '2222',
            'division_id' => 2,
            'created_at' => now()
        ]);

        $PresidentUser2 = AcademicDirector::create([
            'user_id' => 44,
            'payrol' => '3333',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser3 = AcademicDirector::create([
            'user_id' => 45,
            'payrol' => '4444',
            'division_id' => 3,
            'created_at' => now()
        ]);

        $PresidentUser4 = AcademicDirector::create([
            'user_id' => 46,
            'payrol' => '5555',
            'division_id' => 4,
            'created_at' => now()
        ]);

        $PresidentUser5 = AcademicDirector::create([
            'user_id' => 47,
            'payrol' => '6666',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $PresidentUser6 = AcademicDirector::create([
            'user_id' => 48,
            'payrol' => '7777',
            'division_id' => 2,
            'created_at' => now()
        ]);

        $PresidentUser7 = AcademicDirector::create([
            'user_id' => 49,
            'payrol' => '8888',
            'division_id' => 3,
            'created_at' => now()
        ]);

        $PresidentUser8 = AcademicDirector::create([
            'user_id' => 50,
            'payrol' => '9999',
            'division_id' => 4,
            'created_at' => now()
        ]);

        $PresidentUser9 = AcademicDirector::create([
            'user_id' => 51,
            'payrol' => '0000',
            'division_id' => 1,
            'created_at' => now()
        ]);
    }
}
