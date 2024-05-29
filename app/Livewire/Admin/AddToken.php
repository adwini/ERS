<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\AddBranchForm;
use App\Models\Branch;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class AddToken extends Component
{
  public $branch;
    public $branchName = '';
    public $branchLoc = '';

    public AddBranchForm $form;


    // public function editBranch(Branch $branch) {
    //     $this->branch=$branch;
    //     $this->branchName=$branch->branchName;
    //     $this->branchLoc=$branch->branchLoc;
    // }

    public function updateBranch(){

        $validated = $this->validate([
            'branchName' => 'required|max:255',
            'branchLoc' => 'required|max:255',
        ]);
        $this->branch->update($validated);
        session()->flash('success', 'Branch Updated Successfully.');
        //USBA LANG NI BOL, PASABOT ANI PARA NAA REFRESH SA PAGE. IKAW LANG PAG KUAN SA ROUTES SA VIEW.
        return $this->redirect('/branches', navigate:true);
    }

    //     public function save() {

    //     $validated = $this->validate([
    //         'branchName' => 'required|max:255',
    //         'branchLoc' => 'required|max:255',
    //         'no_of_employee'=>'required|int'
    //     ]);

    //     Branch::create($validated);
    //     $this->reset();
    //     $this->addModal = false;

    //    $this->redirectIntended(default: route('modify_branch', absolute: false), navigate: true);
    // }

    public function edit($id){
        $branch = Branch::find($id );
        $this->form->setBranch($branch);
        $this->addModal = true;
    }

    public function save(){
        $this->form->store();
        $this->addModal = false;
    }

    public bool $addModal =false;


        public function cancel()
        {
            $this->reset();
            $this->resetErrorBag();
            $this->addModal = false;
             // Clear validation errors
        }



        public function render()
    {

    $headers = [
        ['key' => 'branchName', 'label' => 'Branch Name'],
        ['key' => 'branchLoc', 'label' => 'Location'],
        ['key' => 'no_of_employee', 'label' => 'No. of Employee'],
        // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    ];
        return view('livewire.admin.add_token',[
            'branches'=> Branch::all(),
            'headers'=> $headers,

        ]);
    }
}
