<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokens extends Model
{
    use HasFactory;

    protected $table = 'tokens';
    protected $primaryKey = 'id';

    protected $fillable = [
        'givenTo',
        'dateIssued',
        'given_by',
        'no_of_tokens_given'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    // public function token_exchange()
    // {
    //     return $this->hasOne(Token_Exchange::class);
    // }
}
