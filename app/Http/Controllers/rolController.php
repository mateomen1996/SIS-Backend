<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class rolController extends Controller
{
    //
    public function getRol()
    {
        return response()->json(rol::all());
    }
}
