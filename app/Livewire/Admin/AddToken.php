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

    #[Validate('required|string')]public $givenTo = '';
    #[Validate('required')]public $dateIssued ='';
    #[Validate('required|int')]public $no_of_tokens_given;

    public bool $addModal =false;

    public function addToken(Branch $branch, User $user) {

        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        $validated = $this->validate();

        $added_token = Tokens::create([

             $validated,
            'dateIssued' => $dateNow
        ]);
            dd('test')  ;

        // save token and associate with giver(manager/admin)
        $user->tokens()->save($added_token);

        //get the name of the branch/employee that has given a token
        $name_given_a_token = $added_token->givenTo;

        //get all the tokens that has the token that belonged to the branch/employee
        $overAllToken = Tokens::where('givenTo', $name_given_a_token)->get();

        //count all token and update
        $numOfTokens = $overAllToken->count();
        User::where('name', '=', $name_given_a_token)->update(['no_of_tokens' => $numOfTokens]);

        session()->flash('success', 'Giving token has been successful.');
        //USBA LANG NI BOL, PASABOT ANI PARA NAA REFRESH SA PAGE. IKAW LANG PAG KUAN SA ROUTES SA VIEW.
          $this->redirect('/token', navigate:true);


    }

    public $available_token;

//     public function mount(){
//         $this->available_token = Total_token_admin::latest()->first();
//  }

}
