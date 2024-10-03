<?php

namespace App\Livewire\Dashboard\Tables;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DashboardTable extends Component
{
    public Collection $appointments;

    public ?int $staffCount = null;
    public ?int $patientCount = null;
    public ?int $doctorCount = null;
    public ?int $appointmentCount = null;
    public $daysOfWeek;

    public function mount()
    {
        $this->staffCount = User::staff()->count();
        $this->patientCount = User::patient()->count();
        $this->doctorCount = User::doctor()->count();
        $this->appointmentCount = Appointment::where('status', 'Pending')->count();
        $this->appointments = $this->getTodayAppointments();

        $currentDayIndex = now()->dayOfWeek;

        $this->daysOfWeek = [];

        for ($i = 0; $i < 7; $i++) {
            $date = now()->startOfWeek(Carbon::SUNDAY)->addDays($i);
            $dayData = [
                'name' => $date->format('D'),
                'number' => $date->format('d'),
                'isActive' => ($i === $currentDayIndex),
            ];
            $this->daysOfWeek[] = $dayData;
        }
    }

    public function getTodayAppointments()
    {
        return Appointment::whereDate('date', today())
            ->where('status', 'Approved')
            ->get();
    }

    public function redirectToAppointmentTable()
    {
        return redirect()->route('appointment.index');
    }

    public function render()
    {
        return view('livewire.dashboard.tables.dashboard-table');
    }
}
