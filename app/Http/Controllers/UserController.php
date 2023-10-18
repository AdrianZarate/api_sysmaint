<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * *trae todos los usuarios
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => true,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * *crea un usuario
     */
    public function store(LoginRequest $request)
    {
        // Todo para pruebas
        // return response()->json([
        //     'luffy' => true,
        //     'request1' => $request->first_name,
        //     'request2' => $request->all(),
        // ]);

        // $user = User::create($request->all());
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'rol_id' => 2,
        ]);


        $client = new Client();
        $client->user_id = $user->id;
        $client->save();

        // Generar un token de autenticación
        // $token = $user->createToken('Personal Access Token');

        return response()->json([
            'status' => true,
            'message' => "Usuario Creado!",
            'user' => $user,
            // 'token' => $token
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'status' => true,
            'user' => $user->find($user->id)
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    //Todo falta implementar
    public function update(Request $request, User $user)
    {
        return response()->json([
            'status' => "actualizado",
            'datos' => $request->all(),
            'user' => $user->find($user->id)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    //Todo falta implementar
    public function destroy(User $user)
    {
        //ejemplo
        $borrar = $user->find($user->id);

        $borrar->delete();

        return response()->json([
            'Borrar' => $borrar,
            'message' => "Rol eliminado"
        ], 200);
    }
}
