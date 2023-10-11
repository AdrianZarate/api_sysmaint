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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        // return response()->json([
        //     'luffy' => true,
        //     'request1' => $request->all('first_name'),
        //     'request2' => $request,
        // ]);
        
        $user = User::create($request->all());

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
