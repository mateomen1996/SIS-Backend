<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class materialController extends Controller
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

        $material = new Material([
            'nombre'            =>$request->nombre,
            'descripcion'       =>$request->descripcion,
            'id_estado'         =>$request->id_estado,
            'cantidad'          =>$request->cantidad,
        ]);
        
        $material=$material->save();
        if($material)
            return response()->json(['message' => 'Creacion de material exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA CREACION DEL material'], 200);
    }
    public function mostrar()
    {
        $material= new Material;
        $material=$material->mostrar();
        return response()->json($material);
    }
    public function detalle($id)
    {
        $material = new Material;
        $material = $material->detalle($id);
        return response()->json($material);
    }
    public function actualizar(Request $request,$id)
    {
        $material = new Material;
        $material = $material->actualizar($request,$id);
        if($material)
            return response()->json(['message' => 'Actualizacion de material exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZAVION DEL material'], 200);
    }
    public function eliminar(Request $request,$id)
    {
        $material = new Material;
        $material = $material->eliminar($request,$id);
        if($material)
            return response()->json(['message' => 'Eliminacion de material exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA Eliminacion DEL material'], 200);
    }
}
