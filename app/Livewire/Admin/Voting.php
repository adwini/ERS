<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Voting extends Component
{
    public function render()
    {
        return view('livewire.admin.voting');
    }
}
