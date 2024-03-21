<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DivisionSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(ProgramsSeeder::class);
        $this->call(CompaniesSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Storage::deleteDirectory('post');
        // Storage::makeDirectory('posts');


        $this->call(RoleSeeder::class);


        $this->call(UserSeeder::class);

        $this->call([
            UsersTestSeeder::class,
            ProjectsTestSeeder::class,
            ProjectsSeeder::class,
            ProyectStudentTestSeeder::class,
        ]);

    }
}
