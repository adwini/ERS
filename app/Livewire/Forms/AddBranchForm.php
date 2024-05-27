<?php

namespace App\Livewire\Forms;

use App\Models\Branch;
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


    public function store(){
        $this->validate();

        Branch::create([
            'branchName'=> $this->branchName,
            'branchLoc'=> $this->branchLoc,
            'no_of_employee'=> $this->no_of_employee]);

            $this->reset();
    }

}
