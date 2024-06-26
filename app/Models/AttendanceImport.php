<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttandanceImport extends Model
{
    use HasFactory;

    protected $table = 'importExcel';

    protected $fillable = [
        'name',
        'date_hired',
        'sick_leave',
        'vacation_leave',
        'awol',
        'total_absents',
    ];

    protected $cast = [
        'date_hired' => 'date:m-d-Y',
    ];
}
