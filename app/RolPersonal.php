<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolPersonal extends Model
{
    public $timestamps = FALSE;

    protected $table="rol_personal";
    
    protected $fillable = [
        'id', 'nombre', 'descripcion'
    ];
    public function mostrar(){
        return RolPersonal::all();
    }
}
