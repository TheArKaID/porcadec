<?php

namespace App\Http\Controllers;

use App\Models\PatientTest;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thirtyDaysAgo = now()->subDays(30)->format('Y-m-d');
        $data = PatientTest::selectRaw("DATE(patient_tests.created_at) AS date")
            ->selectRaw("COUNT(CASE WHEN JSON_EXTRACT(patient_tests.result, '$.class_label') = 'COVID-19' THEN 1 END) AS Positive")
            ->selectRaw("COUNT(CASE WHEN JSON_EXTRACT(patient_tests.result, '$.class_label') = 'non-COVID-19' THEN 1 END) AS Negative")
            ->join('patients', 'patients.id', '=', 'patient_tests.patient_id')
            ->where('patient_tests.created_at', '>=', $thirtyDaysAgo)
            ->groupByRaw("DATE(patient_tests.created_at)")
            ->orderByRaw("DATE(patient_tests.created_at)")
            ->get();
    
        $latestTests = PatientTest::select('id', 'patient_id', 'result', 'created_at')->latest('created_at')->limit(5)->with('patient:id,name')->get();
    
        $totalPatientTest = PatientTest::count();
    
        $totalPatientPositiveTest = PatientTest::whereJsonContains('result->class_label', 'COVID-19')->count();
        $totalPatientNegativeTest = PatientTest::whereJsonContains('result->class_label', 'non-COVID-19')->count();
    
        return view('dashboard', compact('data', 'latestTests', 'totalPatientTest', 'totalPatientPositiveTest', 'totalPatientNegativeTest'));
    }
}
