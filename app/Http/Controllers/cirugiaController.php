<?php

namespace App\Http\Controllers;

use App\Cirugia;
use App\Email;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\Prueba;

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
        if($cirugia->verificarDoctorOtraCirugia($request->fechaIngreso,$request->fechaSalida,$request->user()->id)!=0){
            return response()->json(['message' => 'Choque de horario entre cirugias'], 200);
        }
        if($cirugia->verificarSilaSalaOcupada($request->fechaIngreso,$request->fechaSalida,$request->id_sala)!=0){
            return response()->json(['message' => 'La sala ya se encuntra ocupada'], 200);
        }
        
        $cirugia->save(); 
        return response()->json(['message' => 'Registro exitoso cirugias'], 200);


        $user=new User;
        $email=$user->detalle($request->id_paciente)[0]['email'];


        $email = new Email([
            'email'             => $email,
            'fechaIngreso'      => $request->fechaIngreso,
            'fechaSalida'       => $request->fechaSalida,
        ]);
        $email->notify(new Prueba($email));


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
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
            

    }
}
