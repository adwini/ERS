<?php

namespace App\Livewire\Manager\DashboardComponents;

use Livewire\Component;
use App\Models\User;

class EditEmployee extends Component
{
    public function render()
    {
        return view('livewire.manager.dashboard-components.edit-employee');
    }

    public $user = '';
    public $name = '';
    public $email = '';
    public $number = '';
    public $position  = '';
    public $password = '';

    public function editUser(User $user) {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->number = $user->number;
        $this->position = $user->position;
        $this->password = $user->password;
    }

    public function updateUser(){

        $validated = $this->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|max:255|unique:users',
            'number' => 'required|string|max:255|unique:users',
            'position' => 'required|string|max:255',
            'password' => 'required|string|max:255|min:6',
        ]);
        $this->user->update($validated);
        session()->flash('success', 'User Updated Successfully.');
        //USBA LANG NI BOL, PASABOT ANI PARA NAA REFRESH SA PAGE. IKAW LANG PAG KUAN SA ROUTES SA VIEW.
        return $this->redirect('/users', navigate:true);
    }
}
