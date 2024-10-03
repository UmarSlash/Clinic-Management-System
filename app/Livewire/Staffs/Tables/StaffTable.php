<?php

namespace App\Livewire\Staffs\Tables;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class StaffTable extends Component
{
    public ?string $search = null;
    public Collection $staffs;

    #[On('refreshComponent')]
    public function mount() {
        $this->staffs = $this->getStaff();
    }

    public function updatedSearch()
    {
        $this->staffs = $this->getStaff();
    }

    protected function getStaff()
    {
        return User::staff()->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))->get();
    }

    public function add()
    {
        return redirect()->route('staff.create');
    }

    public function edit($id)
    {
        return redirect()->route('staff.edit', $id);
    }
    
    public function cancel()
    {
        return redirect()->route('staff.index');
    }

    public function render()
    {
        return view('livewire.staffs.tables.staff-table');
    }
}
