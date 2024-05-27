<?php

namespace App\Livewire\Admin\DashboardComponents;

use App\Models\Branch;
use Livewire\Component;

class GetBranch extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-components.get-branch');
    }

    public $getBranches = [];
    public function mount() {
        $this->getBranches = Branch::all();
    }
}
