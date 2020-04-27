<?php

namespace App\Http\Controllers;

use App\Cirugia;
use Illuminate\Http\Request;

class cirugiaController extends Controller
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

        $cirugia = new Cirugia([
            'id_doctor'         => $request->user()->id,
            'id_paciente'       => $request->id_paciente,
            'id_sala'           => $request->id_sala,
            'fechaIngreso'      => $request->fechaIngreso,
            'fechaSalida'       => $request->fechaSalida,
        ]);
        
        $cirugia->save(); 

        return response()->json(['message' => 'Registro de cirugia exitoso'], 200);

    }
    public function getCirugias(Request $request)
    {
        $cirugia = new Cirugia;
        $cirugia = $cirugia->getCirugias($request->user()->id);
        return $cirugia;
    }
    public function getCirugia(Request $request,$id)
    {
        $cirugia = new Cirugia;
        $cirugia = $cirugia->getCirugia($id,$request->user()->id);
        return response()->json($cirugia);
    }
    public function update(Request $request,$id)
    {
        $cirugia = new Cirugia;
        $cirugia = $cirugia->actualizar($request,$id);
        if($cirugia)
            return response()->json(['message' => 'Actualizacion de cirugia exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZAVION DE LA CIRUGIA'], 200);
            

    }
}
