<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $timestamps = FALSE;

    protected $table="materiales";
    
    protected $fillable = [
        'id', 'nombre', 'descripcion', 'id_estado', 'cantidad', 'estadoe'
    ];

    public function mostrar(){
        return Material::all();
    }
    public function detalle($id){
        return Material::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        
        $material = Material::find($id);
        $material->nombre=$request->nombre;
        $material->descripcion=$request->descripcion;
        $material->id_estado=$request->id_estado;
        $material->cantidad=$request->cantidad;
        
        return $material->save();
    }
    public function eliminar($request,$id){
        
        $material = Material::find($id);
        $material->estadoe=1;
        return $material->save();
    }
}
