<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'branchName',
        'branchLoc',
        'no_of_employee',
        'no_of_token_available'
    ];


    public function tokens()
    {
        return $this->hasMany(Tokens::class);
    }
}
