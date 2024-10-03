<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staffs', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staff List', 'url' => route('staff.index'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.staffs.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staffs', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staff List', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Add Staff', 'url' => route('staff.create'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
        ];

        return view('web.staffs.create', compact('breadcrumbs'));
    }

    public function store()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staffs', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staff List', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Add Staff', 'url' => route('staff.create'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
        ];

        return view('web.staffs.create', compact('breadcrumbs'));
    }

    public function edit($id)
    {
        $staff = User::staff()->findOrFail($id);

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staffs', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Staff List', 'url' => route('staff.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Edit Staff', 'url' => route('staff.edit', $id), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
        ];

        return view('web.staffs.edit', compact('breadcrumbs', 'staff'));
    }

    public function destroy($id)
    {
        $staff = User::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
