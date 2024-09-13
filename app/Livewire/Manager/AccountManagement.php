<?php

namespace App\Livewire\Manager;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.manager')]
class AccountManagement extends Component
{
    public function render()
    {
        return view('livewire.manager.account-management');
    }
}
