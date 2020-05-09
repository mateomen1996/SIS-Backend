<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialCirugia extends Model
{
    public $timestamps = FALSE;

    protected $table="materiales_cirugia";
    
    protected $fillable = [
        'id', 'id_material', 'id_cirugia'
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
        return $materialCirugia->save();
    }
}
