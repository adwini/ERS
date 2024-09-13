<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total_token_admin extends Model
{
    use HasFactory;

    protected $table = 'total_token_admin';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'token_available'
    ];
}
