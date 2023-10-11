<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $rol = Rol::where('id', $request->id)->first();
        // $token = $rol->createToken('my-app-token')->plainTextToken;


        // return response()->json([
        //     'status' => true,
        //     'roles' => $rol,
        //     'token' => $token
        // ]);

        $rols = Rol::all();
        return response()->json([
            'status' => true,
            'roles' => $rols
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $rol = Rol::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Rol Creado!",
            'rol' => $rol
        ], 200);
    }

    /**
     * Display the specified resource. Busca por id en la url se la pasa el id api/rol/1
     */
    public function show(Rol $rol)
    {
        return response()->json([
            'status' => true,
            'rol' => $rol->find($rol->id)
        ]);
    }

}
