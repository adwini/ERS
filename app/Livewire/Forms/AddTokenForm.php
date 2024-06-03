<?php

namespace App\Livewire\Forms;

use App\Models\Tokens;
use Carbon\Carbon;
use App\Models\Branch;
use Exception;
use Livewire\Attributes\Validate;
use App\Models\Total_token_admin;
use App\Models\User;

use Livewire\Form;

class AddTokenForm extends Form
{

    #[Validate('required|string')]
    public  $branchName = '';

    #[Validate('required|string')]
    public $givenTo = '';
    #[Validate('required')]
    public $dateIssued = '';
    #[Validate('required|int')]
    public $no_of_tokens_given;
    public  $no_of_employee = '';
    public  $branchLoc = '';


    public ?Branch $branch;

    public function setToken(Branch $branch)
    {

        $this->branchName = $branch->branchName;
        // $this->no_of_tokens_given = $branch->no_of_tokens_given;
    }


    // public function store()
    // {

    //     $dateNow = Carbon::now()->format('Y-m-d H:i:s');
    //     $this->validate();

    //     Tokens::create([
    //         'givenTo' => $this->givenTo,
    //         'dateIssued' => $dateNow,
    //         'no_of_tokens_given' => $this->no_of_tokens_given,
    //     ]);

    //     $this->reset();
    // }


    // public function update()
    // {
    //     $this->validate();

    //     $this->branch->update([
    //         'branchName' => $this->branchName,
    //         'branchLoc' => $this->branchLoc,
    //         // 'no_of_token_available' => $this->no_of_token_available,
    //         'no_of_employee' => $this->no_of_employee
    //     ]);

    //     $this->reset();
    // }
}
