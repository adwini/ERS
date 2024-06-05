<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Lazy]

#[Layout('layouts.app')]
class Voting extends Component
{
    public function render()
    {
        return view('livewire.admin.voting');
    }
        public function placeholder(){
        return view ('skeleton');
    }

    // public $name = '';
    // public $sick_leave;
    // public $vacation_leave;
    // public $awol;

    public $attendace_report = [];

    public function mount() {
        
    }
}
