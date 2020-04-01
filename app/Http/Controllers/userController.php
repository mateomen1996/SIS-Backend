<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class userController extends Controller
{
    public function user()
    {
        return response()->json(user::all());
    }
    public function userCreator(Request $request)
    {
        return response()->json(
            
            User::where('id_user', '=', $request->user()->id)->get()
        );

    }
    public function getUser(Request $request,$id)
    {

        return response()->json(
            User::where('id', '=', $id)
            ->where('id_user', '=', $request->user()->id)
            ->get()
        );

    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'      => 'required|string'
        ]);

        $pertenencia= User::where('id', '=', $id)
        ->where('id_user', '=', $request->user()->id)
        ->count();

        if($pertenencia==0){
            return response()->json(['message' => 'NO AUTORIZADO'], 401);
        }
    
        $user = User::find($id);

        $user->name = $request->name;

        $user->save();

        return response()->json(['message' => 'Usuario Actuilizado existosamente!'], 201);
    }
}
