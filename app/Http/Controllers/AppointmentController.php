<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public $id;
    public $user;

    public function getUserID()
    {
        return Auth::id();
    }

    public function findUser($id)
    {
        return User::findOrFail($id);
    }

    public function getUser()
    {
        $this->id = $this->getUserID();
        return $this->findUser($this->id);
    }

    public function index()
    {
        $this->user = $this->getUser();

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            [
                'label' => $this->user->hasAnyRole([config('system.roles.admin'), config('system.roles.doctor')]) ? 'Doctors' : 'Patients',
                'url' => $this->user->hasAnyRole([config('system.roles.admin'), config('system.roles.doctor')]) ? route('doctor.index') : route('patient.index'),
                'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'
            ],
            ['label' => 'Appointment List', 'url' => route('appointment.index'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.appointments.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Patients', 'url' => route('patient.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Appointment List', 'url' => route('appointment.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Book Appointment', 'url' => route('appointment.create'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.appointments.create', compact('breadcrumbs'));
    }
}
