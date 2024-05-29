
<div>
    <x-mary-header title="Dashboard" class="text-xs font-medium">
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" tooltip="Add Branch" @click="$wire.addModal = true" />
        </x-slot:actions>
    </x-mary-header>

<div class="overflow-x-auto">
  <table class="table">
    <!-- head -->
    <thead >
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
      <tr>
        <td class="px-6 py-4">
            {{ $branch->branchName }}
        </td>
        <td class="px-6 py-4">
            {{ $branch->branchLoc }}
        </td>
        <td class="px-6 py-4">
            {{ $branch->no_of_employee }}
        </td>
      </tr>



    @endforeach
    </tbody>
  </table>
</div>

{{-- Modal for Adding a branch --}}
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
