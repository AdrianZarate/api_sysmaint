<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //!completar esto. Puedo crear otro controlador solo para el login
    public function store(LoginRequest $request)
    {
        return response()->json([
            'luffy' => true,
            // 'request1' => $request,
            // 'request2' => $request->all(),
        ]);
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     // Las credenciales son válidas
        //     $user = Auth::user(); // Obtén el usuario autenticado

        //     // Puedes realizar acciones adicionales aquí, como generar un token de acceso si es necesario.

        //     return response()->json([
        //         'status' => true,
        //         'message' => "Inicio de sesión exitoso",
        //         'user' => $user,
        //     ], 200);
        // } else {
        //     // Las credenciales no son válidas
        //     return response()->json([
        //         'status' => false,
        //         'message' => "Credenciales incorrectas",
        //     ], 401);
        // }
    }
}
