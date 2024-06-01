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
    public $dateIssued = '';
    #[Validate('required|int')]
    public $no_of_tokens_given;




    public ? Branch $branch;

//    public function setBranch(Branch $branch){
//        $this->branch = $branch;
//        $this->branchLoc = $branch->branchLoc;
//        $this->branchName = $branch->branchName;
//        // $this->no_of_token_available = $branch->no_of_token_available;
//        $this->no_of_employee = $branch->no_of_employee;
//        // $this->content = $branch->content;
//    }


    public function store_token(){
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        $this->validate();

        Tokens::create([
            'givenTo'=> $this->givenTo,
            'no_of_tokens_given'=> $this->no_of_tokens_given,
            'dateIssued' => $dateNow,

        ]);

        $this->reset();

    }
//    public function update(){
//        $this->validate();
//
//        $this->branch->update([
//            'branchName'=> $this->branchName,
//            'branchLoc'=> $this->branchLoc,
//            // 'no_of_token_available' => $this->no_of_token_available,
//            'no_of_employee'=> $this->no_of_employee]);
//
//        $this->reset();
//
//    }



}
