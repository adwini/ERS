
<div>
     <x-mary-header title="Token Distribution">
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary" tooltip="Add Branch" @click="$wire.addModal = true" />
        </x-slot:actions>
    </x-mary-header>
 <x-mary-table :headers="$headers" :rows="$branches" striped @row-click="wire.edit($id)" />

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
</div>

