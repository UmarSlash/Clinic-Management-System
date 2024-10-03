<?php

namespace App\Livewire\Appointment\Tables;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class AppointmentList extends Component
{
    public ?string $search = null;
    public Collection $appointment;

    public $total;
    public $approve;
    public $reject;
    public $pending;
    public $id;
    public $user;

    #[On('refresh')]
    public function mount()
    {
        $this->appointment = $this->getAppointment();
        $this->total = $this->getTotalAppointment();
        $this->approve = $this->getApprovedAppointment();
        $this->reject = $this->getRejectedAppointment();
        $this->pending = $this->getPendingAppointment();
    }

    public function updatedSearch()
    {
        $this->appointment = $this->getAppointment();
    }

    protected function getAppointment()
    {
        $this->id = $this->getUserID();
        $this->user = $this->getUser($this->id);

        if ($this->user->hasAnyRole([config('system.roles.admin'), config('system.roles.doctor')])) {
            return Appointment::query()
                ->when($this->search, function ($query) {
                    $query->join('users', 'appointments.patient_id', '=', 'users.id')
                        ->where('users.name', 'like', '%' . $this->search . '%');
                })
                ->select('appointments.*')
                ->get();
        } elseif ($this->user->hasRole(config('system.roles.patient'))) {
            return Appointment::where('patient_id', Auth::id())
                ->get();
        } else {
            return [];
        }
    }

    public function getUserID()
    {
        return Auth::id();
    }

    public function getUser($id)
    {
        return User::findOrFail($id);
    }

    public function getTotalAppointment()
    {
        return Appointment::count();
    }

    public function getApprovedAppointment()
    {
        return Appointment::where('status', 'Approved')->count();
    }

    public function getRejectedAppointment()
    {
        return Appointment::where('status', 'Rejected')->count();
    }

    public function getPendingAppointment()
    {
        return Appointment::where('status', 'Pending')->count();
    }

    public function approveAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Approved';
        $appointment->save();
        $this->dispatch('refresh')->self();
    }

    public function rejectAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Rejected';
        $appointment->save();
        $this->dispatch('refresh')->self();
    }

    public function cancel()
    {
        return redirect()->route('appointment.index');
    }

    public function add()
    {
        return redirect()->route('appointment.create');
    }

    public function render()
    {
        return view('livewire.appointment.tables.appointment-list');
    }
}
