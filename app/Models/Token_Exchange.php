<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token_Exchange extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'tokenId',
        'prizeId',
        'dateExchanged',
    ];

    public function tokens()
    {
        return $this->belongsTo(Tokens::class);
    }

    public function prizes() 
    {
        return $this->belongsTo(Prizes::class);
    }
}
