<?php

use function Livewire\Volt\{state, computed, Layout};
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Branch;

new #[Layout('layouts.app')] class extends Component
{
     #[state]
    public $branches = [];

    // Fetch the branches from the database
    public function mount()
    {
        $this->branches = Branch::all();
    }

 }
?>

<div>
    <x-mary-header title="Branches">
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" tooltip="Add Branch" />
        </x-slot:actions>
    </x-mary-header>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>

                    <th>Branch Name</th>
                    <th>Branch Location</th>
                    <th>No. of Employees</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($branches as $branch)
                    <tr>
                        <td>{{ $branch->branchName }}</td>
                        <td>{{ $branch->branchLoc }}</td>
                        <td>{{ $branch->no_of_employee }}</td>
                    </tr>
          @endforeach
            </tbody>
        </table>
    </div>
</div>
