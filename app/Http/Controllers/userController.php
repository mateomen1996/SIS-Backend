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
}
