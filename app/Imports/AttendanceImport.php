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
            'branch_id' => $row['branch_id'],
            'department' => $row['department'],
        ]);
    }
}
