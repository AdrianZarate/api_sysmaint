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
     ** Funciona
     */
    public function index()
    {
        // $rols = Rol::all();
        $rols = Rol::select('id', 'name')->get();
        return response()->json([
            'status' => true,
            'roles' => $rols
        ]);
    }

    /**
     * Store a newly created resource in storage.
     ** Funciona
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
     ** Funciona
     */
    public function show(Rol $rol)
    {
        $data = $rol->find($rol->id);

        return response()->json([
            'status' => true,
            'rol' => [
                'id' => $data->id,
                'name' => $data->name
            ]
        ], 200);
    }

    //* Funciona
    public function update(LoginRequest $request, Rol $rol)
    {

        $rol->update($request->all());

        return response()->json([
            'status' => "actualizado",
            'rol' => $rol->find($rol->id),
            'datos' => $request->all()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     ** Funciona
     */

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
