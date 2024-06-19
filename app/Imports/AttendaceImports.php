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
            //
        ]);
    }
}
