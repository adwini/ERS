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

        <x-mary-menu-item title="Dashboard" icon="o-bars-3-center-left" link="/dashboard" />
        <x-mary-menu-sub title="Modify Branches" icon="o-cog">
            <x-mary-menu-item title="Branch List" icon="o-clipboard-document-list" link="/branch-list" />
        </x-mary-menu-sub>
        <x-mary-menu-item title="Add Token" icon="o-squares-plus" link="/token" />
        <x-mary-menu-item title="Voting" icon="o-rectangle-group" link="/voting" />
        <x-mary-menu-item title="Logout" icon="o-power" wire:click='logout' />



    </x-mary-menu>

</div>
