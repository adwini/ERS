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

        <x-mary-menu-item title="Dashboard" icon="o-cube" link="/auth2/dashboard" />
        <x-mary-menu-item title="Account Management" icon="o-adjustments-vertical" link="/account/management" />
        <x-mary-menu-item title="Reward Distribution" icon="o-trophy" link="/rewards" />
        <x-mary-menu-item title="Voting" icon="o-users" link="/auth2/voting" />
        <x-mary-menu-item title="Account Settings" icon="o-wrench-screwdriver" link="/account/settings" />

        <x-mary-menu-item title="Logout" icon="o-power" wire:click='logout' />



    </x-mary-menu>

</div>
