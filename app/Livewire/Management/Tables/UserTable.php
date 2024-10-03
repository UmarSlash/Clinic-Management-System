<?php

namespace App\Livewire\Management\Tables;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class UserTable extends Component
{
    public ?string $search = null;
    public Collection $users;
    public Collection $roles;
    public array $userRoles = [];

    #[On('refreshComponent')]
    public function mount()
    {
        $this->users = $this->getUser();
        $this->roles = Role::all();
    
        foreach ($this->users as $user) {
            // Get all roles for the user
            $roles = $user->roles->pluck('name')->implode(', '); // Concatenate roles with a comma and space
    
            // Store all roles in userRoles array
            $this->userRoles[$user->id] = $roles;
        }
    }
    

    public function updatedSearch()
    {
        $this->users = $this->getUser();
    }

    protected function getUser()
    {
        return User::when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))->get();
    }

    public function updateRole($userId)
    {
        $this->validate([
            'userRoles.' . $userId => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->syncRoles([$this->userRoles[$userId]]);

        $this->dispatch('showMessage')->to(UserTable::class)->self();
    }

    #[On('showMessage')]
    public function showMessage()
    {
        session()->flash('message', 'User successfully saved.');
    }

    public function add()
    {
        return redirect()->route('management.user_create');
    }

    public function edit($id)
    {
        return redirect()->route('management.user_edit', $id);
    }

    public function render()
    {
        return view('livewire.management.tables.user-table');
    }
}
