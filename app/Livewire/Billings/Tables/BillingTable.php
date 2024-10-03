<?php

namespace App\Livewire\Billings\Tables;

use App\Livewire\Billings\Forms\BillingForm;
use App\Models\Billing;
use App\Models\MedicalRecord;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class BillingTable extends Component
{
    public ?string $search = null;
    public Collection $billings;
    public Collection $medicalRecords;
    public array $patientNames = [];

    #[On('refreshComponent')]
    public function mount()
    {
        $this->getBilling();
    }

    public function updatedSearch()
    {
        $this->getBilling();
    }

    protected function getBilling()
    {
        $this->billings = Billing::when($this->search, function ($query) {
            $query->whereHas('medicalRecords.patient', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        })->get();

        $this->populatePatientNames();
    }    

    protected function getPatientName($billingId)
    {
        $medicalRecord = MedicalRecord::where('billing_id', $billingId)->first();
    
        if ($medicalRecord && $medicalRecord->patient) {
            return $medicalRecord->patient->name;
        }
    
        return 'Unknown';
    }

    protected function populatePatientNames()
    {
        $this->patientNames = [];
        foreach ($this->billings as $billing) {
            $this->patientNames[$billing->id] = $this->getPatientName($billing->id);
        }
    }    

    public function add()
    {
        $this->dispatch('show')->to(BillingForm::class);
    }

    public function edit($id)
    {
        $this->dispatch('show', $id)->to(BillingForm::class);
    }

    public function cancel()
    {
        return redirect()->route('billing.index');
    }

    public function render()
    {
        return view('livewire.billings.tables.billing-table');
    }
}
