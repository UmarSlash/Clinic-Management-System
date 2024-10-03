<?php

namespace App\Livewire\MedicineOrder\Forms;

use App\Livewire\MedicineOrder\Tables\MedicineOrderTable;
use App\Models\Medicine;
use App\Models\MedicineOrder;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class MedicineOrderForm extends Component
{
    public bool $showModel = false;
    public $staffs;
    public $medicines;
    public ?string $name = null;
    public ?User $staff = null;
    public ?MedicineOrder $medicine_order = null;

    public ?string $staff_id = null;
    public ?string $medicine_id = null;
    public ?string $status = null;
    public ?string $quantity = null;
    public ?string $order_date = null;
    public ?string $arrive_date = null;

    protected function rules()
    {
        return [
            'staff_id' => 'required|string',
            'medicine_id' => 'required|string',
            'quantity' => 'required|string',
            'order_date' => 'required|date'
        ];
    }

    public function mount()
    {
        $this->medicine_order ??= new MedicineOrder();
        $this->getMedicineOrder($this->medicine_order);
        $this->medicines = $this->getMedicine();
        $this->staffs = $this->getStaff();
    }

    public function getMedicineOrder($medicine_order)
    {
        $this->medicine_order = $medicine_order;
        $this->staff_id = $this->medicine_order->staff_id;
        $this->medicine_id = $this->medicine_order->medicine_id;
        $this->status = $this->medicine_order->status;
        $this->quantity = $this->medicine_order->quantity;
        $this->order_date = $this->medicine_order->order_date;
    }

    public function getStaff()
    {
        return User::staff()->get();
    }

    public function getMedicine()
    {
        return Medicine::all();
    }

    private function resetForm()
    {
        $this->reset(['staff_id', 'medicine_id', 'quantity', 'order_date', 'arrive_date', 'status']);
        $this->resetErrorBag();
        $this->medicine_order = new MedicineOrder();
    }

    public function save()
    {
        $this->validate();

        $this->medicine_order->fill([
            'staff_id' => $this->staff_id,
            'medicine_id' => $this->medicine_id,
            'quantity' => $this->quantity,
            'order_date' => $this->order_date,
            'arrive_date' => null,
            'status' => 'Ordered',
        ])->save();

        $this->resetForm();
        $this->dispatch('showMessage')->to(MedicineOrderForm::class)->self();
    }

    #[On('showMessage')]
    public function showMessage()
    {
        session()->flash('message', 'Medicine successfully ordered.');
    }

    public function render()
    {
        return view('livewire.medicine-order.forms.medicine-order-form');
    }
}
