<?php

namespace App\Livewire\MedicineOrder\Tables;

use App\Models\Medicine;
use App\Models\MedicineOrder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class MedicineOrderTable extends Component
{
    public ?string $search = null;
    public Collection $medicine_order;
    public Collection $medicines;

    #[On('refreshComponent')]
    public function mount()
    {
        $this->medicine_order = $this->getMedicineOrder();
    }

    public function updatedSearch()
    {
        $this->medicine_order = $this->getMedicineOrder();
    }

    protected function getMedicineOrder()
    {
        return MedicineOrder::query()
            ->when($this->search, function ($query) {
                $query->join('users', 'medicine_orders.staff_id', '=', 'users.id')
                    ->where('users.name', 'like', '%' . $this->search . '%');
            })
            ->select('medicine_orders.*') // Select only the columns from the MedicineOrders table
            ->get();
    }

    public function orderArrive($id)
    {
        $medicine_order = MedicineOrder::findOrFail($id);
        $medicine_order->status = 'Arrived';
        $medicine_order->arrive_date = now();
        $medicine_order->save();

        $medicines = Medicine::findOrFail($medicine_order->medicine_id);
        $medicines->stock = $medicines->stock + $medicine_order->quantity;
        $medicines->save();

        $this->dispatch('refreshComponent')->self();
    }

    public function orderCancel($id)
    {
        $medicine_order = MedicineOrder::findOrFail($id);
        $medicine_order->status = 'Cancelled';
        $medicine_order->save();

        $this->dispatch('refreshComponent')->self();
    }

    public function cancel()
    {
        return redirect()->route('medicine_order.index');
    }

    public function add()
    {
        return redirect()->route('medicine_order.create');
    }

    public function render()
    {    
        return view('livewire.medicine-order.tables.medicine-order-table');
    }
}
