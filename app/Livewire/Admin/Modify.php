<?php

namespace App\Livewire\Admin;

use App\Models\Branch;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\AddBranchForm;

#[Lazy]

#[Layout('layouts.app')]
class Modify extends Component
{

    public $branch;
    public $branchName = '';
    public $branchLoc = '';

    public AddBranchForm $form;

    public bool $editMode = false;


    public function edit($id){
        $branch = Branch::find($id );
        $this->form->setBranch($branch);
        $this->editMode = true;
        $this->addModal = true;
    }

    public function save(){

        if ($this->editMode){
            $this->form->update();
            $this->editMode = false;
        }else{
        $this->form->store();


        }

        $this->addModal = false;
    }

    public bool $addModal =false;
    public bool $deleteModal = false;



        public function cancel()
        {
            $this->reset();
            $this->resetErrorBag();
            $this->addModal = false;
             // Clear validation errors
        }


    public function placeholder(){
        return view ('skeleton');
    }
    public function render()
    {

    $headers = [
        ['key' => 'branchName', 'label' => 'Branch Name'],
        ['key' => 'branchLoc', 'label' => 'Location'],
        ['key' => 'no_of_employee', 'label' => 'No. of Employee'],
        // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    ];
        return view('livewire.admin.modify',[
            'branches'=> Branch::all(),
            'headers'=> $headers,

        ]);
    }

    public function delete($branchId){

        $branch = Branch::findOrFail($branchId);
         $branch->delete();
        return $this->redirect('/branch-list', navigate:true);
    }

}
