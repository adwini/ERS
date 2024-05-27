<?php

namespace App\Livewire\Admin\DashboardComponents;

use Livewire\Component;
use App\Models\Branch;
use App\Models\User;
use App\Models\Tokens;
use Carbon\Carbon;

class AddToken extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-components.add-token');
    }

    public $givenTo = '';
    public $dateIssued = '';
    public $no_of_tokens_given = 0;

    public function addToken(Branch $branch, User $user) {

        $dateNow = Carbon::now()->format('Y-m-d H:i:s');
        
        $validated = $this->validated([
            'givenTo' => 'required|string|max:255',
            'dateIssued' => $dateNow,
            'no_of_tokens_given' => 'required|integer',
        ]);

        $added_token = Token::create($validated);
        $user->tokens()->save($added_token);
    }
}
