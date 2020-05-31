<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public $timestamps = FALSE;

    protected $table="insumos";
    
    protected $fillable = [
        'id', 'nombre', 'descripcion', 'cantidad', 'estadoe'
    ];

    public function mostrar(){
        return Insumo::where('estadoe', '=', "0")
        ->get();     }
    public function detalle($id){
        return Insumo::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        
        $insumo = Insumo::find($id);
        $insumo->nombre=$request->nombre;
        $insumo->descripcion=$request->descripcion;
        $insumo->cantidad=$request->cantidad;
        
        return $insumo->save();
    }
    public function eliminar($request,$id){
        
        $insumo = Insumo::find($id);
        $insumo->estado=1;

        return $insumo->save();
    }
}
