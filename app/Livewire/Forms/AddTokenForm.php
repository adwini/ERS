<?php

namespace App\Livewire\Forms;

use App\Models\Tokens;
use Carbon\Carbon;
use App\Models\Branch;
use Exception;
use Livewire\Attributes\Validate;
use App\Models\Total_token_admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class AddTokenForm extends Form
{
    #[Validate('required|string')]
    public $branchName = '';

    #[Validate('required|string')]
    public $givenTo = '';

    #[Validate('required')]
    public $dateIssued = '';

    #[Validate('required|int')]
    public $no_of_tokens_given;

    public $no_of_employee = '';
    public $branchLoc = '';
    public $id;
    public ?Branch $branch;
    public ?User $userId;

    public function setToken(Branch $branch)
    {
        $this->branch = $branch;
        $this->branchName = $branch->branchName;
    }
}
