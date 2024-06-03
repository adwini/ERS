<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\AddBranchForm;
use App\Models\Branch;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use App\Models\Tokens;
use Carbon\Carbon;
use App\Models\Total_token_admin;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Lazy]

class AddToken extends Component
{

    use WithPagination, WithoutUrlPagination;


    public AddBranchForm $form;
    public $search = '';
    public $page = 10;
    public $branch;

        public function placeholder(){
        return view ('skeleton');
    }


        public function render()
    {

        return view('livewire.admin.add_token',[


        ]);
    }

    // #[Validate('required|string')]

    public $givenTo = '';
    // #[Validate('required')]

    public $dateIssued ='';
    // #[Validate('required|int')]

    public $no_of_tokens_given;

    public bool $addModal =false;

  use WithPagination, WithoutUrlPagination;




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

     public bool $deleteModal = false;



        public function cancel()
        {
            $this->reset();
            $this->resetErrorBag();
            $this->addModal = false;
             // Clear validation errors
        }




    public function delete($branchId){

        $branch = Branch::findOrFail($branchId);
         $branch->delete();
        return $this->redirect('/branch-list', navigate:true);
    }

}
