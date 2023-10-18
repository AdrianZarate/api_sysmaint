<?php

namespace App\Http\Controllers;

use App\Models\ClientDevice;
use Illuminate\Http\Request;

class ClientDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientDevice = ClientDevice::all();
        return response()->json([
            'status' => true,
            'clientDevice' => $clientDevice
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientDevice $clientDevice)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientDevice $clientDevice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientDevice $clientDevice)
    {
        //
    }
}
