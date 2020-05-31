<?php

namespace App\Http\Controllers;

use App\InsumoCirugia;
use Illuminate\Http\Request;

class insumoCirugiaController extends Controller
{
    public function crear(Request $request)
    {

        $rules = [ 
            'cantidad'      => "numeric|min:1",
        ];
        $messages = [
            'cantidad.min' => 'La cantidad requerida  debe ser mayor o igual a 1 ',

        ];
        
        $validator = \Validator::make($request->all(),$rules,$messages);
 
        if($validator->fails()){
            return response()-> json([
                'message' => "fallo",
                'errores'=>$validator->errors()->all()
                ],200);
        }

        $insumoCirugia = new InsumoCirugia([
            'id_insumo'         =>$request->id_insumo,
            'id_cirugia'         =>$request->id_cirugia,
            'cantidad'         =>$request->cantidad,
        ]);
        
        $insumoCirugia=$insumoCirugia->save();
        if($insumoCirugia)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Error'], 200);
    }
    public function mostrar()
    {
        $insumoCirugia= new InsumoCirugia;
        $insumoCirugia=$insumoCirugia->mostrar();
        return response()->json($insumoCirugia);
    }
    public function detalle($id)
    {
        $insumoCirugia = new InsumoCirugia;
        $insumoCirugia = $insumoCirugia->detalle($id);
        return response()->json($insumoCirugia);
    }
    public function actualizar(Request $request,$id)
    {
        $insumoCirugia = new InsumoCirugia;
        $insumoCirugia = $insumoCirugia->actualizar($request,$id);
        if($insumoCirugia)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'Exito'], 200);
    }
    public function insumoEnCirugia(Request $request,$id)
    {
        $insumoCirugia = new InsumoCirugia;
        $insumoCirugia = $insumoCirugia->insumoEnCirugia($id);
        return response()->json($insumoCirugia);
    }
    public function eliminar(Request $request,$id)
    {
        $insumoCirugia = new InsumoCirugia;
        $insumoCirugia = $insumoCirugia->eliminar($request,$id);
        if($insumoCirugia)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'fallo'], 200);
    }
}
