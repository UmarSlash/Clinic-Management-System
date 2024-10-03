<?php

namespace App\Livewire\Appointment\Forms;

use App\Traits\TimeSlotTrait;
use App\Livewire\Appointment\Tables\AppointmentTable;
use App\Models\Appointment;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class AppointmentForm extends Component
{
    public bool $showModel = false;
    public ?string $name = null;
    public ?User $doctor = null;
    public ?User $patient = null;
    public ?Appointment $appointment = null;

    public ?string $ic = null;
    public ?string $date = null;
    public ?string $description = null;
    public $selectedTime;

    use TimeSlotTrait;

    protected function rules()
    {
        return [
            'ic' => 'required|string|size:12',
            'date' => 'required|date',
            'description' => 'required|string'
        ];
    }

    public function mount()
    {
        $this->appointment ??= new Appointment();
        $this->timeSlots = $this->getTimeSlots();
    }

    public function updatedDate()
    {
        $this->timeSlots = collect($this->timeSlots)->mapWithKeys(fn ($isBooked, $time) => [$time => $this->isAvailableTime($time)]);
    }

    public function isAvailableTime($item)
    {
        if ($this->doctor) {
            return Appointment::where('doctor_id', $this->doctor->id)
                ->where('date', $this->date)
                ->where('time', $item)
                ->exists();
        }
    }

    public function getDoctor($id)
    {
        return User::findOrFail($id);
    }

    public function getPatient($ic)
    {
        $this->patient = User::patient()->where('ic', $ic)->first();

        if ($this->patient) {
            return $this->patient->id;
        } else {
            // Handle the case when the patient is not found
            // For example, you can set an error message or handle it as needed
            session()->flash('error', 'Patient not found.');
            return null;
        }
    }

    #[On('show')]
    public function show(?int $id = null)
    {
        $this->showModel = true;
        $this->doctor = $this->getDoctor($id);
        $this->name = $this->doctor->name;
    }

    public function selectTime($time)
    {
        $this->selectedTime = $time;
    }

    public function save()
    {
        $this->validate();

        $this->appointment->fill([
            'doctor_id' => $this->doctor->id,
            'patient_id' => $this->getPatient($this->ic),
            'date' => $this->date,
            'time' => $this->selectedTime,
            'status' => 'Pending',
            'description' => $this->description,
        ])->save();

        // Flash success message
        session()->flash('message', 'Appointment successfully booked.');
        $this->showModel = true;
    }

    private function resetForm()
    {
        $this->reset([ 'ic', 'date', 'description']);
        $this->resetErrorBag();
        $this->appointment = new Appointment();
    }

    public function cancel()
    {
        $this->showModel = false;
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.appointment.forms.appointment-form');
    }
}
