<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vistas extends Model
{
    public function cirugias(){

        $cirugias = DB::table('personal')
        ->join('rol_personal', 'rol_personal.id', '=', 'personal.id_rol')
        ->where('personal.estado',"=","0")
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
    public function encargado($request){ 
        if($request->user()->id_rol==3){
            $cirugias = DB::table('cirugias')
            ->join('proceso', 'proceso.id', '=', 'cirugias.id_proceso')
            ->where('proceso.id',"=","1")
            ->orWhere('proceso.id',"=","2")
            ->select('cirugias.*','proceso.nombre as proceso')
            ->get();
        }else{
            $cirugias = DB::table('cirugias')
            ->join('proceso', 'proceso.id', '=', 'cirugias.id_proceso')
            ->select('cirugias.*','proceso.nombre as proceso')
            ->get();
        }
        

        return $cirugias;
    }
    public function cirugiasEspera($request){ 

        $cirugias = DB::table('cirugias')
        ->join('proceso', 'proceso.id', '=', 'cirugias.id_proceso')
        ->where('proceso.id',"=","1")
        ->select('cirugias.*','proceso.nombre as proceso')
        ->count();
        return $cirugias;
    }
    public function personal($request){ 

        $cirugias = DB::table('personal')
        ->join('rol_personal', 'rol_personal.id', '=', 'personal.id_rol')
        ->where('personal.estado',"=","0")
        ->select('personal.*','rol_personal.nombre as rol')
        ->get();
        return $cirugias;
    }
    
}
