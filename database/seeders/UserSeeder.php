<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class UserSeeder extends Seeder
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
            'no_of_tokens' => 0,
            'roles' => 'General Manager',
            'password' => Hash::make('password'),
        ]);
    }
}