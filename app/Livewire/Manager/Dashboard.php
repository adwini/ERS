<?php

namespace App\Livewire\Manager;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.manager')]
class Dashboard extends Component
{

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

      public function deleteUser(User $user) {
        $user->delete();
        session()->flash('success', 'User Deleted Successfully.');
        return $this->redirect('/users', navigate:true);
    }


    public function render()
    {
        return view('livewire.manager.dashboard');
    }


}
