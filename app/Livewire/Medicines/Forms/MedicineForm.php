<?php

namespace App\Livewire\Medicines\Forms;

use App\Models\Medicine;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Livewire\Medicines\Tables\MedicineTable;

class MedicineForm extends Component
{
    public ?Medicine $medicine = null;

    public ?string $name = null;
    public ?int $price = null;
    public ?int $stock = null;

    public bool $showModel = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|int',
            'stock' => 'required|int'
        ];
    }

    public function getMedicine($medicine)
    {
        $this->medicine = $medicine;
        $this->name = $this->medicine->name;
        $this->price = $this->medicine->price;
        $this->stock = $this->medicine->stock;
    }

    public function mount()
    {
        $this->medicine ??= new Medicine();
        $this->getMedicine($this->medicine);
    }

    #[On('show')]
    public function show(?int $id = null)
    {
        $this->medicine = $id ? Medicine::findOrFail($id) : new Medicine();
        $this->getMedicine($this->medicine);
        $this->showModel = true;
    }

    public function cancel()
    {
        $this->showModel = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name',  'price', 'stock']);
        $this->resetErrorBag();
        $this->medicine = new Medicine();
    }

    public function save()
    {
        $this->validate();

        $this->medicine->fill([
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
        ])->save();

        // Flash success message
        session()->flash('message', 'Medicine successfully saved.');
        $this->showModel = true;
        $this->dispatch('refreshComponent')->to(MedicineTable::class);
    }

    public function render()
    {
        return view('livewire.medicines.forms.medicine-form');
    }
}

