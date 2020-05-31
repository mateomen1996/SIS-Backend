<?php

namespace App\Http\Controllers;

use App\MaterialCirugia;
use Illuminate\Http\Request;

class materialCirugiaController extends Controller
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

        $materialCirugia = new MaterialCirugia([
            'id_material'         =>$request->id_material,
            'id_cirugia'         =>$request->id_cirugia,
            'cantidad'         =>$request->cantidad,
        ]);
        
        $materialCirugia=$materialCirugia->save();
        if($materialCirugia)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'fallo'], 200);
    }
    public function mostrar()
    {
        $materialCirugia= new MaterialCirugia;
        $materialCirugia=$materialCirugia->mostrar();
        return response()->json($materialCirugia);
    }
    public function detalle($id)
    {
        $materialCirugia = new MaterialCirugia;
        $materialCirugia = $materialCirugia->detalle($id);
        return response()->json($materialCirugia);
    }
    public function actualizar(Request $request,$id)
    {
        $materialCirugia = new MaterialCirugia;
        $materialCirugia = $materialCirugia->actualizar($request,$id);
        if($materialCirugia)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'fallo'], 200);
    }
    public function materialEnCirugia(Request $request,$id)
    {
        $materialCirugia = new MaterialCirugia;
        $materialCirugia = $materialCirugia->materialEnCirugia($id);
        return response()->json($materialCirugia);
    }
    public function eliminar(Request $request,$id)
    {
        $materialCirugia = new MaterialCirugia;
        $materialCirugia = $materialCirugia->eliminar($request,$id);
        if($materialCirugia)
            return response()->json(['message' => 'Exito'], 200);
        else
            return response()->json(['message' => 'fallo'], 200);
    }
    
}
