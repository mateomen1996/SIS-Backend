<?php

namespace App\Http\Controllers;

use App\Salas;
use Illuminate\Http\Request;

class salaController extends Controller
{
    public function salas()
    {
        $salas= new Salas;
        $salas=$salas->getSalas();
        return response()->json($salas);
    }
}
