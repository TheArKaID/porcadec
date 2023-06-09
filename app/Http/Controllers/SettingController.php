<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScanModelRequest;
use App\Http\Requests\UpdateScanModelRequest;
use App\Models\DetectionModel;
use App\Models\ScanModel;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scanModels = ScanModel::all();
        $detectionModels = DetectionModel::all();
        
        return view('settings.index', compact('scanModels', 'detectionModels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:Detection,Scan',
            'name' => 'required',
        ]);

        if ($data['type'] == 'Detection') {
            DetectionModel::create([
                'name' => $data['name'],
            ]);
        } else {
            ScanModel::create([
                'name' => $data['name'],
            ]);
        }

        return redirect()->back()->with('success', $data['type'] . ' model created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScanModel $scanModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function smDestroy(ScanModel $scanModel)
    {
        $scanModel->delete();

        return redirect()->back()->with('success', 'Scan model deleted successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function dmDestroy(DetectionModel $detectionModel)
    {
        $detectionModel->delete();

        return redirect()->back()->with('success', 'Detection model deleted successfully.');
    }
}
