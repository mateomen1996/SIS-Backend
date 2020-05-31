<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_rol', 'id_user', 'active', 'activation_token', 'apaterno', 'amaterno', 'carnet', 'celular', 'telefono', 'fecha_nac', 'emergencia', 'tel_emergencia', 'direccion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token',
    ];
    
    public function userCreator($id)
    {
        return User::where('id_user', '=',$id)->get();  
    }
    
    public function getUser($id,$id_user)
    {
        return User::where('id', '=', $id)
        ->get();  
    }
    public function getUserDoctor()
    {
        return User::where('id_rol', '=', 2)
        ->get();  
    }
    public function getUserEncargado()
    {
        return User::where('id_rol', '=', 3)
        ->get();  
    }
    public function getUserPaciente()
    {
        return User::where('id_rol', '=', 4)
        ->get();  
    }
    public function getUsers()
    {
        return User::all();
    }
    public function detalle($id)
    {
        return User::where('id', '=', $id)
        ->get();  
    }
}
