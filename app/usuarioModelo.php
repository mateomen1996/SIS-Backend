<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarioModelo extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;

    public function crear($params){
        $this ->correo=$params->correo;
        $this ->contrasena=$params->contrasena;
        $this ->save();
        return array(
            'status' => 'Success',
            'code' => 200,
            'message' => 'Usuario registrado exitosamente'
        );
    }
    public function login($params){
        $correo=$params->correo;
        $contrasena=$params->contrasena;

        $cantidad=usuarioModelo::where('correo','=',$correo)->where('contrasena','=',$contrasena)->count();
        if($cantidad>0){
            return array(
                'status' => 'Success',
                'code' => 200,
                'message' => 'Existe el usuario'
            );
        }else{
            return array(
                'status' => 'Success',
                'code' => 200,
                'message' => 'No existe el usuario'
            );
        }
    }
}
