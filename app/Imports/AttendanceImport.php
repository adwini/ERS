<?php

namespace App\Imports;

use App\Models\EmpAttendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class AttendanceImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new EmpAttendance([
            'name' => $row['name'],
            'date_hired' =>
            Carbon::parse($row['date_hired'])->format('Y-m-d'),
            'sick_leave' => $row['sick_leave'],
            'vacation_leave' => $row['vacation_leave'],
            'awol' => $row['awol'],
            'total_absents' => $row['total_absents'],
        ]);
    }
}
