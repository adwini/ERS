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
use Mary\Traits\Toast;
use Exception;

#[Layout('layouts.app')]
#[Lazy]

class AddToken extends Component
{

    use WithPagination, WithoutUrlPagination, Toast;


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

    public function addToken() {

        $this->addModal = true;

        try{
            
            $dateNow = Carbon::now()->format('Y-m-d H:i:s');

            $validated = $this->validate(
            [
                'givenTo' => 'required|string',
                'dateIssued' =>  $dateNow,
                'no_of_tokens_given' => 'required|int',
            ]);

            $added_token = Tokens::create([
                $validated
            ]);

            $user = User::where('name', '=', $added_token->givenTo)->first();
            if($user != null) {
                $user->no_of_tokens += $added_token->no_of_tokens_given;
                $user->save();

                // session()->flash('success', 'Giving token has been successful.');
                //USBA LANG NI BOL, PASABOT ANI PARA NAA REFRESH SA PAGE. IKAW LANG PAG KUAN SA ROUTES SA VIEW.
                // $this->redirect('/user', navigate:true);

                $this->success('Giving token has been successful',
                     redirectTo: '/token');
            }

            $branch = Branch::where('branchName','=', $added_token->givenTo)->first();
            if($branch != null) {
                $branch->no_of_token_available += $added_token->no_of_tokens_given;
                $branch->save();

                $this->success('Giving token has been successful',
                     redirectTo: '/token');
            }

            $this->delete($added_token->id);
            
        } catch (Exception $e) {
            return $e;
        }
}

    public $available_token;

    public function get_all_tokens(){
        $this->available_token = Total_token_admin::latest()->take(1)->get();
    }

    public function delete_token($id) {
        $branch = Branch::find($id);
        $branch->delete();
    }
}
