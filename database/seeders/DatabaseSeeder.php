<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Academy;
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
        $this->call(AcademyTableSeeder::class);
        $this->call(ProgramsSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(GroupsTableSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Storage::deleteDirectory('post');
        // Storage::makeDirectory('posts');


        $this->call(RoleSeeder::class);

        $this->call(GroupTableSeeder::class);


        $this->call(UserSeeder::class);
        $this->call(AcademicAdvisorTableSeeder::class);
        $this->call(AcademicDirectorTableSeeder::class);
        $this->call(ManagmentAdminTableSeeder::class);
        $this->call(SecretariesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(BusinessAdvisorTableSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(projectStudentsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
    }
}
