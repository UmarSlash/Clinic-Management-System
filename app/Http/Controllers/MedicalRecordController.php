<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public $id;
    public $user;

    public function getUserID()
    {
        return Auth::id();
    }

    public function findUser($id)
    {
        return User::findOrFail($id);
    }

    public function getUser()
    {
        $this->id = $this->getUserID();
        return $this->findUser($this->id);
    }
    
    public function index()
    {
        $this->user = $this->getUser();

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            [
                'label' => $this->user->hasAnyRole([config('system.roles.admin'), config('system.roles.staff')]) ? 'Staffs' : 'Patients',
                'url' => $this->user->hasAnyRole([config('system.roles.admin'), config('system.roles.staff')]) ? route('staff.index') : route('patient.index'),
                'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'
            ],
            ['label' => 'Medical Record', 'url' => route('medical_record.index'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.medical_records.index', compact('breadcrumbs'));
    }
    
    public function create()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staffs', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Medical Record', 'url' => route('medical_record.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Add Record', 'url' => route('medical_record.create'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.medical_records.create', compact('breadcrumbs'));
    }

    // public function edit($id)
    // {
    //     $medical = MedicalRecord::findOrFail($id);

    //     $breadcrumbs = [
    //         ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
    //         ['label' => 'Staffs', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
    //         ['label' => 'Medical Record', 'url' => route('medical_record.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
    //         ['label' => 'Edit Record', 'url' => route('medical_record.edit', $id), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
    //     ];

    //     return view('web.medical_records.edit', compact('breadcrumbs', 'medical'));
    // }

    // public function destroy($id)
    // {
    //     $medical = MedicalRecord::findOrFail($id);
    //     $medical->delete();

    //     return redirect()->route('medical_record.index')->with('success', 'Patient deleted successfully.');
    // }
}
