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
            ],
            [
                'branchName' => 'Catmon Branch',
                'branchLoc' => 'Catmon Cebu',
                'no_of_employee' => 200,
            ],
            [
                'branchName' => 'Carmen Branch',
                'branchLoc' => 'Carmen Cebu',
                'no_of_employee' => 300,
            ],
            [
                'branchName' => 'Danao Branch',
                'branchLoc' => 'Danao City Cebu',
                'no_of_employee' => 400,
            ],
            [
                'branchName' => 'Composetela Branch',
                'branchLoc' => 'Composetela Cebu',
                'no_of_employee' => 400,
            ],
            [
                'branchName' => 'Liloan Branch',
                'branchLoc' => 'Liloan Cebu',
                'no_of_employee' => 400,
            ],
            [
                'branchName' => 'Consolacion Branch',
                'branchLoc' => 'Consolacion Cebu',
                'no_of_employee' => 400,
            ],
            [
                'branchName' => 'Mandaue Branch',
                'branchLoc' => 'Mandaue City Cebu',
                'no_of_employee' => 400,
            ],
            [
                'branchName' => 'Cebu City Branch',
                'branchLoc' => 'Cebu City Cebu',
                'no_of_employee' => 400,
            ],
            [
                'branchName' => 'Lapu-Lapu Branch',
                'branchLoc' => 'Lapu-Lapu Cebu',
                'no_of_employee' => 400,
            ],
            [
                'branchName' => 'Talisay Branch',
                'branchLoc' => 'Talisay  Cebu',
                'no_of_employee' => 400,
            ],
        ];

        DB::table('branches')->insert($branch);
    }
}
