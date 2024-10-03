<?php

namespace App\Livewire\Patients\Tables;

use App\Livewire\Patients\Forms\PatientForm;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class PatientTable extends Component
{
    public ?string $search = null;
    public Collection $patients;

    #[On('refreshComponent')]
    public function mount() {
        $this->patients = $this->getPatient();
    }

    public function updatedSearch()
    {
        $this->patients = $this->getPatient();
    }

    protected function getPatient()
    {
        return User::patient()->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))->get();
    }

    public function add()
    {
        return redirect()->route('patient.create');
    }

    public function edit($id)
    {
        return redirect()->route('patient.edit', $id);
    }
    
    public function cancel()
    {
        return redirect()->route('patient.index');
    }

    public function render()
    {
        return view('livewire.patients.tables.patient-table');
    }
}
