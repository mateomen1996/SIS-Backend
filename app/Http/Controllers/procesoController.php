<?php

namespace App\Http\Controllers;

use App\Proceso;
use Illuminate\Http\Request;

class procesoController extends Controller
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
                'message' => "fallo",
                'errores'=>$validator->errors()->all()
                ],200);
        }

        $proceso = new Proceso([
            'nombre'            =>$request->nombre,
            'descripcion'       =>$request->descripcion
        ]);
        
        $proceso=$proceso->save();
        if($proceso)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
    }
    public function mostrar()
    {
        $proceso= new Proceso;
        $proceso=$proceso->mostrar();
        return response()->json($proceso);
    }
    public function detalle($id)
    {
        $proceso = new Proceso;
        $proceso = $proceso->detalle($id);
        return response()->json($proceso);
    }
    public function actualizar(Request $request,$id)
    {
        $proceso = new Proceso;
        $proceso = $proceso->actualizar($request,$id);
        if($proceso)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
    }
}
