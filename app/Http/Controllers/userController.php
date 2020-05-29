<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


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
            return response()-> json(['message' => $validator->errors()->all()],200);
        }


        $pertenencia= User::where('id', '=', $id)
        ->where('id_user', '=', $request->user()->id)
        ->count();

        if($pertenencia==0){
            return response()->json(['message' => 'No autorizado'], 200);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        return response()->json(['message' => 'Exito'], 200);
    }
}
