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
        $this->branches = Branch::all();
    }

    public function save()
    {
        $this->form->store();
        $this->addModal = false;
        $this->redirect('/voting', navigate: true);
    }

    public function resetForm()
    {
        $this->reset(['branchLoc', 'branchName', 'no_of_employee']);

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

    {{-- <x-mary-table :headers="$headers" :rows="$branches" striped @row-click="alert($event.detail.name)">
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

    </x-mary-table> --}}

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Favorite Color</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr>
                    <th>1</th>
                    <td>Cy Ganderton</td>
                    <td>Quality Control Specialist</td>
                    <td>Blue</td>
                </tr>
                <!-- row 2 -->
                <tr class="hover">
                    <th>2</th>
                    <td>Hart Hagerty</td>
                    <td>Desktop Support Technician</td>
                    <td>Purple</td>
                </tr>
                <!-- row 3 -->
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                </tr>
            </tbody>
        </table>
    </div>



    {{-- <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Microsoft Surface Pro
                    </th>
                    <td class="px-6 py-4">
                        White
                    </td>
                    <td class="px-6 py-4">
                        Laptop PC
                    </td>
                    <td class="px-6 py-4">
                        $1999
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Magic Mouse 2
                    </th>
                    <td class="px-6 py-4">
                        Black
                    </td>
                    <td class="px-6 py-4">
                        Accessories
                    </td>
                    <td class="px-6 py-4">
                        $99
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}


    <x-mary-modal wire:model="addModal" persistent class="backdrop-blur">
        <x-mary-form wire:submit.prevent="save">
            <x-mary-input label="Branch Name" wire:model="form.branchName" class="" />
            <x-mary-input label="Branch Location" wire:model="form.branchLoc" />
            <x-mary-input label="Number of Employees" wire:model="form.no_of_employee" />


            <x-slot:actions>
                <x-mary-button label="Cancel" @click="$wire.call('cancel')" />
                <x-mary-button label="Add" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>

</div>
