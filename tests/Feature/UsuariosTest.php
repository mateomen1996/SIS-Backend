<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

    
class UsuariosTest extends TestCase
{
    
    public function testMostrarUsuarios()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/userCreator');
        $response->assertStatus(200)->assertJson(["message"=>"Exitoso"]);
    }
    public function testMostrarUsuario()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/user/7');
        $response->assertStatus(200)->assertJson(["message"=>"Exitoso"]);
    }
   
    public function testActualizarUsuario()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('PUT','/api/user/7',[
            "name"=>"Nanita"
        ]);
        $response->assertStatus(200);
        $response->assertJson(["message"=>"Exitoso"]);
    }
    public function testActualizarUsuarioNoPropio()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('PUT','/api/user/1',[
            "name"=>"Nanitass"
        ]);
        $response->assertStatus(200)->assertJson(["message"=>"No autorizado"]);
    }
}
