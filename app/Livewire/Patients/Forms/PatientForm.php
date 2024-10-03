<?php

namespace App\Livewire\Patients\Forms;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Livewire\Patients\Tables\PatientTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PatientForm extends Component
{
    public ?User $patient = null;

    public ?string $ic = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $gender = null;
    public ?string $phone_no = null;
    public ?string $password = null;

    public function mount(User $patient = null)
    {
        $this->patient = $patient ?? new User();
        if ($this->patient) {
            $this->fillFields();
        }
    }

    protected function rules()
    {
        return [
            'ic' => 'required|string|size:12',
            'name' => 'required|string|min:3|max:255',
            'gender' => 'required|in:male,female',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->patient->id)],
            'phone_no' => 'string',
        ];
    }

    public function fillFields()
    {
        $this->ic = $this->patient->ic;
        $this->name = $this->patient->name;
        $this->email = $this->patient->email;
        $this->gender = $this->patient->gender;
        $this->phone_no = $this->patient->phone_no;
        $this->password =  $this->patient->password;
    }

    public function save()
    {
        $this->validate();

        if (!$this->password) {
            $this->password = Hash::make($this->email);
        }

        $this->patient->fill([
            'ic' => $this->ic,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'password' => $this->password,
        ])->save();
        $this->patient->assignRole(config('system.roles.patient'));

        $this->dispatch('showMessage')->to(PatientForm::class)->self();
    }

    #[On('showMessage')]
    public function showMessage()
    {
        session()->flash('message', 'Patient successfully saved.');
    }

    public function render()
    {
        return view('livewire.patients.forms.patient-form');
    }
}
