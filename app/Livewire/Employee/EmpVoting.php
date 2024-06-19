<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendaceImports;
use Exception;

#[Layout('layouts.employee')]
class EmpVoting extends Component
{
    public function render()
    {
        return view('livewire.employee.emp_voting');
    }

    public $attandance_import = 'attendance.xlsx';

    public function import() {
        
        try{
            Excel::import(new AttendaceImports, $this->attandance_import);
            dd('Okay!');
        } catch (Exception $e){
            dd($e);
        }
        // return redirect('/')->with('success', 'All Good!');
    }
}
