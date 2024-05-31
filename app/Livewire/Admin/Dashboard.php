<?php

namespace App\Livewire\Admin;

use App\Models\Branch;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\AddBranchForm;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Lazy]

#[Layout('layouts.app')]
class Dashboard extends Component
{
       use WithPagination, WithoutUrlPagination;


    public AddBranchForm $form;
    public $search = '';
    public $page = 10;
    public $branch;
    // public $branchName = '';
    // public $branchLoc = '';



    public bool $editMode = false;

    public function mount( ){

        $dataFromDb = Branch::all();

    }


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

        return view('livewire.admin.dashboard',[

        ]);
    }

    public function delete($branchId){

        $branch = Branch::findOrFail($branchId);
         $branch->delete();
        return $this->redirect('/branch-list', navigate:true);
    }

}
