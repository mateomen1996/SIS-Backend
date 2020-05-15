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
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
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
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
    }
    public function eliminar(Request $request,$id)
    {
        $personalcirugia = new PersonalCirugia;
        $personalcirugia = $personalcirugia->eliminar($request,$id);
        if($personalcirugia)
        return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
    }
    public function personalDeUnaCirugia($id_cirugia)
    {
        $personalcirugia = new PersonalCirugia;
        $personalcirugia = $personalcirugia->personalDeUnaCirugia($id_cirugia);
        return response()->json($personalcirugia);
    }
}
