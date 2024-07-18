<?php

$headers = [
    ['key' => 'name', 'label' => 'NAME'],
    ['key' => 'department', 'label' => 'DEPARTMENT'],

    // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
];
?>
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    {{-- <livewire:globalComponents.attendance_upload /> --}}
    <x-mary-header title="Upload Employees">
        <x-slot:middle class="!justify-end">
            <form wire:submit.prevent="import" class="mb-4">
                <x-mary-file wire:model="file" accept=".xls,.xlsx" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-cloud-arrow-up" wire:click="import" class="btn-ghost" label="Upload" spinner />
        </x-slot:actions>
        </form>


    </x-mary-header>
    @if ($employees->isEmpty())
        <section>
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
                <div class="max-w-screen-sm mx-auto text-center">
                    <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 md:text-4xl dark:text-white">
                        No Attendance Found</p>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Please Import Attendance</p>
                </div>
            </div>
        </section>
    @else
        <x-mary-table :headers="$headers" :rows="$employees" :row-decoration striped with-pagination>

            @scope('header_name', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_department', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            {{-- @scope('header_sick_leave', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_vacation_leave', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_awol', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope
            @scope('header_total_absents', $header)
                <h2 class="text-sm font-bold text-neutral-400">
                    {{ $header['label'] }}
                </h2>
            @endscope --}}
        </x-mary-table>

    @endif
</div>
