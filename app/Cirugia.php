<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cirugia extends Model
{
    public $timestamps = FALSE;

    protected $table="cirugias";
    //
    protected $fillable = [
        'id_doctor', 'id_paciente', 'id_sala', 'fechaIngreso', 'fechaSalida'
    ];
}
