<?php

namespace App\Livewire\Forms;
use App\Models\Tokens;
use Carbon\Carbon;
use App\Models\Branch;
 use Livewire\Attributes\Validate;
use Livewire\Form;

class AddTokenForm extends Form
{


   #[Validate('required|string')]

    public $givenTo = '';
    #[Validate('required')]

    public $dateIssued ='';
    #[Validate('required|int')]

    public $no_of_tokens_given;

    // public $content;

    public $no_of_token_available;

    public ? Branch $branch;

    public function setToken(Branch $branch){
        $this->branch = $branch;
        $this->no_of_token_available = $branch->no_of_token_available;

    }


    public function store(){
        $this->validate();

        Branch::create([
            // 'branchName'=> $this->branchName,
            // 'branchLoc'=> $this->branchLoc,
            'no_of_token_available' => $this->no_of_token_available,
            // 'no_of_employee'=> $this->no_of_employee
        ]);

            $this->reset();

     }
      public function update(){
        $this->validate();

        $this->branch->update([
            'branchName'=> $this->branchName,
            'branchLoc'=> $this->branchLoc,
            // 'no_of_token_available' => $this->no_of_token_available,
            'no_of_employee'=> $this->no_of_employee]);

            $this->reset();

     }



}
