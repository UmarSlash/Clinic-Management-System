<?php

namespace App\Livewire\Doctors\Forms;

use Livewire\Component;
use App\Livewire\Doctors\Tables\DoctorTable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class DoctorForm extends Component
{
    public ?User $doctor = null;

    public ?string $name = null;
    public ?string $email = null;
    public ?string $gender = null;
    public ?string $phone_no = null;
    public ?string $specialty = null;
    public ?string $password = null;
    
    public function mount(User $doctor = null)
    {
        $this->doctor = $doctor ?? new User();
        $this->fillFields();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'gender' => 'required|in:male,female',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->doctor->id)],
            'phone_no' => 'nullable|string',
            'specialty' => 'nullable|string',
        ];
    }

    public function fillFields()
    {
        if ($this->doctor) {
            $this->name = $this->doctor->name;
            $this->email = $this->doctor->email;
            $this->gender = $this->doctor->gender;
            $this->phone_no = $this->doctor->phone_no;
            $this->specialty = $this->doctor->specialty;
            $this->password =  $this->doctor->password;
        }
    }

    public function save()
    {
        $this->validate();

        if(!$this->password){
            $this->password = Hash::make($this->email);
       }

        $this->doctor->fill([
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'specialty' => $this->specialty,
            'password' => $this->password,
        ])->save();
        $this->doctor->assignRole(config('system.roles.doctor'));

        $this->dispatch('showMessage')->to(DoctorForm::class)->self();
    }

    #[On('showMessage')]
    public function showMessage()
    {
        session()->flash('message', 'Doctor successfully saved.');
    }

    public function render()
    {
        return view('livewire.doctors.forms.doctor-form');
    }
}

