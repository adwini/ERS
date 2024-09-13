<?php

namespace App\Livewire\Manager\DashboardComponents;

use Livewire\Component;
use App\Models\User;

class GetEmployee extends Component
{
    public function render()
    {
        return view('livewire.manager.dashboard-components.get-employee');
    }

    public $getUsers = [];
    public function mount(User $user) {
        //Pangitaon lang user nga same sa Branch_ID
        //Wa pa na butangan ug Branch_ID and DB. Butangi sa Models/Migrations ug seeders
        $this->getUsers = User::find($user);
    }
}
