<?php

use Livewire\Volt\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendaceImports;
use Livewire\WithFileUploads;

new class extends Component {
    public $attandance_import;

    public function import()
    {
        try {
            dd('Okay!');
            Excel::import(new AttendaceImports(), $this->attandance_import);
            // dd('Okay!');
        } catch (Exception $e) {
            dd($e);
        }
        // return redirect('/')->with('success', 'All Good!');
    }
}; ?>

<div>
    <x-mary-header title="Upload Employees">
        <x-slot:middle class="!justify-end">
            <x-mary-file wire:model=" " accept=".xls,.xlsx" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-cloud-arrow-up" wire:click="import" class="btn-ghost" label="Upload" spinner />
        </x-slot:actions>


    </x-mary-header>



</div>



{{-- <div class="flex items-center justify-center w-full">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
        </label>
    </div> --}}




{{-- <div class="flex flex-col items-center justify-center w-full max-w-lg mt-10">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-80 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 dark:hover:border-gray-500">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="36"
                    height="36">
                    <path fill-rule="evenodd"
                        d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>



                <p class="mt-4 mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Excel files only (XLS, XLSX)</p>
            </div>
            <form wire:submit="import">
                <input id="dropzone-file" type="file" accept=".xls,.xlsx" class="hidden" />
            </form>
        </label>
        <button type="submit"
            class="px-4 py-2 mt-6 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Upload</button>
    </div> --}}
{{-- <div class="flex flex-col items-center justify-center w-full max-w-lg mt-20">
        <x-mary-file wire:model="file" label="Receipt" hint="Only PDF" accept=".xls,.xlsx" />

    </div> --}}
