<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class userController extends Controller
{
    public function userCreator(Request $request)
    {
        $user = new User;
        $user = $user->userCreator($request->user()->id);
        return response()->json($user);

    }
    public function getUser(Request $request,$id)
    {
        $user = new User;
        $user = $user->getUser($id,$request->user()->id);
        return response()->json($user);


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
                'message' => $validator->errors()->all()
                ],200);
        }


        $pertenencia= User::where('id', '=', $id)
        ->where('id_user', '=', $request->user()->id)
        ->count();

        if($pertenencia==0){
            return response()->json(['message' => 'No cuenta con los permisos suficientes'], 201);
        }
    
        $user = User::find($id);

        $user->name = $request->name;
        

        $user->save();

        return response()->json(['message' => 'Usuario Actuilizado existosamente!'], 201);
    }
}
