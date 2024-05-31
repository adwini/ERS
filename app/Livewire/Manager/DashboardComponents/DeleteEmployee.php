<?php

namespace App\Livewire\Manager\DashboardComponents;

use Livewire\Component;
use App\Models\User;

class DeleteEmployee extends Component
{
    public function render()
    {
        return view('livewire.manager.dashboard-components.delete-employee');
    }

    public function deleteUser(User $user) {
        $user->delete();
        session()->flash('success', 'User Deleted Successfully.');
        return $this->redirect('/users', navigate:true);
    }
}
