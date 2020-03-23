<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarioModelo;

class usuarioControlador extends Controller
{
    public function crear(Request $request){
        
        //Transformar Json
        $json=$request->all('json',null);
        $params_array=json_decode(json_encode($json), true);
        $params=json_decode((json_encode($json)));
        
        //Validacion de los datos
        $validate = \Validator::make($params_array,[
            //'correo'=>'required',
            'contrasena'=>'required']);
        if($validate -> fails()){
            return response() -> json($validate -> errors(),400);
        }else{
            
            $usuario = new usuarioModelo();
            $data = $usuario->crear($params);
            
        }
        return response() -> json($data,200);
    }
    public function login(Request $request){
        
        //Transformar Json
        $json=$request->all('json',null);
        $params_array=json_decode(json_encode($json), true);
        $params=json_decode((json_encode($json)));
        
        //Validacion de los datos
        $validate = \Validator::make($params_array,[
            //'correo'=>'required',
            'contrasena'=>'required']);
        if($validate -> fails()){
            return response() -> json($validate -> errors(),400);
        }else{
            
            $usuario = new usuarioModelo();
            $data = $usuario->login($params);
            
        }
        return response() -> json($data,200);
    }
}
