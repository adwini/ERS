<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $table = 'voting';

    protected $fillable = [
        'voted_for',
        'user_name',
        'department'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
