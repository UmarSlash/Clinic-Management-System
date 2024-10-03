<?php

namespace App\Livewire\Staffs\Forms;

use Livewire\Component;
use App\Livewire\Staffs\Tables\StaffTable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class StaffForm extends Component
{
    public ?User $staff = null;

    public ?string $name = null;
    public ?string $email = null;
    public ?string $gender = null;
    public ?string $phone_no = null;
    public ?string $job = null;
    public ?string $password = null;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'gender' => 'required|in:male,female',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->staff->id)],
            'phone_no' => 'string',
            'job' => 'string',
        ];
    }


    public function mount(User $staff = null)
    {
        $this->staff = $staff ?? new User();
        $this->fillFields();
    }

    public function fillFields()
    {
        if ($this->staff) {
            $this->name = $this->staff->name;
            $this->email = $this->staff->email;
            $this->gender = $this->staff->gender;
            $this->phone_no = $this->staff->phone_no;
            $this->job = $this->staff->job;
            $this->password =  $this->staff->password;
        }
    }

    public function save()
    {
        $this->validate();

        if (!$this->password) {
            $this->password = Hash::make($this->email);
        }

        $this->staff->fill([
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'job' => $this->job,
            'password' => $this->password,
        ])->save();
        $this->staff->assignRole(config('system.roles.staff'));
        // Optionally, assign roles here if necessary

        $this->dispatch('showMessage')->to(StaffForm::class)->self();
    }
    
    public function store()
    {
        $this->validate();

        if (!$this->password) {
            $this->password = Hash::make($this->email);
        }

        $this->staff->fill([
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'job' => $this->job,
            'password' => $this->password,
        ])->save();
        $this->staff->assignRole(config('system.roles.staff'));
        // Optionally, assign roles here if necessary

        $this->dispatch('showMessage')->to(StaffForm::class)->self();
    }


    #[On('showMessage')]
    public function showMessage()
    {
        session()->flash('message', 'Staff successfully saved.');
    }

    public function render()
    {
        return view('livewire.staffs.forms.staff-form');
    }
}
