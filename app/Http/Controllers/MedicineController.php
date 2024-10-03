<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('dashboard'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Medicines', 'url' => route('medicine.index'), 'icon' => 'M3 12h18M3 6h18m-9 6v6m0-12v6'],
            ['label' => 'Medicine List', 'url' => route('medicine.index'), 'icon' => 'M12 2v6M12 12v6M5 12h6M13 12h6M12 12l-4 4M12 12l4-4'],
            // Add more breadcrumb items as needed
        ];

        return view('web.medicines.index', compact('breadcrumbs'));
    }
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicine.index')->with('success', 'Medicine deleted successfully.');
    }
}
