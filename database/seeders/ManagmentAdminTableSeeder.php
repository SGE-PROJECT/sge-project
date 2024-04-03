<?php

namespace Database\Seeders;

use App\Models\ManagmentAdmin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ManagmentAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ManagmentAdminUser = ManagmentAdmin::create([
            'user_id' => 11,
            'payrol' => '1111',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser1 = ManagmentAdmin::create([
            'user_id' => 12,
            'payrol' => '2222',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser2 = ManagmentAdmin::create([
            'user_id' => 13,
            'payrol' => '3333',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser3 = ManagmentAdmin::create([
            'user_id' => 14,
            'payrol' => '4444',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser4 = ManagmentAdmin::create([
            'user_id' => 15,
            'payrol' => '5555',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser5 = ManagmentAdmin::create([
            'user_id' => 16,
            'payrol' => '6666',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser6 = ManagmentAdmin::create([
            'user_id' => 17,
            'payrol' => '7777',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser7 = ManagmentAdmin::create([
            'user_id' => 18,
            'payrol' => '8888',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser8 = ManagmentAdmin::create([
            'user_id' => 19,
            'payrol' => '9999',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $ManagmentAdminUser9 = ManagmentAdmin::create([
            'user_id' => 20,
            'payrol' => '0000',
            'division_id' => 1,
            'created_at' => now()
        ]);
    }
}
