<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

    
class AutentificacionTest extends TestCase
{
    
    public function testCrearUsuario()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/auth/signup',[
            "name"=>"asdasasdd",
            "email"=>"asdasfasdssd@gmail.com",
            "password"=>"asdasds",
            "password_confirmation"=>"asdasds",
            "id_rol"=>4
        ]);
        $response->assertStatus(200);
    }
    public function testLogin()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->json('POST','/api/auth/login',[
            "email"=>"mateomen1996@gmail.com",
        	"password"=>"mateo123"
        ]);
        $response->assertStatus(200);
    }
    /*public function testLogOut()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/auth/logout');
        $response->assertStatus(200);
    }*/ 
    public function testUser()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/auth/user');
        $response->assertStatus(200);
    }
}
