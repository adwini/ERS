<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllTokenAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $available_tokens = [
            'token_available' => 100000
        ];
        DB::table('total_token_admin')->insert($available_tokens);
    }
}
