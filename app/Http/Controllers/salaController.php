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
                'message' => $validator->errors()->all()
                ],200);
        }

        $sala = new Salas([
            'nombre'         => $request->nombre,
            'descripcion'       => $request->descripcion,
        ]);
        
        $sala=$sala->save();
        if($sala)
            return response()->json(['message' => 'Creacion de Sala exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA CREACION DE LA SALA'], 200);
            
    }
    public function getSalas()
    {
        $salas= new Salas;
        $salas=$salas->getSalas();
        return response()->json($salas);
    }
    public function getSala($id)
    {
        $sala = new Salas;
        $sala = $sala->getSala($id);
        return response()->json($sala);
    }
    public function update(Request $request,$id)
    {
        $sala = new Salas;
        $sala = $sala->actualizar($request,$id);
        if($sala)
            return response()->json(['message' => 'Actualizacion de cirugia exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZAVION DE LA CIRUGIA'], 200);
            

    }
}
