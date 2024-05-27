<?php

use function Livewire\Volt\{state, computed, Layout};
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Branch;
use App\Livewire\Forms\AddBranchForm;


new #[Layout('layouts.app')] class extends Component
{
     #[state]
    public $branches = [];
    public bool $addModal = false;

    public $branchName = '';
    public $branchLoc = '';
    public $no_of_employee = '';

    public AddBranchForm $form;

    public $headers = [

        ['key' => 'branchName', 'label' => 'Branch Name'],
        ['key' => 'branchLoc', 'label' => 'Location'],
        ['key' => 'no_of_employee', 'label' => 'No. of Employee'],
        // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    ];


    // Fetch the branches from the database
    public function mount()
    {
        $this->branches = Branch::all();
    }

     public function save() {

        $validated = $this->validate([
            'branchName' => 'required|max:255',
            'branchLoc' => 'required|max:255',
            'no_of_employee'=>'required|int'
        ]);
        Branch::create($validated);
         $this->reset();
        $this->addModal = false;

       $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }





 }
?>

<div>
    <x-mary-header title="Branches">
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" tooltip="Add Branch" @click="$wire.addModal = true" />
        </x-slot:actions>
    </x-mary-header>

    {{-- <x-mary-table :headers="$headers" :rows="$branches" striped @row-click="alert($event.detail.name)" /> --}}


    {{-- <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>

                    <th>Branch Name              </th>
                    <th>        </th>
                    <th>No. of Employees         </th>
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
    </div> --}}


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Branch Name
                </th>
                <th scope="col" class="px-6 py-3">
                   Branch Location
                </th>
                <th scope="col" class="px-6 py-3">
                   No. of Employees
                </th>

            </tr>
        </thead>
        <tbody>
             @foreach ($branches as $branch)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $branch->branchName }}
                </th>
                <td class="px-6 py-4">
                 {{ $branch->branchLoc }}
                </td>
                <td class="px-6 py-4">
                 {{ $branch->no_of_employee }}
                </td>

          @endforeach
        </tbody>
    </table>
</div>


{{-- Modal for Adding a branch --}}
<x-mary-modal wire:model="addModal" class="backdrop-blur">
<x-mary-form wire:submit="save">
    <x-mary-input label="Branch Name" wire:model="branchName" class=""/>
    <x-mary-input label="Branch Location" wire:model="branchLoc" />
    <x-mary-input label="Number of Employees" wire:model="no_of_employee"/>


    <x-slot:actions>

    <x-mary-button label="Cancel" @click="$wire.addModal = false" />
   <x-mary-button label="Add" class="btn-primary" type="submit" spinner="save" />
    </x-slot:actions>
</x-mary-form>
</x-mary-modal>

</div>

