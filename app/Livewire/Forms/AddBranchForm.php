<?php

namespace App\Livewire\Forms;

use App\Models\Branch;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddBranchForm extends Form
{

    #[Validate('required|string')]

    public  $branchName = '';

    #[Validate('required|string')]
    public  $branchLoc = '';

    #[Validate('required|int')]
    public  $no_of_employee = '';

    // public $content;

    // public $no_of_token_available;

    public ? Branch $branch;

    public function setBranch(Branch $branch){
        $this->branch = $branch;
        $this->branchLoc = $branch->branchLoc;
        $this->branchName = $branch->branchName;
        // $this->no_of_token_available = $branch->no_of_token_available;
        $this->no_of_employee = $branch->no_of_employee;
        // $this->content = $branch->content;
    }


    public function store(){
        $this->validate();

        Branch::create([
            'branchName'=> $this->branchName,
            'branchLoc'=> $this->branchLoc,
            // 'no_of_token_available' => $this->no_of_token_available,
            'no_of_employee'=> $this->no_of_employee]);

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
