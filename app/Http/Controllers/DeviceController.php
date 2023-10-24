<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\ClientDevice;
use App\Models\Device;
use Illuminate\Http\Request;

//* Funciona ✅
//!falta probar ❌
class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //* Funciona ✅
    //! Implementar para que traiga el id del user
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
    //* Funciona ✅
    //* Crea el dispositivo
    public function store(LoginRequest $request)
    {
        $device = Device::create([
            "name" => $request->name,
            "brand" => $request->brand,
            "model" => $request->model,
            "serial_number" => $request->serial_number,
            "purchase_date" => $request->purchase_date,
            "location" => $request->location,
            "physical_state" => $request->physical_state,
            "status_description" => $request->status_description,
            "technical_specifications" => $request->technical_specifications,
            "installation_date" => $request->installation_date,
            "garantia" => $request->garantia,
            "accessories" => $request->accessories,
            "current_value" => $request->current_value,
            "imagen" => $request->imagen
        ]);

        
        $clientDevice = new ClientDevice();
        $clientDevice->client_id = $request->user_id; 
        $clientDevice->device_id = $device->id; 
        $clientDevice->save();



        return response()->json([
            'status' => true,
            'message' => "Dispositivo Creado!",
            'device' => $device,
            'clientDevice' => $clientDevice
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
