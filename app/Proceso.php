<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    public $timestamps = FALSE;

    protected $table="proceso";
    
    protected $fillable = [
        'id', 'nombre', 'descripcion'
    ];

    public function mostrar(){
        return Proceso::all();
    }
    public function detalle($id){
        return Proceso::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        
        $proceso = Proceso::find($id);
        $proceso->nombre=$request->proceso;
        $proceso->descripcion=$request->proceso;
       
        return $proceso->save();
    }
}
