<?php

namespace App\Livewire\MedicalRecord\Tables;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class MedicalRecordTable extends Component
{
    public ?string $search = null;
    public Collection $medical_record;

    public $id;
    public $user;

    #[On('refreshComponent')]
    public function mount()
    {
        $this->medical_record = $this->getMedicalRecord();
    }

    public function updatedSearch()
    {
        $this->medical_record = $this->getMedicalRecord();
    }

    protected function getMedicalRecord()
    {
        $this->id = $this->getUserID();
        $this->user = $this->getUser($this->id);

        if ($this->user->hasAnyRole([config('system.roles.admin'), config('system.roles.doctor')])) {
            return MedicalRecord::query()
                ->when($this->search, function ($query) {
                    $query->join('users', 'medical_records.patient_id', '=', 'users.id')
                        ->where('users.name', 'like', '%' . $this->search . '%');
                })
                ->select('medical_records.*') // Select only the columns from the MedicalRecords table
                ->get();
        } elseif ($this->user->hasRole(config('system.roles.patient'))) {
            return MedicalRecord::where('patient_id', Auth::id())
                ->get();
        } else {
            return [];
        }
    }

    public function getUserID()
    {
        return Auth::id();
    }

    public function getUser($id)
    {
        return User::findOrFail($id);
    }

    public function add()
    {
        return redirect()->route('medical_record.create');
    }

    public function edit($id)
    {
        return redirect()->route('medical_record.edit', $id);
    }

    public function cancel()
    {
        return redirect()->route('medical_record.index');
    }

    public function render()
    {
        return view('livewire.medical-record.tables.medical-record-table');
    }
}
