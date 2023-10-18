<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //* with es para traer datos relacionados
        $clients = Client::with('user')->get();
        // Todo otra manera de hacerlo
        // $user = User::where('rol_id', 2)->get(); 
        // $clientes = Cliente::with('user')->select('clientes.nombre', 'clientes.apellido', 'users.name')->get();
        return response()->json([
            'status' => true,
            'clients' => $clients,
            // 'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $client = Client::with('user')->where('user_id', $user_id)->first();

        if ($client) {
            return response()->json([
                'status' => true,
                'client' => $client,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Cliente no encontrado',
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    //Todo falta implementar al actualizar el client que se actualize el user
    public function update(LoginRequest $request, $user_id)
    {
        return response()->json([
            'status' => "actualizado",
            'request' => $request->all(),
            'client' => $user_id
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
        $client = Client::with('user')->where('user_id', $user_id)->first();
        $borrar = $client;

        // $borrar->delete();

        return response()->json([
            'Borrar' => $borrar,
            'message' => "client eliminado"
        ], 200);
    }
}
