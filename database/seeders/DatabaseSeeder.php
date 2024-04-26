<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'thesis1',
            'email' => 'thesis1@example.com',
            'number' => '09123456789',
            'birthdate' => '2024/04/27',
            'password' => Hash::make('password'),
        ]);
    }
}
