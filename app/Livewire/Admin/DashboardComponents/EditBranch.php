<?php

namespace App\Livewire\Admin\DashboardComponents;

use App\Models\Branch;
use Livewire\Component;

class EditBranch extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-components.edit-branch');
    }

    public $branch;
    public $branchName = '';
    public $branchLoc = '';

    public function editBranch(Branch $branch) {
        $this->branch=$branch;
        $this->branchName=$branch->branchName;
        $this->branchLoc=$branch->branchLoc;
    }

    public function updateBranch(){

        $validated = $this->validate([
            'branchName' => 'required|max:255',
            'branchLoc' => 'required|max:255',
        ]);
        $this->branch->update($validated);
        session()->flash('success', 'Branch Updated Successfully.');
        //USBA LANG NI BOL, PASABOT ANI PARA NAA REFRESH SA PAGE. IKAW LANG PAG KUAN SA ROUTES SA VIEW.
        return $this->redirect('/branches', navigate:true);
    }

}
