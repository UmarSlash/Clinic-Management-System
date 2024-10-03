<?php

namespace App\Livewire\Medicines\Tables;

use App\Livewire\Medicines\Forms\MedicineForm;
use App\Models\Medicine;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class MedicineTable extends Component
{
    public ?string $search = null;
    public Collection $medicines;

    #[On('refreshComponent')]
    public function mount() {
        $this->medicines = $this->getMedicine();
    }

    public function updatedSearch()
    {
        $this->medicines = $this->getMedicine();
    }

    protected function getMedicine()
    {
        return Medicine::when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))->get();
    }

    public function add()
    {
        $this->dispatch('show')->to(MedicineForm::class);
    }

    public function edit($id)
    {
        $this->dispatch('show', $id)->to(MedicineForm::class);
    }
    
    public function cancel()
    {
        return redirect()->route('medicine.index');
    }

    public function render()
    {
        return view('livewire.medicines.tables.medicine-table');
    }
}
