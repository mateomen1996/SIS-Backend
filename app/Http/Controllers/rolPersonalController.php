<?php

namespace App\Http\Controllers;

use App\RolPersonal;
use Illuminate\Http\Request;

class rolPersonalController extends Controller
{
    public function mostrar()
    {
        $rolPersonal= new RolPersonal;
        $rolPersonal=$rolPersonal->mostrar();
        return response()->json($rolPersonal);
    }
}
