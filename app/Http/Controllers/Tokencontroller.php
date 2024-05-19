<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tokens;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class Tokencontroller extends Controller
{
    public function giveToken(Request $request, User $user) {

        if(!Auth::check()) {
            return response()->json(['message' => 'You are not logged in.'], 403);;
        }

        if(!Gate::any(['GenMan', 'Manager'], $user)){
            return response()->json(['message' => 'You are not authorize to give a token.'], 403);
        }

        $request->validate([
            'givenTo' => 'required|string|max:30',
        ]);

        $nameOfUser = Auth::user();

        $dateIssued = Carbon::now()->format('Y-m-d H:i:s');

        $token = Tokens::create([
            'givenTo' => $request->givenTo,
            'givenBy' => $nameOfUser->name,
            'dateIssued' => $dateIssued,
        ]);

        // get the name of the employee who will be given a token
        $nameGivenTo = $token->givenTo;

        // get all the token for the employee (objects)
        $overAllToken = Tokens::where('givenTo', $nameGivenTo)->get();
        // get all the token for the employee (in numbers)
        $numOfTokens = $overAllToken->count();

        // update to the latest number of the employees' token
        User::where('name', $nameGivenTo)->update(['no_of_tokens' => $numOfTokens]);
        // $user->toQuery()->update([
        //     'no_of_tokens' => $numOfTokens
        // ]);

        return response()->json(['message' => 'Token has been given!', 'data' => $numOfTokens], 200);
    }
}
