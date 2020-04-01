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
}
