<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\AddBranchForm;
use App\Models\Branch;
use Livewire\WithPagination;

new class extends Component {

    use Livewire\WithPagination;


     public $headers = [
        ['key' => 'branchName', 'label' => 'Branch Name'],
        ['key' => 'branchLoc', 'label' => 'Location'],
        ['key' => 'no_of_employee', 'label' => 'Number of Employee'],
        ['key' => 'no_of_token_available', 'label' => 'Total Tokens'],
        // ['key' => ' ', 'label' => 'Actions', 'class'=>'text-xl font-bold text-white']

        // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    ];
    public $perPage = 10;
    public $branches = [];
    public bool $addModal = false;

    public $search = '';

    public $branchName = '';
    public $branchLoc = '';
    public $no_of_employee = '';
     public $pagination = '';

    public AddBranchForm $form;

      public function mount()
    {
        $this->branches = Branch::all() ;
    }

    public function save() {
        $this->form->store();
        $this->addModal = false;
        $this-> redirect('/voting', navigate:true);
     }


     public function resetForm()
    {
        $this->reset(['branchLoc','branchName','no_of_employee']);

        $this->resetErrorBag();
    }
     public function cancel()
    {
        $this->resetForm();
        $this->addModal = false;
    }

    public function updatedAddModal($value)
    {
        if (!$value) {
            $this->resetForm();
            $this->resetErrorBag();
        }
    }


}; ?>

<div>

    <x-mary-header title=" " subtitle=" ">
    <x-slot:middle class="!justify-end">
        <x-mary-input icon="o-magnifying-glass" placeholder="Search..." />
    </x-slot:middle>
       <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" tooltip="Add Branch" @click="$wire.addModal = true" />
        </x-slot:actions>
</x-mary-header>

<x-mary-table :headers="$headers" :rows="$branches" striped @row-click="alert($event.detail.name)" >
     @scope('header_branchName', $header)
     <h2 class="text-xl font-bold text-white">
        {{ $header['label'] }}
     </h2>
    @endscope
       @scope('header_branchLoc', $header)
     <h2 class="text-xl font-bold text-white">
        {{ $header['label'] }}
     </h2>
    @endscope
       @scope('header_no_of_employee', $header)
     <h2 class="text-xl font-bold text-white">
        {{ $header['label'] }}
     </h2>
    @endscope
       @scope('header_no_of_token_available', $header)
     <h2 class="text-xl font-bold text-white">
        {{ $header['label'] }}
     </h2>
    @endscope

    {{-- @scope('actions', $branch)
        <x-mary-button icon="o-trash" wire:click="delete({{ $branch->id }})" spinner class="btn-sm" />
    @endscope --}}




</x-mary-table>

<x-mary-modal wire:model="addModal" persistent class="backdrop-blur">
    <x-mary-form wire:submit.prevent="save">
        <x-mary-input label="Branch Name" wire:model="form.branchName" class=""/>
        <x-mary-input label="Branch Location" wire:model="form.branchLoc" />
        <x-mary-input label="Number of Employees" wire:model="form.no_of_employee"/>


        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.call('cancel')" />
            <x-mary-button label="Add" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-mary-form>
</x-mary-modal>

</div>
