<?php

namespace App\Livewire\Manager;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.manager')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.manager.dashboard');
    }
}
