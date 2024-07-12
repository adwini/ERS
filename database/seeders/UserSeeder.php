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
                'name' => 'Rey Mark Barriga',
                'email' => 'reymark@example.com',
                'number' => '09123456789',
                'department' => '',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'MANAGER',
                'password' => Hash::make('password'),

            ],
            [
                'name' => 'Godwin Flores',
                'email' => 'employee@example.com',
                'number' => '09123456789',
                'department' => '',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jan Balbon',
                'email' => 'hrjan@example.com',
                'number' => '09123456789',
                'department' => '',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'HR',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Godwin Mat-ao',
                'email' => 'admin@example.com',
                'number' => '09123456789',
                'department' => '',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'ADMIN',
                'password' => Hash::make('password'),
            ], 
            [
                'name' => 'Christian Perez',
                'email' => 'christian@example.com',
                'number' => '09123456789',
                'department' => 'Software',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jude Cadavez',
                'email' => 'jude@example.com',
                'number' => '09123456789',
                'department' => 'Software',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Janice Devela',
                'email' => 'janice@example.com',
                'number' => '09123456789',
                'department' => 'Sales',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Stephine Arnan',
                'email' => 'stephine@example.com',
                'number' => '09123456789',
                'department' => 'Sales',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Kim Tuñacao',
                'email' => 'kim@example.com',
                'number' => '09123456789',
                'department' => 'Engineering',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Elmer John Alcano',
                'email' => 'elmer@example.com',
                'number' => '09123456789',
                'department' => 'Engineering',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Kristine Gilbuena',
                'email' => 'kristine@example.com',
                'number' => '09123456789',
                'department' => 'Support',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Kylle Agustine Lumosud',
                'email' => 'kylle@example.com',
                'number' => '09123456789',
                'department' => 'Support',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jessa Gonzales',
                'email' => 'jessa@example.com',
                'number' => '09123456789',
                'department' => 'Software',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Reggie Rose Sudaria',
                'email' => 'reggie@example.com',
                'number' => '09123456789',
                'department' => 'Sales',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'John Francis Mondeñedo',
                'email' => 'johnfrancis@example.com',
                'number' => '09123456789',
                'department' => 'Engineering',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Harvey Avenido',
                'email' => 'harvey@example.com',
                'number' => '09123456789',
                'department' => 'Support',
                'branch_id' => 1,
                'no_of_tokens' => 0,
                'position' => 'EMPLOYEE',
                'password' => Hash::make('password'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
