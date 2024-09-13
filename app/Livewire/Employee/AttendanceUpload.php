<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\EmpAttendance;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\Attributes\Layout;
use App\Imports\AttendanceImport;
use Mary\Traits\Toast;


#[Layout('layouts.employee')]
class AttendanceUpload extends Component
{
    use WithFileUploads, Toast;
    public $file;

    public function render()
    {
        $employees = EmpAttendance::paginate(10);
        return view('livewire.employee.attendance-upload', [
            'employees' => $employees,
        ]);
    }

    public $attandance_import = '';

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $attendance = EmpAttendance::count();

        if ($attendance > 0) {
            EmpAttendance::truncate();
        }

        Excel::import(new AttendanceImport, $this->file->path());

        // session()->flash('message', 'Inventory imported successfully.');

        $this->success(
            'Imported successfully',
            redirectTo: '/usr/attendance-upload'
        );
    }
}
