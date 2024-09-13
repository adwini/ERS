<?php

namespace App\Livewire\Manager;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.manager')]
class Voting extends Component
{
    public function render()
    {
        return view('livewire.manager.voting');
    }
}
