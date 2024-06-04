<?php

namespace App\Livewire\Employee;


use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.employee')]

class EmpAccountSettings extends Component
{
    public function render()
    {
        return view('livewire.employee.emp_account-settings');
    }
}
