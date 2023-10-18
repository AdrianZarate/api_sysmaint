<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //!falta probar ❌
    public function index()
    {
        $devices = Device::all();
        return response()->json([
            'status' => true,
            'devices' => $devices
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    //* ya se crea el dispositivo
    public function store(LoginRequest $request)
    {
        $device = Device::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Dispositivo Creado!",
            'device' => $device,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    //* Funciona ✅
    public function show(Device $device)
    {
        return response()->json([
            'status' => true,
            'device' => $device->find($device->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    //* Funciona ✅
    public function update(Request $request, Device $device)
    {
        return response()->json([
            'status' => "actualizado",
            'datos' => $request->all(),
            'device' => $device->find($device->id)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    //!falta probar ❌
    public function destroy(Device $device)
    {
        //ejemplo
        $borrar = $device->find($device->id);

        $borrar->delete();

        return response()->json([
            'Borrar' => $borrar,
            'message' => "Dispositivo eliminado!"
        ], 200);
    }
}
