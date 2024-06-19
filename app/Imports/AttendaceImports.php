<?php

namespace App\Imports;

use App\Models\AttandanceImport;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendaceImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AttandanceImport([
            'name' => $row[0],
            'date_hired' => $row[1],
            'sick_leave' => $row[2],
            'vacation_leave' => $row[3],
            'awol' => $row[4],
            'total_absents' => $row[5],
        ]);
    }
}
