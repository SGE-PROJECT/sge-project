<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $StudentUser1 = Student::create([
            'registration_number' => 22393201,
            'group_id' => 1,
            'user_id' => 1,
            'academic_advisor_id' => 1,
            'book_id' => 1,
            'created_at' => now()
        ]);

        $StudentUser2 = Student::create([
            'registration_number' => 22393202,
            'group_id' => 1,
            'user_id' => 2,
            'academic_advisor_id' => 2,
            'book_id' => 2,
            'created_at' => now()
        ]);

        $StudentUser3 = Student::create([
            'registration_number' => 22393203,
            'group_id' => 2,
            'user_id' => 3,
            'academic_advisor_id' => 3,
            'book_id' => 3,
            'created_at' => now()
        ]);

        $StudentUser4 = Student::create([
            'registration_number' => 22393204,
            'group_id' => 2,
            'user_id' => 4,
            'academic_advisor_id' => 4,
            'book_id' => 4,
            'created_at' => now()
        ]);

        $StudentUser5 = Student::create([
            'registration_number' => 22393205,
            'group_id' => 3,
            'user_id' => 5,
            'academic_advisor_id' => 5,
            'book_id' => 5,
            'created_at' => now()
        ]);

        $StudentUser6 = Student::create([
            'registration_number' => 22393206,
            'group_id' => 3,
            'user_id' => 6,
            'academic_advisor_id' => 6,
            'book_id' => 6,
            'created_at' => now()
        ]);

        $StudentUser7 = Student::create([
            'registration_number' => 22393207,
            'group_id' => 4,
            'user_id' => 7,
            'academic_advisor_id' => 7,
            'book_id' => 7,
            'created_at' => now()
        ]);

        $StudentUser8 = Student::create([
            'registration_number' => 22393208,
            'group_id' => 4,
            'user_id' => 8,
            'academic_advisor_id' => 8,
            'book_id' => 8,
            'created_at' => now()
        ]);

        $StudentUser9 = Student::create([
            'registration_number' => 22393209,
            'group_id' => 5,
            'user_id' => 9,
            'academic_advisor_id' => 9,
            'book_id' => 9,
            'created_at' => now()
        ]);

        $StudentUser10 = Student::create([
            'registration_number' => 22393210,
            'group_id' => 5,
            'user_id' => 10,
            'academic_advisor_id' => 10,
            'book_id' => 10,
            'created_at' => now()
        ]);

    }
}
