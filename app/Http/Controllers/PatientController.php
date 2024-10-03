<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Patients', 'url' => route('patient.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Patient List', 'url' => route('patient.index'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.patients.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Patients', 'url' => route('patient.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Patient List', 'url' => route('patient.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Add Patient', 'url' => route('patient.create'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
        ];

        return view('web.patients.create', compact('breadcrumbs'));
    }

    public function edit($id)
    {
        $patient = User::patient()->findOrFail($id);

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Patients', 'url' => route('patient.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Patient List', 'url' => route('patient.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Edit Patient', 'url' => route('patient.edit', $id), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
        ];

        return view('web.patients.edit', compact('breadcrumbs', 'patient'));
    }

    public function destroy($id)
    {
        $patient = User::findOrFail($id);
        $patient->delete();

        return redirect()->route('patient.index')->with('success', 'Patient deleted successfully.');
    }
}

