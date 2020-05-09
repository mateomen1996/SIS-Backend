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
        $response->assertStatus(200)
        ->assertJson(['status'=>'SUCCESS']);
    }
    public function testMostrarUsuario()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/user/7');
        $response->assertStatus(200)
        ->assertJson(['status'=>'SUCCESS']);
    }
   
    public function testActualizarUsuario()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/user/3',[
            "name"=>"Nanita"
        ]);
        $response->assertStatus(200)
        ->assertJson(['status'=>'SUCCESS']);
    }
}
