<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cirugia extends Model
{
    use  Notifiable;

    public $timestamps = FALSE;

    protected $table="cirugias";
    //
    protected $fillable = [
        'id','id_doctor', 'id_paciente', 'id_sala', 'fechaIngreso', 'fechaSalida'
    ];

    public function getCirugias($id_doctor){ 
        return Cirugia::where('id_doctor', '=', $id_doctor)
        ->get();  
    }
    
    public function getCirugia($id,$id_doctor){
        return Cirugia::where('id', '=', $id)
        //->where('id_doctor', '=', $id_doctor)
        ->get();  
    }
    public function actualizar($request,$id){
        $cirugia = Cirugia::find($id);

        $cirugia->id_paciente=$request->id_paciente;
        $cirugia->id_sala=$request->id_sala;
        $cirugia->id_proceso=$request->id_proceso;
        $cirugia->fechaIngreso=$request->fechaIngreso;
        $cirugia->fechaSalida=$request->fechaSalida;

        return $cirugia->save();
    }
    public function verificarDoctorOtraCirugia($fechaEnt,$fechaSal,$id_doctor){
        return Cirugia::where('id_doctor', '=', $id_doctor)
        ->whereBetween('fechaIngreso', [$fechaEnt, $fechaSal])
        ->count();  
    }
    public function verificarSilaSalaOcupada($fechaEnt,$fechaSal,$id_sala){
        return Cirugia::where('id_sala', '=', $id_sala)
        ->whereBetween('fechaIngreso', [$fechaEnt, $fechaSal])
        ->count();  
    }
    public function cambiarProceso($request,$id){
        $cirugia = Cirugia::find($id);
        $cirugia->id_proceso=$request->id_proceso;
        return $cirugia->save();
    }
}
