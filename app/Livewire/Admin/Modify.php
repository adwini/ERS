<?php

namespace App\Livewire\Admin;

use App\Models\Branch;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\AddBranchForm;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Mary\Traits\Toast;


#[Lazy]

#[Layout('layouts.app')]
class Modify extends Component
{
    use WithPagination, WithoutUrlPagination, Toast;


    public AddBranchForm $form;
    public $search = '';
    public $page = 10;
    public $branch;
    public bool $addModal = false;
    public bool $deleteModal = false;

    public function mount()
    {
        Branch::all();
    }


    public function edit($id)
    {
        $branch = Branch::find($id);
        $this->form->setBranch($branch);
        $this->addModal = true;
    }

    public function save()
    {
        $this->form->store();
        $this->addModal = false;
        $this->success('Saved Successfully');
    }
    public function delete($branchId)
    {

        $branch = Branch::findOrFail($branchId);
        $branch->delete();
        $this->success('Deleted Successfully');
    }

    public function cancel()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->addModal = false;
    }


    public function placeholder()
    {
        return view('skeleton');
    }

    public function render()
    {

        return view('livewire.admin.modify', []);
    }
}
