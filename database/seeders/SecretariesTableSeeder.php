<?php

namespace Database\Seeders;

use App\Models\Secretary;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SecretariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SecretaryUser = Secretary::create([
            'user_id' => 31,
            'payrol' => '1111',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser1 = Secretary::create([
            'user_id' => 32,
            'payrol' => '2222',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser2 = Secretary::create([
            'user_id' => 33,
            'payrol' => '3333',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser3 = Secretary::create([
            'user_id' => 34,
            'payrol' => '4444',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser4 = Secretary::create([
            'user_id' => 35,
            'payrol' => '5555',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser5 = Secretary::create([
            'user_id' => 36,
            'payrol' => '6666',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser6 = Secretary::create([
            'user_id' => 37,
            'payrol' => '7777',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser7 = Secretary::create([
            'user_id' => 38,
            'payrol' => '8888',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser8 = Secretary::create([
            'user_id' => 39,
            'payrol' => '9999',
            'division_id' => 1,
            'created_at' => now()
        ]);

        $SecretaryUser9 = Secretary::create([
            'user_id' => 40,
            'payrol' => '0000',
            'division_id' => 1,
            'created_at' => now()
        ]);

    }
}
