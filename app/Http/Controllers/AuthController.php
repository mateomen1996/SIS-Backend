<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SignupActivate;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $id_user=0;
        $permiso="";
        if($request->user()->id_rol==1){
            $permiso="Integer|in:1,2,3,4,5,6";
        }else{
            if($request->user()->id_rol==2){
                $permiso="Integer|in:4,5";
            }else{
                return response()->json(['message' => 'No autorizado'], 200);
            }
        }


        $rules = [
            'name'      => 'required|string',
            'email'     => 'required|string|email|unique:users',
            'id_rol'    => $permiso,
        ];
        $messages = [
            'name.required' => 'nombre requerido.',
            'name.string' => 'nombre invalido.',
            'email.required' => 'Correo requerido.',
            'email.email' =>'Debe ingresar un correo electronico.',
            'email.string' => 'Correo invalido.',
            'email.unique' => 'Ya se encuentra registrado este correo',
            'id_rol.in' => 'No cuenta con los permisos para crear este tipo de cuenta',
        ];
        $validator = \Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()-> json([
                'message' => "fallo",
                'errores'=>$validator->errors()->all()
                ],200);
        }
        $pass=str_random(8);
        $user = new User([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => bcrypt($pass),
            'activation_token'  => str_random(60),
            'id_rol'  => $request->id_rol,
            'id_user'  => $request->user()->id,

            "apaterno" => $request->apaterno,
            "amaterno" => $request->amaterno,
            "carnet" => $request->carnet,
            "celular" => $request->celular,
            "telefono" => $request->telefono,
            "direccion" => $request->direccion,
            "fecha_nac" => $request->fecha_nac,
            "emergencia" => $request->emergencia,
            "tel_emergencia" => $request->tel_emergencia
        ]);
        
        $user->save();
        $user['password']=$pass;
        $user->notify(new SignupActivate($user));

        return response()->json(['message' => 'Exito'], 200);
    }
    public function login(Request $request)
    {
        $rules = [
            'email'       => 'required|email',
            'password'    => 'required|string',
        ];
        $messages = [
            'email.required' => 'Correo requerido.',
            'email.email' =>'Correo invalido.',
            'password.required' => 'Contraseña requerida.',
            'password.string' => 'Contraseña invalida.',
        ];
        
        $validator = \Validator::make($request->all(),$rules,$messages);
 
        if($validator->fails()){
            return response()-> json([
                'message' => "fallo",
                'errores'=>$validator->errors()->all()
                ],200);
                
        }
        
        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;
        
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'No Autorizado'], 200);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Token Acceso Personal');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'message' => 'Exito'
        ],200);
    }
    public function logout(Request $request)
    {
        echo $request->user()->token()->revoke();
        return response()->json(['message' => 'Exito'],200);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json(['message' => 'Invalido Token'], 200);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return $user;
    }
}