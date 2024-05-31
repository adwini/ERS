<?php

namespace App\Livewire\Manager\DashboardComponents;

use Livewire\Component;
use App\Models\User;

class AddEmployee extends Component
{
    public function render()
    {
        return view('livewire.manager.dashboard-components.add-employee');
    }

    public $name = '';
    public $email = '';
    public $number = '';
    public $no_of_tokens = '';
    public $position = '';
    public $password = '';

    public function addUser() {

        $validated = $this->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|max:255|unique:users',
            'number' => 'required|string|max:255|unique:users',
            'no_of_tokens' => 'required|integer',
            'position' => 'required|string|max:255',
            'password' => 'required|string|max:255|min:6',
        ]);
        User::create($validated);
        session()->flash('success', 'Branch Added Successfully.');
        $this->reset();
    }
}
