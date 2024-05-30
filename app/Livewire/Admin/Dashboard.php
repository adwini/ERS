<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\AddBranchForm;
use App\Models\Branch;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Lazy]
class Dashboard extends Component

{

    public function placeholder(){
        return view ('skeleton');
    }

    use WithPagination;
    public function mount()
    {
        $this->branches = Branch::all();
    }
    public function render()
    {
         $headers = [
        ['key' => 'branchName', 'label' => 'Branch Name'],
        ['key' => 'branchLoc', 'label' => 'Location'],
        ['key' => 'no_of_employee', 'label' => 'No. of Employee'],
        // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    ];

        return view('livewire.admin.dashboard', [
            // 'branch'=> Branch::paginate($this->perPage),
            // 'branches'=> Branch::all(),
            'branch_pag' =>Branch::paginate(10),

            'header'=> $headers,

        ]);
    }

    // public $perPage = 10;
     public $branches = [];
    public bool $addModal = false;

    // public $branch_pag =[];

    public $search = '';

    public $branchName = '';
    public $branchLoc = '';
    public $no_of_employee = '';

    public AddBranchForm $form;


     public function save() {
        $this->form->store();
        $this->addModal = false;
        $this-> redirect('/dashboard', navigate:true);
     }


     public function resetForm()
    {
        $this->reset(['branchLoc','branchName','no_of_employee']);

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

 }

