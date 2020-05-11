<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $timestamps = FALSE;

    protected $table="estado";
    
    protected $fillable = [
        'id', 'nombre', 'descripcion'
    ];

    public function mostrar(){
        return Estado::all();
    }
}
