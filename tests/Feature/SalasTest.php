<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

    
class SalasTest extends TestCase
{
    
    public function testCrearSala()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/sala',[
                "nombre"=>"Sala 300",
                "descripcion"=>"Tercer Piso",
        ]);
        $response->assertStatus(200);
    }
    public function testMostrarSalas()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/salas');
        $response->assertStatus(200);
    }
    public function testMostrarSala()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/sala/3');
        $response->assertStatus(200);
    }
    public function testActualizarSala()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('PUT','/api/sala/3',[
            "nombre"=>"Sala 300",
            "descripcion"=>"Tercer Piso",
        ]);
        $response->assertStatus(200);
    }
}
