<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllTokens extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'token_available'
    ];
}
