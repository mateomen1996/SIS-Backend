<?php

namespace App\Http\Controllers;

use App\PersonalCirugia;
use Illuminate\Http\Request;

class personalCirugiaController extends Controller
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

        $personalcirugia = new PersonalCirugia([
            'id_cirugia'            =>$request->id_cirugia,
            'id_personal'            =>$request->id_personal
        ]);
        
        $personalcirugia=$personalcirugia->save();
        if($personalcirugia)
            return response()->json(['message' => 'Creacion de cirugiaPersonal exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA CREACION DEL CIRUGIAPERSONAL'], 200);
    }
    public function mostrar()
    {
        $personalcirugia= new PersonalCirugia;
        $personalcirugia=$personalcirugia->mostrar();
        return response()->json($personalcirugia);
    }
    public function detalle($id)
    {
        $personalcirugia = new PersonalCirugia;
        $personalcirugia = $personalcirugia->detalle($id);
        return response()->json($personalcirugia);
    }
    public function actualizar(Request $request,$id)
    {
        $personalcirugia = new PersonalCirugia;
        $personalcirugia = $personalcirugia->actualizar($request,$id);
        if($personalcirugia)
            return response()->json(['message' => 'Actualizacion de cirugiaPersonal exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZAVION DEL CIRUGIAPERSONAL'], 200);
    }
}