<?php

namespace App\Livewire\Admin;

use App\Models\Branch;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class Dashboard extends Component
{


    public function render()
    {

        return view('livewire.admin.dashboard', [
            'branch'=> Branch::paginate(10),

        ]);
    }
}
