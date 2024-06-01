<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.employee')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.employee.dashboard');
    }
}
