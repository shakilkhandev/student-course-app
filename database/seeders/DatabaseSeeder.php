<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('roles')->insert([
            ['name' => 'student'],
            ['name' => 'teacher'],
            ['name' => 'admin'],
        ]);
       
        DB::table('courses')->insert([
            ['name' => 'Math', 'description' => 'Math course'],
            ['name' => 'Science', 'description' => 'Science course'],
            ['name' => 'History', 'description' => 'History course'],

        ]);


        // Get the 'student' role
        $role = Role::where('name', 'student')->first();

        // Initialize Faker instance
        $faker = Faker::create();

        // Create 10 users with random names and assign the 'student' role
        for ($i = 0; $i < 10; $i++) {
            // Create a new user (Student)
            $user = User::create([
                'name' => $faker->name,  // Random name
                'email' => $faker->unique()->safeEmail,  // Unique email
                'role_id' => $role->id,  // Linking role_id to the 'student' role
            ]);

            // Create a new student record
            $student = new Student();
            $student->user_id = $user->id;
            $student->save();

            // Attach random courses (e.g., course IDs 1, 2, 3, 4...)
            $student->courses()->attach([1, 2]); // You can change course IDs as per your data
        }
    }
}
