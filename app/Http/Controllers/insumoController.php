<?php

namespace App\Http\Controllers;

use App\Insumo;
use Illuminate\Http\Request;

class insumoController extends Controller
{
    public function crear(Request $request)
    {

        $rules = [ 
        ];
        $messages = [
        ];
        
        $validator = \Validator::make($request->all(),$rules,$messages);
 
        if($validator->fails()){
            return response()-> json([
                'message' => $validator->errors()->all()
                ],200);
        }

        $insumo = new Insumo([
            'nombre'            =>$request->nombre,
            'descripcion'       =>$request->descripcion,
            'cantidad'          =>$request->cantidad,
        ]);
        
        $insumo=$insumo->save();
        if($insumo)
            return response()->json(['message' => 'Creacion de insumo exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA CREACION DEL insumo'], 200);
    }
    public function mostrar()
    {
        $insumo= new Insumo;
        $insumo=$insumo->mostrar();
        return response()->json($insumo);
    }
    public function detalle($id)
    {
        $insumo = new Insumo;
        $insumo = $insumo->detalle($id);
        return response()->json($insumo);
    }
    public function actualizar(Request $request,$id)
    {
        $insumo = new Insumo;
        $insumo = $insumo->actualizar($request,$id);
        if($insumo)
            return response()->json(['message' => 'Actualizacion de insumo exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZACION DEL insumo'], 200);
    }
    public function eliminar(Request $request,$id)
    {
        $insumo = new Insumo;
        $insumo = $insumo->eliminar($request,$id);
        if($insumo)
            return response()->json(['message' => 'Eliminacion de insumo exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA Eliminacion DEL insumo'], 200);
    }
}
