<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Report;
use Illuminate\Http\Request;
//* Funciona ✅
//!falta probar ❌

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();

        return response()->json([
            'status' => true,
            'reports' => $reports
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $report = Report::create([
            "report_date" => $request->report_date,
            "service_type" => $request->service_type,
            "service_description" => $request->service_description,
            "equipment_status" => $request->equipment_status,
            "replaced_parts" => $request->replaced_parts,
            "service_cost" => $request->service_cost,
            "service_time" => $request->service_time,
            "remarks" => $request->remarks,
            "imagen" => $request->imagen,
            "technician_id" => $request->technician_id,
            "client_device_id" => $request->client_device_id
        ]);

        return response()->json([
            'status' => true,
            'message' => "Reporte Creado!",
            'report' => $report,
            'tecnico' => $request->technician_id,
            'cliente' => $request->client_device_id,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
