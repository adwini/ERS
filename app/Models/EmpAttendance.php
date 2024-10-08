<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch_id',
        'department',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
