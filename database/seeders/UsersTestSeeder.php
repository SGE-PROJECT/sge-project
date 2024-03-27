<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsersTest;
use Illuminate\Support\Facades\DB;

class UsersTestSeeder extends Seeder
{
    public function run()
    {
        DB::table('users_tests')->insert([
            ['first_name' => 'Guillermo', 'last_name' => 'Garcia', 'email' => 'john.doe@example.com', 'phone_number' => '1234567890', 'password' => bcrypt('password'), 'avatar' => 'avatar.jpg', 'isActive' => true],
            ['first_name' => 'Alonso', 'last_name' => 'Roano', 'email' => 'jane.doe@example.com', 'phone_number' => '0987654321', 'password' => bcrypt('password'), 'avatar' => 'avatar.jpg', 'isActive' => true],
            ['first_name' => 'Juan', 'last_name' => 'Villegas', 'email' => 'alice.smith@example.com', 'phone_number' => '1122334455', 'password' => bcrypt('password'), 'avatar' => 'avatar.jpg', 'isActive' => true],
            ['first_name' => 'Emmanuel', 'last_name' => 'Rojas Ceron', 'email' => 'bob.brown@example.com', 'phone_number' => '5566778899', 'password' => bcrypt('password'), 'avatar' => 'avatar.jpg', 'isActive' => true],
            ['first_name' => 'Angel', 'last_name' => 'Cochi', 'email' => 'bob.brown@example.com', 'phone_number' => '5566778899', 'password' => bcrypt('password'), 'avatar' => 'avatar.jpg', 'isActive' => true],
            ['first_name' => 'Andres', 'last_name' => 'Leyva', 'email' => 'bob.brown@example.com', 'phone_number' => '5566778899', 'password' => bcrypt('password'), 'avatar' => 'avatar.jpg', 'isActive' => true]
        ]);
    }
}