<?php

namespace App\Http\Controllers;

use App\InsumoCirugia;
use Illuminate\Http\Request;

class insumoCirugiaController extends Controller
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

        $insumoCirugia = new InsumoCirugia([
            'id_insumo'         =>$request->id_insumo,
            'id_cirugia'         =>$request->id_cirugia,
        ]);
        
        $insumoCirugia=$insumoCirugia->save();
        if($insumoCirugia)
            return response()->json(['message' => 'Creacion de insumoCirugia exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA CREACION DEL insumoCirugia'], 200);
    }
    public function mostrar()
    {
        $insumoCirugia= new InsumoCirugia;
        $insumoCirugia=$insumoCirugia->mostrar();
        return response()->json($insumoCirugia);
    }
    public function detalle($id)
    {
        $insumoCirugia = new InsumoCirugia;
        $insumoCirugia = $insumoCirugia->detalle($id);
        return response()->json($insumoCirugia);
    }
    public function actualizar(Request $request,$id)
    {
        $insumoCirugia = new InsumoCirugia;
        $insumoCirugia = $insumoCirugia->actualizar($request,$id);
        if($insumoCirugia)
            return response()->json(['message' => 'Actualizacion de insumoCirugia exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZAVION DEL insumoCirugia'], 200);
    }
}
