<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class estadoController extends Controller
{
    public function mostrar()
    {
        $estado= new Estado;
        $estado=$estado->mostrar();
        return response()->json($estado);
    }
    
}
