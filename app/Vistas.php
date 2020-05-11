<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vistas extends Model
{
    public function cirugias(){

        $cirugias = DB::table('personal')
        ->join('rol_personal', 'rol_personal.id', '=', 'personal.id_rol')
        ->select('personal.*','rol_personal.nombre as rol')
        ->get();

        return $cirugias;
    }
    public function materiales(){

        $materiales = DB::table('materiales')
        ->join('estado', 'estado.id', '=', 'materiales.id_estado')
        ->select('materiales.*','estado.nombre as estado')
        ->get();

        return $materiales;
    }
}
