<?php

namespace App\Livewire\MedicalRecord\Forms;

use App\Livewire\MedicalRecord\Tables\MedicalRecordTable;
use App\Models\Billing;
use App\Models\MedicalRecord;
use App\Models\Medicine;
use App\Models\User;
use Filament\Notifications\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class MedicalRecordForm extends Component
{
    public ?MedicalRecord $medical_record = null;
    public ?Billing $billing = null;
    public Collection $medicines;

    public $staffs;
    public $patients;
    public $medicine;
    public ?string $staff_id = null;
    public ?string $patient_id = null;
    public ?string $billing_id = null;
    public ?string $medicine_id = null;
    public ?int $dosage = null;
    public ?string $date = null;

    public bool $showModel = false;
    public bool $success = false;

    #[On('refreshComponent')]
    public function mount()
    {
        $this->medical_record ??= new MedicalRecord();
        if ($this->medical_record) {
            $this->fillFields();
        }
        $this->staffs = $this->getStaff();
        $this->patients = $this->getPatient();
        $this->billing_id = Billing::getLowestAvailableId();
        if($this->success)
        {
            session()->flash('message', 'Medical Record successfully saved.');
            $this->success = false;
        }
    }

    protected function rules()
    {
        return [
            'patient_id' => 'required|string',
            'staff_id' => 'required|string',
            'medicine_id' => 'required|string',
            'billing_id' => 'required|string',
            'dosage' => 'int|nullable',
            'date' => 'date|nullable',
        ];
    }

    public function getStaff()
    {
        return User::staff()->get();
    }

    public function getPatient()
    {
        return User::patient()->get();
    }

    public function getMedicine($id)
    {
        return Medicine::find($id);
    }

    public function fillFields()
    {
        $this->patient_id = $this->medical_record->patient_id;
        $this->staff_id = $this->medical_record->staff_id;
        $this->billing_id = $this->medical_record->billing_id;
        $this->medicine_id = $this->medical_record->medicine_id;
        $this->dosage = $this->medical_record->dosage;
        $this->date = $this->medical_record->date;
    }

    private function resetForm()
    {
        $this->reset(['patient_id', 'staff_id', 'billing_id', 'medicine_id', 'dosage', 'date']);
        $this->resetErrorBag();
        $this->medical_record = new MedicalRecord();
    }

    public function save()
    {
        $this->validate();

        $this->billing = Billing::create([
            'id' => $this->billing_id,
            'amount' => null,
            'status' => null,
        ]);

        $this->medicine = $this->getMedicine($this->medicine_id);

        $this->medical_record->fill([
            'patient_id' => $this->patient_id,
            'staff_id' => $this->staff_id,
            'billing_id' => $this->billing_id,
            'medicine_id' => $this->medicine_id,
            'dosage' => $this->dosage,
            'date' => $this->date,
        ])->save();

        $this->billing->fill([
            'amount' => $this->medicine->price * $this->medical_record->dosage,
            'status'=> 'Not paid',
        ])->save();

        $medicines = Medicine::findOrFail($this->medicine_id);
        $medicines->stock = $medicines->stock - $this->dosage;
        $medicines->save();

        $this->resetForm();
        $this->dispatch('refreshComponent')->self();
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.medical-record.forms.medical-record-form');
    }
}


