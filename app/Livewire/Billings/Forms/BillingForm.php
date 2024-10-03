<?php

namespace App\Livewire\Billings\Forms;

use App\Models\Billing;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Livewire\Billings\Tables\BillingTable;

class BillingForm extends Component
{
    public ?Billing $billing = null;

    public ?string $amount = null;
    public ?string $status = null;

    public bool $showModel = false;

    protected function rules()
    {
        return [
            'amount' => 'required|string',
            'status' => 'required|string',
        ];
    }

    public function getBilling($billing)
    {
        $this->billing = $billing;
        $this->amount = $this->billing->amount;
        $this->status = $this->billing->status;
    }

    public function mount()
    {
        $this->billing ??= new Billing();
        $this->getBilling($this->billing);
    }

    #[On('show')]
    public function show(?int $id = null)
    {
        $this->billing = $id ? Billing::findOrFail($id) : new Billing();
        $this->getBilling($this->billing);
        $this->showModel = true;
    }

    public function cancel()
    {
        $this->showModel = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['amount',  'status']);
        $this->resetErrorBag();
        $this->billing = new Billing();
    }

    public function save()
    {
        $this->validate();

        $this->billing->fill([
            'amount' => $this->amount,
            'status' => $this->status,
        ])->save();

        // Flash success message
        session()->flash('message', 'Billing successfully saved.');
        $this->showModel = true;
        $this->dispatch('refreshComponent')->to(BillingTable::class);
    }

    public function render()
    {
        return view('livewire.billings.forms.billing-form');
    }
}

