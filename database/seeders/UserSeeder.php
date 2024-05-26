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
                'email' => 'thesis1@example.com',
                'number' => '09123456789',
                'no_of_tokens' => 0,
                'roles' => 'Manager',
                'password' => Hash::make('password'),

            ],
            [
                'name' => 'Jan Balbon',
                'email' => 'jan@example.com',
                'number' => '09123456789',
                'no_of_tokens' => 0,
                'roles' => 'Employee',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Godwin',
                'email' => 'test@example.com',
                'number' => '09123456789',
                'no_of_tokens' => 0,
                'roles' => 'Admin',
                'password' => Hash::make('password'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
