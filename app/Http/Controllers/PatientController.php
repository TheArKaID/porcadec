<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $data = $request->validated();

        $patient->update($data);

        return redirect()->back()->with('success', 'Patient Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }

    /**
     * Create a new test for the specified resource.
     */
    public function createTest(Patient $patient, Request $request)
    {
        try {
            $data = $request->validate([
                'travel_history' => 'nullable|string',
                'symptoms' => 'nullable|string',
                'scan_model' => 'required|in:CT-Scan,X-Ray',
                'detection_model' => 'required|in:VGG,ResNet',
                'scan_image' => 'required|image|mimes:png,jpg,jpeg',
            ]);

            $patientTest = $patient->patientTests()->create([
                'travel_history' => $data['travel_history'],
                'symptoms' => $data['symptoms'],
                'scan_model' => $data['scan_model'],
                'detection_model' => $data['detection_model'],
            ]);

            $request->file('scan_image')->storeAs(
                'public/images/scans', 
                $patientTest->id . '.png'
            );

            // Call API to Python server


            return redirect()->back()->with('success', 'Patient Test Scanned. Check results in a few minutes.');
        } catch (\Throwable $th) {
        }
    }
}
