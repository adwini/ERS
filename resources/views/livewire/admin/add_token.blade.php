<?php

use App\Models\Branch;

$search = Branch::search($this->search)->paginate($this->page);

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

    @if ($search->isEmpty())
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
        <div class="max-w-screen-sm mx-auto mb-8 text-center lg:mb-16">
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-200">Total Token {{ $available_token }}
            </h2>
            {{-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> --}}
        </div>

        <x-mary-table :headers="$headers" :rows="$search" :row-decoration striped
            @row-click="$wire.edit($event.detail.id)" with-pagination>

            @scope('header_branchName', $header)
                <h2 class="text-sm font-bold text-gray-350">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_branchLoc', $header)
                <h2 class="text-sm font-bold text-gray-350">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_no_of_employee', $header)
                <h2 class="text-sm font-bold text-gray-350">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_no_of_token_available', $header)
                <h2 class="text-sm font-bold text-gray-350">
                    {{ $header['label'] }}
                </h2>
            @endscope



        </x-mary-table>

    @endif
    {{-- Add Modal --}}
    <x-mary-modal wire:model="addModal" persistent class="backdrop-blur">
        <x-mary-form wire:submit.prevent="addToken">
            <x-mary-input label="Branch Name" wire:model="form.branchName" disabled />
            <x-mary-input label="Add Token" wire:model="no_of_tokens_given" />
            <x-slot:actions>

                <x-mary-button label="Cancel" link="/token" />
                <x-mary-button label="Add" class="btn-primary" type="submit" spinner="addToken" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>



</div>
