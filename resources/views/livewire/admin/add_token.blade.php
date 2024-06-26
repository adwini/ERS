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

    <x-mary-header title="Token Distribution">
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-magnifying-glass" wire:model.live="search" clearable placeholder="Search..." />
        </x-slot:middle>

    </x-mary-header>

    @if ($branches->isEmpty())
        <section>
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
                <div class="max-w-screen-sm mx-auto text-center">
                    <p class="mb-4 text-3xl font-bold tracking-tight text-gray-500 dark:text-gray-400 md:text-4xl ">
                        Something's missing.</p>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we couldn't find any
                        branches matching your search criteria.</p>
                </div>
            </div>
        </section>
    @else
        <div class="mb-6 ">

            <p
                class="block w-full p-4 text-3xl font-semibold text-center text-gray-900 border border-gray-300 rounded-lg h-2/4 sm:text-lg dark:text-gray-400 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                TOTAL TOKEN: {{ $available_token }}
        </div>


        <x-mary-table :headers="$headers" :rows="$branches" :row-decoration striped
            @row-click="$wire.edit($event.detail.id)" with-pagination class="table">

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



        </x-mary-table>

    @endif
    {{-- Add Modal --}}
    <x-mary-modal wire:model="addModal" persistent class="backdrop-blur">

        <x-mary-form wire:submit.prevent="addToken">
            <x-mary-input type="hidden" wire:model="givenTo" />
            <x-mary-input label="Branch Name" wire:model="form.branchName" disabled />
            <x-mary-input label="Add Token" wire:model="no_of_tokens_given" omit-error hint="This field is required." />

            <x-slot:actions>

                <x-mary-button label="Cancel" link="/token" />
                <x-mary-button label="Add" class="btn-primary" type="submit" spinner="addToken" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>



</div>
