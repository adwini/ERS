<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prizes extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'prizeName',
        'quantityAvailable',
        'pointsRequired'
    ];

    public function token_exchange_to_prizes() 
    {
        return $this->hasMany(Token_Exchange::class);
    }
}
