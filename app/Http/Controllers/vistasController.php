<?php

namespace App\Http\Controllers;

use App\Vistas;
use Illuminate\Http\Request;

class vistasController extends Controller
{
    public function cirugias()
    {
        $cirugias= new Vistas;
        $cirugias=$cirugias->cirugias();
        return response()->json($cirugias);
    }
}
