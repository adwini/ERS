<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportExcel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_reports = [
            [
                'name' => 'Christian Perez',
                'date_hired' => '2021-01-12',
                'sick_leave' => 1,
                'vacation_leave' => 2,
                'awol' => 4,
                'total_absents' => 7,
            ],
            [
                'name' => 'Jude Cadavez',
                'date_hired' => '2021-05-12',
                'sick_leave' => 0,
                'vacation_leave' => 1,
                'awol' => 2,
                'total_absents' => 3,
            ],
            [
                'name' => 'Janice Devela',
                'date_hired' => '2022-04-12',
                'sick_leave' => 2,
                'vacation_leave' => 0,
                'awol' => 0,
                'total_absents' => 2,
            ],
            [
                'name' => 'Stephine Arnan',
                'date_hired' => '2023-06-12',
                'sick_leave' => 1,
                'vacation_leave' => 2,
                'awol' => 4,
                'total_absents' => 7,
            ],
            [
                'name' => 'Kim Tuñacao',
                'date_hired' => '2024-01-12',
                'sick_leave' => 3,
                'vacation_leave' => 1,
                'awol' => 0,
                'total_absents' => 4,
            ],
            [
                'name' => 'Elmer John Alcano',
                'date_hired' => '2022-01-15',
                'sick_leave' => 0,
                'vacation_leave' => 1,
                'awol' => 0,
                'total_absents' => 1,
            ],
            [
                'name' => 'Kristine Gilbuena',
                'date_hired' => '2022-10-12',
                'sick_leave' => 0,
                'vacation_leave' => 2,
                'awol' => 1,
                'total_absents' => 3,
            ],
            [
                'name' => 'Kylle Agustine Lumosud',
                'date_hired' => '2023-09-12',
                'sick_leave' => 3,
                'vacation_leave' => 3,
                'awol' => 4,
                'total_absents' => 10,
            ],
            [
                'name' => 'Jessa Gonzales',
                'date_hired' => '2024-02-16',
                'sick_leave' => 2,
                'vacation_leave' => 1,
                'awol' => 3,
                'total_absents' => 6,
            ],
            [
                'name' => 'Reggie Rose Sudaria',
                'date_hired' => '2022-10-12',
                'sick_leave' => 1,
                'vacation_leave' => 1,
                'awol' => 0,
                'total_absents' => 2,
            ],
            [
                'name' => 'John Francis Mondeñedo',
                'date_hired' => '2022-12-01',
                'sick_leave' => 3,
                'vacation_leave' => 0,
                'awol' => 2,
                'total_absents' => 5,
            ],
            [
                'name' => 'Harvey Avenido',
                'date_hired' => '2022-08-19',
                'sick_leave' => 3,
                'vacation_leave' => 1,
                'awol' => 2,
                'total_absents' => 6,
            ],
        ];
        DB::table('attendace_import')->insert($employee_reports);
    }
}
