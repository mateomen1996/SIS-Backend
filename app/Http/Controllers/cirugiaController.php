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
}
