<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Doctors', 'url' => route('doctor.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Doctor List', 'url' => route('doctor.index'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.doctors.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Doctors', 'url' => route('doctor.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Doctor List', 'url' => route('doctor.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Add Doctor', 'url' => route('doctor.create'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
        ];

        return view('web.doctors.create', compact('breadcrumbs'));
    }

    public function edit($id)
    {
        $doctor = User::doctor()->findOrFail($id);

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Doctors', 'url' => route('doctor.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Doctor List', 'url' => route('doctor.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Edit Doctor', 'url' => route('doctor.edit', $id), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
        ];

        return view('web.doctors.edit', compact('breadcrumbs', 'doctor'));
    }

    public function destroy($id)
    {
        $doctor = User::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully.');
    }
}

