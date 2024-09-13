<?php

namespace App\Livewire\Employee;

use App\Models\User;
use App\Models\Voting;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.employee')]
class EmpVoting extends Component
{
    public function render()
    {
        return view('livewire.employee.emp_voting');
    }

    public $list_of_candidates = [];
    public $voted_for, $user_name, $department = '';

    public function votingRound1(){

        try{

        $user = Auth::user();
        $user_exist = Voting::where('user_name', $user->name)->exists();

        if($user_exist) {
            return 'You\'ve already voted!';
        }

        $this->validate([
            'voted_for' => 'required',
            'user_name'=> 'required',
            'department'=> 'required',
        ]);

        $create_vote = Voting::create([
            'voted_for' => $this->voted_for,
            'department' => $user->department
        ]);

        $users = new User();
        $users->voting()->save($create_vote);

        return 'Vote successfully recorded!';

    } catch (Exception $e) {
        dd($e);
    }


    }

    public function mount() {
        try {
        $user = Auth::user();
        $sorted_candidates = Voting::where('department', '=', $user->department)->get();

        return $sorted_candidates;

        } catch(Exception $e) {
            dd($e);
        }
    }
}
