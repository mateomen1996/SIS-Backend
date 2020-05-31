<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialCirugia extends Model
{
    public $timestamps = FALSE;

    protected $table="materiales_cirugia";
    
    protected $fillable = [
        'id', 'id_material', 'id_cirugia', 'cantidad'
    ];

    public function mostrar(){
        return MaterialCirugia::all();
    }
    public function detalle($id){
        return MaterialCirugia::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        
        $materialCirugia = MaterialCirugia::find($id);
        $materialCirugia->id_material=$request->id_material;
        $materialCirugia->id_cirugia=$request->id_cirugia;       
        $materialCirugia->cantidad=$request->cantidad;       
        return $materialCirugia->save();
    }
    public function materialEnCirugia($id){
        return MaterialCirugia::where('id_cirugia', '=', $id)
        ->get();  
    }
    public function eliminar($request,$id){
        
        $materialCirugia = MaterialCirugia::find($id);
        return $materialCirugia->delete();
    }
}
