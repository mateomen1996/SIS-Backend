<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class rolController extends Controller
{
    //
    public function rol()
    {
        return response()->json(rol::all());
    }
}
