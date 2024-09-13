<?php

$headers = [
    ['key' => 'branchName', 'label' => 'BRANCH NAME'],
    ['key' => 'branchLoc', 'label' => 'LOCATION'],
    ['key' => 'no_of_employee', 'label' => 'NUMBER OF EMPLOYEE'],
    ['key' => 'no_of_token_available', 'label' => 'TOTAL TOKEN'],

    // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
];
?>

<div>
    <x-mary-header title="Modify Branches">
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-magnifying-glass" wire:model.live="search" clearable placeholder="Search..." />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" tooltip="Add Branch" @click="$wire.addModal = true" />
        </x-slot:actions>
    </x-mary-header>
    @if ($branches->isEmpty())
        <section>
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
                <div class="max-w-screen-sm mx-auto text-center">
                    <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 md:text-4xl dark:text-white">
                        Something's missing.</p>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we couldn't find any
                        branches matching your search criteria.</p>
                </div>
            </div>
        </section>
    @else
        <x-mary-table :headers="$headers" :rows="$branches" :row-decoration striped
            @row-click="$wire.edit($event.detail.id)" with-pagination>

            @scope('header_branchName', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_branchLoc', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_no_of_employee', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_no_of_token_available', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope

            @scope('actions', $branch)
                <x-mary-button icon="o-trash" wire:click="delete({{ $branch->id }})"
                    wire:confirm="Are you sure you want to delete this branch?" spinner class="btn-sm btn-error" />
            @endscope
        </x-mary-table>

    @endif
    {{-- Add Modal --}}
    <x-mary-modal wire:model="addModal" persistent class="backdrop-blur">
        <x-mary-form wire:submit.prevent="save">
            <x-mary-input label="Branch Name" wire:model="form.branchName" class="" />
            <x-mary-input label="Branch Location" wire:model="form.branchLoc" />
            <x-mary-input label="Number of Employees" wire:model="form.no_of_employee" />


            <x-slot:actions>

                <x-mary-button label="Cancel" link="/branch-list" />
                <x-mary-button label="Add" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>


    {{-- Delete Modal --}}

    {{-- <div class="mt-4 mb-2" >
        {{ $search->links() }}
    </div> --}}

    {{-- Delete Modal  --}}



</div>
