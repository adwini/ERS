<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokens extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'givenBy',
        'dateIssued',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function token_exchange()
    {
        return $this->hasOne(Token_Exchange::class);
    }
}
