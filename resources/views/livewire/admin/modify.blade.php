<div>
    <x-mary-header title="Modify Branches">
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" tooltip="Add Branch" @click="$wire.addModal = true" />
        </x-slot:actions>
    </x-mary-header>

    {{-- <x-mary-table :headers="$headers" :rows="$branches" striped @row-click="wire.edit($id)" /> --}}

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
          <th scope="col" class="px-6 py-3">
            Actions
        </th>
</tr>
    </thead>
    <tbody>
           @foreach ($branches as $branch)
      <tr class="hover" wire:key"{{ $branch->id}}">
        <td class="px-6 py-4">
            {{ $branch->branchName }}
        </td>
        <td class="px-6 py-4">
            {{ $branch->branchLoc }}
        </td>
        <td class="px-6 py-4">
            {{ $branch->no_of_employee }}
        </td>
         <td class="px-6 py-4">

        <x-mary-button tooltip="Delete" type="submit" onclick="deleteModal.showModal()" icon="o-trash" class="btn-secondary" spinner/>
        <x-mary-button icon="o-pencil-square" tooltip="Edit" wire:click="edit({{ $branch->id }})"/>


        </td>
      </tr>

    @endforeach
    </tbody>
  </table>
</div>
    {{-- Add Modal --}}
    <x-mary-modal wire:model="addModal" persistent class="backdrop-blur">
    <x-mary-form wire:submit.prevent="save">
        <x-mary-input label="Branch Name" wire:model="form.branchName" class=""/>
        <x-mary-input label="Branch Location" wire:model="form.branchLoc" />
        <x-mary-input label="Number of Employees" wire:model="form.no_of_employee"/>


        <x-slot:actions>

    <x-mary-button label="Cancel" link="/branch-list" />
    <x-mary-button label="Add" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-mary-form>
    </x-mary-modal>


    {{-- Delete Modal --}}
    <x-mary-modal id="deleteModal" title="Are you sure?">
    <div>Do you really want to delete these records? This process cannot be undone.</div>

    <x-slot:actions>
        {{-- Notice `onclick` is HTML --}}
        <x-mary-button label="Cancel" onclick="deleteModal.close()" />
        <x-mary-button label="Delete" class="btn-secondary"  wire:click="delete({{ $branch->id }})" />
    </x-slot:actions>
</x-mary-modal>


{{-- Delete Modal  --}}



</div>

