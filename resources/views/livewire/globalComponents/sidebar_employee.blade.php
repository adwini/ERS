<?php

use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>

    <x-mary-menu activate-by-route>

        <x-mary-menu-item title="Dashboard" icon="o-cube" link="/usr/dashboard" />
        <x-mary-menu-item title="Rewards" icon="o-trophy" link="/usr/rewards" />
        <x-mary-menu-item title="Voting" icon="o-users" link="/usr/voting" />
        <x-mary-menu-item title="Account Settings" icon="o-wrench-screwdriver" link="/usr/settings" />
        <x-mary-menu-item title="Logout" icon="o-power" wire:click='logout' />

        @if (Auth::user()->position === 'HR')
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-300 dark:border-gray-700"">
                <x-mary-menu-item title="Upload Employee" icon="o-document-plus" link="/usr/attendance-upload" />
            </ul>
        @endif


    </x-mary-menu>




</div>
