<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class rolController extends Controller
{
    //
    public function mostrar()
    {
        $roles= new Rol;
        $roles=$roles->getRoles();
        return response()->json($roles,200);
    }
}
