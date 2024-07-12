<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.employee')]
class EmpVoting extends Component
{
    public function render()
    {
        return view('livewire.employee.emp_voting');
    }

    public function votingRound1(){
        
    }
}
