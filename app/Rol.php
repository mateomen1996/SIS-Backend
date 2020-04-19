<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table="rol";
    //
    public function getRoles(){
        return Rol::all();
    }
}
