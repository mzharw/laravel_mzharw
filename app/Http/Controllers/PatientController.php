<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::with('hospital');
    
        if ($request->filled('hospital_id')) {
            $patients->where('hospital_id', $request->hospital_id);
        }
    
        $patients = $patients->get();
        $hospitals = Hospital::all();
    
        if ($request->ajax()) {
            return view('patients.partials.list', compact('patients'));
        }
    
        return view('patients.index', compact('patients', 'hospitals'));
    }
    

    public function create()
    {
        $hospitals = Hospital::all();
        return view('patients.create', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function edit(Patient $patient)
    {
        $hospitals = Hospital::all();
        return view('patients.edit', compact('patient', 'hospitals'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['success' => true]);
    }

    public function getHospitals()
    {
        return response()->json(Hospital::all());
    }
}
