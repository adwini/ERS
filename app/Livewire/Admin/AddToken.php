<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\AddTokenForm;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

#[Layout('layouts.app')]
#[Lazy]

class AddToken extends Component
{

    use WithPagination, WithoutUrlPagination, Toast;


    public AddTokenForm $form;
    public $search = '';
    public $page = 10;


    public function placeholder()
    {
        return view('skeleton');
    }

    public function render()
    {
        $branches = Branch::where('branchName', 'like', '%' . $this->search . '%')
            ->orWhere('branchLoc', 'like', '%' . $this->search . '%')
            ->paginate($this->page);

        return view('livewire.admin.add_token', [
            'branches' => $branches,
        ]);
    }

    // #[Validate('required|string')]

    public $givenTo = '';

    public $given_by = '';

    // #[Validate('required')]

    public $dateIssued = '';
    #[Validate('required|int')]

    public $no_of_tokens_given;

    public bool $addModal = false;

    public function edit($id)
    {
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        $branch = Branch::find($id);
        // if ($branch) {
        //Req For givenTo
        $this->form->branchName = $branch->branchName;
        $this->givenTo = $branch->branchName;

        $this->form->no_of_tokens_given = $this->no_of_tokens_given;

        //Req For User Id
        $this->given_by = Auth::id();

        $this->dateIssued = $dateNow;
        $this->addModal = true;
        // }
    }

    public function addToken()
    {


        try {


            $this->validate(
                [
                    'givenTo' => 'required|string',
                    'dateIssued' =>  'required',
                    'given_by' => 'required',
                    'no_of_tokens_given' => 'required|int',
                ]
            );

            $added_token = Tokens::create([

                'givenTo' => $this->givenTo,
                'given_by' => $this->given_by,
                'dateIssued' => $this->dateIssued,
                'no_of_tokens_given' => $this->no_of_tokens_given,
            ]);

            $over_all_tokens = Total_token_admin::latest()->take(1)->first();
            $over_all_tokens->token_available -= $added_token->no_of_tokens_given;
            $over_all_tokens->save();
            $this->addModal = false;


            $user = User::where('name', '=', $added_token->givenTo)->first();
            if ($user != null) {
                $user->no_of_tokens += $added_token->no_of_tokens_given;
                $user->save();
            }

            $branch = Branch::where('branchName', '=', $added_token->givenTo)->first();
            if ($branch != null) {
                $branch->no_of_token_available += $added_token->no_of_tokens_given;
                $branch->save();
                $this->addModal = false;
            }


            // $this->delete($added_token->id);
            // $this->reset();
            $this->success(
                'Giving token has been successful',
                redirectTo: '/token'
            );
        } catch (Exception $e) {
            // dd($e->getMessage());
        }
    }

    public $available_token = '';

    public function mount()
    {
        try {
            $get_available_token = Total_token_admin::latest()->take(1)->first();
            $this->available_token = $get_available_token->token_available;
        } catch (Exception $e) {
            dd($e);
        }
    }
}
