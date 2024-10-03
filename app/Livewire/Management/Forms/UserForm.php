<?php

namespace App\Livewire\Management\Forms;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class UserForm extends Component
{
    public ?User $user = null;

    public ?string $name = null;
    public ?string $email = null;
    public ?string $gender = null;
    public ?string $phone_no = null;
    public ?string $job = null;
    public ?string $specialty = null;
    public ?string $ic = null;
    public ?string $password = null;
    public array $roles = [];
    public bool $success = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'gender' => 'required|in:male,female',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'phone_no' => 'nullable|string',
            'job' => 'nullable|string',
            'ic' => 'nullable|string|min:12',
            'specialty' => 'nullable|string',
        ];
    }

    public function mount(User $user = null)
    {
        $this->user = $user ?? new User();
        $this->fillFields();
    }

    public function fillFields()
    {
        if ($this->user) {
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->gender = $this->user->gender;
            $this->phone_no = $this->user->phone_no;
            $this->job = $this->user->job;
            $this->specialty = $this->user->specialty;
            $this->password = $this->user->password;
            $this->ic = $this->user->ic;
        }
    }

    private function resetForm()
    {
        $this->reset(['name', 'gender', 'email', 'phone_no', 'job', 'specialty', 'ic']);
        $this->resetErrorBag();
        $this->user = new User();
    }

    public function save()
    {
        $this->validate();

        if (!$this->password) {
            $this->password = Hash::make($this->email);
        }

        $this->user->fill([
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'job' => $this->job,
            'password' => $this->password,
            'specialty' => $this->specialty,
            'ic' => $this->ic,
        ])->save();

        $this->user->syncRoles($this->roles);
        $this->resetForm();
        $this->dispatch('showMessage')->to(UserForm::class)->self();
    }

    #[On('showMessage')]
    public function showMessage()
    {
        session()->flash('message', 'Staff successfully saved.');
    }

    public function render()
    {
        return view('livewire.management.forms.user-form');
    }
}
