<?php

namespace App\Livewire\Admin;

use App\Models\Branch;
use Livewire\Component;

class Dashboard extends Component
{


    public function render()
    {
    //     $headers = [
    //     ['key' => 'id', 'label' => '#'],
    //     ['key' => 'branchName', 'label' => 'Branch Name'],
    //     ['key' => 'branchLoc', 'label' => 'Location'],
    //     ['key' => 'no_of_employee', 'label' => 'No. of Employee'],
    //     // ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    // ];
        return view('livewire.admin.dashboard', [
            'branch'=> Branch::paginate(10),

        ]);
    }
}
