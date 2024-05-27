<?php

namespace App\Livewire\Admin\DashboardComponents;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Branch;


 class AddBranch extends Component
{

    public function render()
    {
        return view('livewire.admin.dashboard-components.add-branch');
    }

    //addBranch
    public $branchName = '';
    public $branchLoc = '';
    public $no_of_employee = 0;

    public function addBranch() {

        $validated = $this->validate([
            'branchName' => 'required|max:255',
            'branchLoc' => 'required|max:255',
        ]);
        Branch::create($validated);
        $this->reset();
    }

}
