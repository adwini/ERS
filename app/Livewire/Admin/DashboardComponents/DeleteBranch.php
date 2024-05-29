<?php

namespace App\Livewire\Admin\DashboardComponents;

use App\Models\Branch;
use Livewire\Component;

class DeleteBranch extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-components.delete-branch');
    }

    public function deleteBranch(Branch $branch) {
        $branch->delete();
        session()->flash('success', 'Branch Deleted Successfully.');
        return $this->redirect('/branches', navigate:true);
    }
}
