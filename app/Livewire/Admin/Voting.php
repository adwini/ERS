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
}
