<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cirugia extends Model
{
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
        ->where('id_doctor', '=', $id_doctor)
        ->get();  
    }
    public function actualizar($request,$id){
        $cirugia = Cirugia::find($id);

        $cirugia->id_paciente=$request->id_paciente;
        $cirugia->id_sala=$request->id_sala;
        $cirugia->fechaIngreso=$request->fechaIngreso;
        $cirugia->fechaSalida=$request->fechaSalida;

        return $cirugia->save();
    }
    
}
