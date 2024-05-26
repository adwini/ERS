<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Mary\Traits\Toast;

use Livewire\Component;

class Dashboard extends Component
{
    use Toast;

    public string $search = '';

    public bool $drawer = false;

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    // Clear filters
    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    // Delete action
    public function delete($id): void
    {
        $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }
    public function render()
    {
        $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'branchName', 'label' => 'Branch Name'],
        ['key' => 'branchLoc', 'label' => 'Location'],
        ['key' => 'no_of_employee', 'label' => 'No. of Employee'],
        // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    ];
        return view('livewire.admin.dashboard', [


        ]);
    }
}
