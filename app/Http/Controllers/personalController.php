<?php

namespace App\Http\Controllers;
use App\Personal;
use Illuminate\Http\Request;

class personalController extends Controller
{
    public function crear(Request $request)
    {

        $rules = [ 
        ];
        $messages = [
        ];
        
        $validator = \Validator::make($request->all(),$rules,$messages);
 
        if($validator->fails()){
            return response()-> json([
                'message' => $validator->errors()->all()
                ],200);
        }

        $personal = new Personal([
            'nombre'            =>$request->nombre,
            'apellidoP'         =>$request->apellidoP,
            'apellidoM'         =>$request->apellidoM,
            'direccion'         =>$request->direccion,
            'telefono'          =>$request->telefono,
            'id_rol'            =>$request->id_rol
        ]);
        
        $personal=$personal->save();
        if($personal)
            return response()->json(['message' => 'Creacion de personal exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA CREACION DEL PERSONAL'], 200);
    }
    public function mostrar()
    {
        $personal= new Personal;
        $personal=$personal->mostrar();
        return response()->json($personal);
    }
    public function detalle($id)
    {
        $personal = new Personal;
        $personal = $personal->detalle($id);
        return response()->json($personal);
    }
    public function actualizar(Request $request,$id)
    {
        $personal = new Personal;
        $personal = $personal->actualizar($request,$id);
        if($personal)
            return response()->json(['message' => 'Actualizacion de personal exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA ACTUALIZAVION DEL PERSONAL'], 200);
    }
    public function eliminar(Request $request,$id)
    {
        $personal = new Personal;
        $personal = $personal->eliminar($request,$id);
        if($personal)
            return response()->json(['message' => 'Eliminacion de personal exitoso'], 200);
        else
            return response()->json(['message' => 'ERROR EN LA eliminacion DEL PERSONAL'], 200);
    }
}
