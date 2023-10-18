<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //* with es para traer datos relacionados
        $technician = Technician::with('user')->get();
        // Todo otra manera de hacerlo
        // $user = User::where('rol_id', 2)->get(); 
        // $clientes = Cliente::with('user')->select('clientes.nombre', 'clientes.apellido', 'users.name')->get();
        return response()->json([
            'status' => true,
            'Technician' => $technician,
            // 'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $technician = Technician::with('user')->where('user_id', $user_id)->first();

        if ($technician) {
            return response()->json([
                'status' => true,
                'technician' => $technician,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Tecnico no encontrado',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    //Todo falta implementar al actualizar el technician que se actualize el user

    public function update(Request $request, $user_id)
    {
        return response()->json([
            'status' => "actualizado",
            'request' => $request->all(),
            'technician' => $user_id
            // 'client' => $user_id->find($user_id)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    //Todo aun no elimina
    public function destroy($user_id)
    {
        //ejemplo
        $technician = Technician::with('user')->where('user_id', $user_id)->first();
        $borrar = $technician;

        // $borrar->delete();

        return response()->json([
            'Borrar' => $borrar,
            'message' => "technician eliminado"
        ], 200);
    }
}
