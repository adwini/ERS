<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendaceImports;
use Exception;

#[Layout('layouts.employee')]
class AttendanceUpload extends Component
{
    public function render()
    {
        return view('livewire.employee.attendance-upload');
    }

    public $attandance_import = '';

    public function import()
    {
        try {
            dd($this->attandance_import);
            Excel::import(new AttendaceImports(), request()->file($this->attandance_import));
            // dd('Okay!');
        } catch (Exception $e) {
            dd($e);
        }
        // return redirect('/')->with('success', 'All Good!');
    }
}
