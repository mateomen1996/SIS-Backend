<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsumoCirugia extends Model
{
    public $timestamps = FALSE;

    protected $table="insumos_cirugia";
    
    protected $fillable = [
        'id', 'id_insumo', 'id_cirugia', 'cantidad'
    ];

    public function mostrar(){
        return InsumoCirugia::all();
    }
    public function detalle($id){
        return InsumoCirugia::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        
        $insumoCirugia = InsumoCirugia::find($id);
        $insumoCirugia->id_insumo=$request->id_insumo;
        $insumoCirugia->id_cirugia=$request->id_cirugia;       
        $insumoCirugia->cantidad=$request->cantidad;       
        return $insumoCirugia->save();
    }
    public function insumoEnCirugia($id){
        return InsumoCirugia::where('id_cirugia', '=', $id)
        ->get();  
    }
    public function eliminar($request,$id){
        
        $insumoCirugia = InsumoCirugia::find($id);
        return $insumoCirugia->delete();
    }
}
