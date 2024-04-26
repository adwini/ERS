<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'thesis1',
            'email' => 'thesis1@example.com',
            'number' => '09123456789',
            'birthdate' => '2024/04/27',
            'password' => Hash::make('password'),
        ]);
    }
}