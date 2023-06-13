<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\DetectionModel;
use App\Models\Patient;
use App\Models\PatientTest;
use App\Models\ScanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $scanModel = ScanModel::all();
        $detectionModel = DetectionModel::all();

        return view('patients.show', compact('patient', 'scanModel', 'detectionModel'));
    }

    /**
     *  Show the image of the specified resource.
     */
    public function getTestImage(Patient $patient, PatientTest $patient_test)
    {
        if (!file_exists(storage_path('app/public/images/scans/' . $patient_test->id . '.png'))) {
            return response()->file(storage_path('app/public/images/404.png'));
        } else {
            return response()->file(storage_path('app/public/images/scans/' . $patient_test->id . '.png'));
        }
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
                'scan_model' => 'required',
                'detection_model' => 'required',
                'scan_image' => 'required|image|mimes:png,jpg,jpeg',
            ]);

            $patientTest = $patient->patientTests()->create([
                'travel_history' => $data['travel_history'],
                'symptoms' => $data['symptoms'],
                'scan_model' => $data['scan_model'],
                'detection_model' => $data['detection_model'],
                'result' => 'null'
            ]);

            $request->file('scan_image')->storeAs(
                'public/images/scans', 
                $patientTest->id . '.png'
            );

            // Call API to Python server
            $url = env('DECO_PYTHON_URL') . '/api/' . $data['scan_model'] . '/' . $data['detection_model'];
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $url, [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen(storage_path('app/public/images/scans/' . $patientTest->id . '.png'), 'r'),
                    ]
                ],
            ]);

            $response = json_decode($response->getBody()->getContents(), true);

            if ($response['status'] !== 'success') {
                return redirect()->back()->with('error', 'Something went wrong. Please try again.');
            }

            $patientTest->update([
                'result' => ($response['data']),
            ]);

            return redirect()->back()->with('success', 'Patient Test Scanned. Check results in a few minutes.');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
