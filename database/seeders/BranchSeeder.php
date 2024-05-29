<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branch = [
            [
                'branchName' => 'Sogod Branch',
                'branchLoc' => 'Sogod Cebu',
                'no_of_employee' => 100,
                'no_of_token_available' => 1000
            ],
            [
                'branchName' => 'Catmon Branch',
                'branchLoc' => 'Catmon Cebu',
                'no_of_employee' => 200,
                'no_of_token_available' => 2000
            ],
            [
                'branchName' => 'Carmen Branch',
                'branchLoc' => 'Carmen Cebu',
                'no_of_employee' => 300,
                'no_of_token_available' => 3000
            ],
            [
                'branchName' => 'Danao Branch',
                'branchLoc' => 'Danao City Cebu',
                'no_of_employee' => 400,
                'no_of_token_available' => 4000
            ],
        ];

        DB::table('branches')->insert($branch);
    }
}
