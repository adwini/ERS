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

        $users = [
            [
                'name' => 'thesis1',
                'email' => 'manager@example.com',
                'number' => '09123456789',
                'no_of_tokens' => 0,
                'position' => 'Manager',
                'password' => Hash::make('password'),

            ],
            [
                'name' => 'thesis2',
                'email' => 'employee@example.com',
                'number' => '09123456789',
                'no_of_tokens' => 0,
                'position' => 'Hr',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jan Balbon',
                'email' => 'hrjan@example.com',
                'number' => '09123456789',
                'no_of_tokens' => 0,
                'position' => 'Hr',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Godwin',
                'email' => 'admin@example.com',
                'number' => '09123456789',
                'no_of_tokens' => 0,
                'position' => 'Admin',
                'password' => Hash::make('password'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
