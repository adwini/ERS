<?php

use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;

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



    </x-mary-menu>

</div>
