<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    public $timestamps = FALSE;

    protected $table="salas";
    
    protected $fillable = [
        'id', 'nombre', 'descripcion'
    ];

    public function getSalas(){
        return Salas::all();
    }
    public function getSala($id){
        return Salas::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        $sala = Salas::find($id);

        $sala->nombre=$request->nombre;
        $sala->descripcion=$request->descripcion;

        return $sala->save();
    }
}
