<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public $timestamps = FALSE;

    protected $table="personal";
    
    protected $fillable = [
        'id', 'nombre', 'apellidoP','apellidoM','direccion','telefono','id_rol','estado'
    ];

    public function mostrar(){
        return Personal::all();
    }
    public function detalle($id){
        return Personal::where('id', '=', $id)
        ->get();  
    }
    public function actualizar($request,$id){
        
        $personal = Personal::find($id);
        $personal->nombre=$request->nombre;
        $personal->apellidoP=$request->apellidoP;
        $personal->apellidoM=$request->apellidoM;
        $personal->direccion=$request->direccion;
        $personal->telefono=$request->telefono;
        $personal->id_rol=$request->id_rol;

        return $personal->save();
    }
    public function eliminar($request,$id){
        
        $personal = Personal::find($id);
        $personal->estado=1;

        return $personal->save();
    }
}
