<?php

namespace App\Livewire\Appointment\Tables;

use App\Traits\TimeSlotTrait;
use App\Livewire\Appointment\Forms\AppointmentForm;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class AppointmentTable extends Component
{
    public Collection $doctor;
    public Collection $patient;
    public $availableSlot;

    use TimeSlotTrait;

    #[On('refreshComponent')]
    public function mount()
    {
        $this->doctor = User::doctor()->get();
        $this->patient = User::patient()->get();
        $this->availableSlot = $this->updatedToday();
    }

    public function updatedToday()
    {
        $this->timeSlots = $this->getTimeSlots();
        $availableTimeSlots = [];

        foreach ($this->doctor as $doc) {
            $this->timeSlots = collect($this->timeSlots)->mapWithKeys(fn ($isBooked, $time) => [$time => $this->isAvailableTime($time, $doc->id)]);
            $availableTimeSlots[$doc->id] = $this->timeSlots->toArray();
        }

        return $availableTimeSlots;
        // dd($availableTimeSlots);
    }

    public function isAvailableTime($item, $id)
    {
        return Appointment::where('doctor_id', $id)
            ->where('date', today())
            ->where('time', $item)
            ->where('status', 'Approved')
            ->exists();
    }

    public function book($id)
    {
        $this->dispatch('show', $id)->to(AppointmentForm::class);
    }

    public function render()
    {
        return view('livewire.appointment.tables.appointment-table');
    }
}
