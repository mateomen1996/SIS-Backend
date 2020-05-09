<?php

namespace App\Http\Controllers;

use App\MaterialCirugia;
use Illuminate\Http\Request;

class materialCirugiaController extends Controller
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

        $materialCirugia = new MaterialCirugia([
            'id_material'         =>$request->id_material,
            'id_cirugia'         =>$request->id_cirugia,
        ]);
        
        $materialCirugia=$materialCirugia->save();
        if($materialCirugia)
            return response()->json(['message' => 'Creacion de materialCirugia exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA CREACION DEL materialCirugia'], 200);
    }
    public function mostrar()
    {
        $materialCirugia= new MaterialCirugia;
        $materialCirugia=$materialCirugia->mostrar();
        return response()->json($materialCirugia);
    }
    public function detalle($id)
    {
        $materialCirugia = new MaterialCirugia;
        $materialCirugia = $materialCirugia->detalle($id);
        return response()->json($materialCirugia);
    }
    public function actualizar(Request $request,$id)
    {
        $materialCirugia = new MaterialCirugia;
        $materialCirugia = $materialCirugia->actualizar($request,$id);
        if($materialCirugia)
            return response()->json(['message' => 'Actualizacion de materialCirugia exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZAVION DEL materialCirugia'], 200);
    }
}
