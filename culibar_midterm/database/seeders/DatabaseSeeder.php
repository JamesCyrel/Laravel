<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StudentSeeder::class);

        User::factory()->create([
            'student_id' => 100000,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'course' => 'BSIT',
            'year_level' => '1st Year',
        ]);
    }
}
