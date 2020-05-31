<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use Illuminate\Http\Request;
use App\Notifications\Contraseña;


class userController extends Controller
{
    public function userCreator(Request $request)
    {
        $user = new User;
        if($request->user()->id_rol==1){
            $user = $user->getUsers();
            return response()->json(['message' => 'Exito',$user], 200);
        }else{
            $user = $user->userCreator($request->user()->id);
            return response()->json(['message' => 'Exito',$user], 200);
        }
        

    }
    public function getUser(Request $request,$id)
    {
        $user = new User;
        $user = $user->getUser($id,$request->user()->id);
        return response()->json(['message' => 'Exito',$user], 200);
    }
    public function doctor()
    {
        $user = new User;
        $user = $user->getUserDoctor();
        return response()->json(['message' => 'Exito',$user], 200);
    }
    public function encargado()
    {
        $user = new User;
        $user = $user->getUserEncargado();
        return response()->json(['message' => 'Exito',$user], 200);
    }
    public function paciente(Request $request)
    {
        $user = new User;
        if($request->user()->id_rol==1){
            $user = $user->getUserPaciente();
            return response()->json(['message' => 'Exito',$user], 200);
        }else{
            $user = $user->userCreator($request->user()->id);
            return response()->json(['message' => 'Exito',$user], 200);
        }
    }
    public function update(Request $request,$id)
    {

        $rules = [
            'name'      => 'required|string'
        ];
        $messages = [
            'name.required' => 'nombre requerido.',
            'name.string' =>'nombre invalido.',

        ];
        
        $validator = \Validator::make($request->all(),$rules,$messages);
 
        if($validator->fails()){
            return response()-> json([
                'message' => "fallo",
                'errores'=>$validator->errors()->all()
                ],200);
        }


        $pertenencia= 0;
        if($pertenencia==0){
            return response()->json(['message' => 'No autorizado'], 200);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->apaterno = $request->apaterno;
        $user->amaterno = $request->amaterno;
        $user->carnet = $request->carnet;
        $user->celular = $request->celular;
        $user->telefono = $request->telefono;
        $user->fecha_nac = $request->fecha_nac;
        $user->direccion = $request->direccion;
        $user->emergencia = $request->emergencia;
        $user->tel_emergencia = $request->tel_emergencia;
        $user->save();

        return response()->json(['message' => 'Exito'], 200);
    }
    public function resetpass(Request $request,$id)
    {

        $pass=str_random(8);

        $user = User::find($id);
        $user->password =bcrypt($pass);

        $user->save();


        $user=new User;
        $email=$user->detalle($id)[0]['email'];


        $objet = new Email([
            'email'             => $email,
            'dato'          => $pass,
        ]);
        $objet->notify(new Contraseña($email));

        return response()->json(['message' => 'Exito'], 200);
    }
}
