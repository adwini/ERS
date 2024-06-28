<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_hired',
        'sick_leave',
        'vacation_leave',
        'awol',
        'total_absents',
    ];
}
