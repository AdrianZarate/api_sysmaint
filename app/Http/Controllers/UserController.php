<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

//* Funciona ✅
//!falta probar ❌
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * *trae todos los usuarios
     */
    public function index()
    {
        // $users = User::all();
        // $users = User::select('id','first_name', 'last_name', 'email', 'phone', 'rol_id')->get();
        $users = User::with('rol')->select('id', 'first_name', 'last_name', 'email', 'phone', 'rol_id')->get();


        if (count($users) > 0) {

            $usersData = [];

            foreach ($users as $user) {
                $data = [
                    "id" => $user->id,
                    "first_name" => $user->first_name,
                    "last_name" => $user->last_name,
                    "email" => $user->email,
                    "phone" => $user->phone,
                    'rol' => $user->rol->name
                ];
                array_push($usersData, $data );
                    
            }

            return response()->json([
                'status' => true,
                // 'users' => $users,
                'usersData' => $usersData
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No hay usuarios registrados'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * *crea un cliente, falta validar para que cree admin y tecnico
     */
    public function store(LoginRequest $request)
    {
        // Todo para pruebas
        // return response()->json([
        //     'luffy' => true,
        //     'request1' => $request->first_name,
        //     'request2' => $request->all(),
        // ]);

        //* $user = User::create($request->all());

        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
        ];

        if ($request->rol == "client") {
            $userData['rol_id'] = 2;
            $user = User::create($userData);

            $client = new Client();
            $client->user_id = $user->id;
            $client->save();
        } elseif ($request->rol == "technician") {
            $userData['rol_id'] = 3;
            $user = User::create($userData);

            $technician = new Technician();
            $technician->user_id = $user->id;
            $technician->save();
        } else {
            $userData['rol_id'] = 1;
            $user = User::create($userData);
        }


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

        $userId = $user->find($user->id);

        return response()->json([
            'status' => true,
            'user' => [
                'first_name' => $userId->first_name,
                'last_name' => $userId->last_name,
                'email' => $userId->email,
                'phone' => $userId->phone,
                'rol' => $userId->rol->name
            ]
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
            'message' => "User eliminado"
        ], 200);
    }
}
