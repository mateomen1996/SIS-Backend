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
    public function materiales()
    {
        $materiales= new Vistas;
        $materiales=$materiales->materiales();
        return response()->json($materiales);
    }
    public function encargado(Request $request)
    {
        $cirugia = new Vistas;
        $cirugia = $cirugia->encargado($request);
        return $cirugia;
    }
    public function cirugiasEspera(Request $request)
    {
        $dato = new Vistas;
        $dato = $dato->cirugiasEspera($request);
        return response()->json(['message' => $dato], 200);
    }
    public function personal(Request $request)
    {
        $dato = new Vistas;
        $dato = $dato->personal($request);
        return $dato;
    }
}
