<?php

namespace App\Livewire\Doctors\Tables;

use App\Livewire\Doctors\Forms\DoctorForm;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class DoctorTable extends Component
{
    public ?string $search = null;
    public Collection $doctors;

    #[On('refreshComponent')]
    public function mount() {
        $this->doctors = $this->getDoctor();
    }

    public function updatedSearch()
    {
        $this->doctors = $this->getDoctor();
    }

    protected function getDoctor()
    {
        return User::doctor()->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))->get();
    }

    public function add()
    {
        return redirect()->route('doctor.create');
    }

    public function edit($id)
    {
        return redirect()->route('doctor.edit', $id);
    }
    
    public function cancel()
    {
        return redirect()->route('doctor.index');
    }

    public function render()
    {
        return view('livewire.doctors.tables.doctor-table');
    }
}
