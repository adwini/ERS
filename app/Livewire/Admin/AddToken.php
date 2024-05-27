<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class AddToken extends Component
{
    public function render()
    {
        return view('livewire.admin.add_token');
    }
}
