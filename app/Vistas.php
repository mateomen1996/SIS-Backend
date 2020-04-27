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
}
