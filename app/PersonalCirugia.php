<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalCirugia extends Model
{
    public $timestamps = FALSE;

    protected $table="personal_cirugia";
    
    protected $fillable = [
        'id', 'id_personal', 'id_cirugia'
    ];

    public function mostrar(){
        return PersonalCirugia::all();
    }
    public function detalle($id){
        return PersonalCirugia::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        
        $personalcirugia = PersonalCirugia::find($id);
        $personalcirugia->id_personal=$request->id_personal;
        $personalcirugia->id_cirugia=$request->id_cirugia;
        
        return $personalcirugia->save();
    }
    public function eliminar($request,$id){
        $personalcirugia = PersonalCirugia::find($id);
        return $personalcirugia->delete();
    }
    public function personalDeUnaCirugia($id_cirugia){
        return PersonalCirugia::where('id_cirugia', '=', $id_cirugia)
        ->get();  
    }
}
