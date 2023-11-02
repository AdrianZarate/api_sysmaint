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


        if (count($clients) > 0) {
            $clientsData = [];

            foreach ($clients as $client) {
                $data = [
                    "id" => $client->user->id,
                    "first_name" => $client->user->first_name,
                    "last_name" => $client->user->last_name,
                    "email" => $client->user->email,
                    "phone" => $client->user->phone,
                ];
                array_push($clientsData, $data);
            }
            return response()->json([
                'status' => true,
                'clients' => $clientsData,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'No hay registro de clientes',
            ]);
        }


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
                'client' => [
                    'id' => $client->user->id,
                    'first_name' => $client->user->first_name,
                    'last_name' => $client->user->last_name,
                    'email' => $client->user->email,
                    'phone' => $client->user->phone
                ],
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
