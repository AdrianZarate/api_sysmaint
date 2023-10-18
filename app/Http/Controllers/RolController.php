<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Rol;
use Exception;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        try {
            $rol = Rol::create($request->all());
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Error, Rol no creado"
            ], 400);
        }

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
        ], 200);
    }
    
    //Todo falta implementar
    public function update(LoginRequest $request, Rol $rol)
    {
        return response()->json([
            'status' => "actualizado",
            'rol' => $rol->find($rol->id)
        ], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    //Todo falta implementar
    public function destroy(Rol $rol)
    {
        //ejemplo
        $borrar = $rol->find($rol->id);

        $borrar->delete();

        return response()->json([
            'Borrar' => $borrar,
            'message' => "Rol eliminado"
        ], 200);

    }
}
