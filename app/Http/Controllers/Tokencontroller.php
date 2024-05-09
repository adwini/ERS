<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokenModel;

class Tokencontroller extends Controller
{
    public function giveToken() {
        if(!Auth::check()) {
            return 'You are not logged in!';
        }

        
    }
}
