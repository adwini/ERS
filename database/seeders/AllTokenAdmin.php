<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AllTokenAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');
        $available_tokens = [
            'token_available' => 100000,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ];
        DB::table('total_token_admin')->insert($available_tokens);
    }
}
