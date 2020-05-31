<?php

namespace App\Http\Controllers;

use App\Salas;
use Illuminate\Http\Request;

class salaController extends Controller
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

        $sala = new Salas([
            'nombre'         => $request->nombre,
            'descripcion'       => $request->descripcion,
        ]);
        
        $sala=$sala->save();
        if($sala)
        return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
            
    }
    public function getSalas()
    {
        $salas= new Salas;
        $salas=$salas->getSalas();
        return response()->json(['message' => 'Exito',$salas], 200);
    }
    public function getSala($id)
    {
        $sala = new Salas;
        $sala = $sala->getSala($id);
        return response()->json(['message' => 'Exito',$sala], 200);
    }
    public function update(Request $request,$id)
    {
        $sala = new Salas;
        $sala = $sala->actualizar($request,$id);
        if($sala)
        return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
    }
}
