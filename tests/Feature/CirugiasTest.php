<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

    
class CirugiasTest extends TestCase
{
    
    public function testCrearCirugia()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/cirugia',[
                "id_paciente"=>7,
                "id_sala"=>79,
                "fechaIngreso"=>"2020-04-19 01:27:47",
                "fechaSalida"=>"2020-04-19 02:27:47"
        ]);
        $response->assertStatus(200);
        $response->assertJson(["message"=>"La sala ya se encuntra ocupada"]);

    }
    public function testMostrarCirugia()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/cirugia/getCirugias');
        $response->assertStatus(200);
    }
    public function testMostrarCirugias()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/cirugia/59');
        $response->assertStatus(200);
    }
    public function testActualizarCirugia()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/cirugia/59',[
            "id_paciente"=>7,
            "id_sala"=>79,
            "fechaIngreso"=>"2020-04-19 01:27:47",
            "fechaSalida"=>"2020-04-19 02:27:47"
        ]);
        $response->assertStatus(200);

    }
    public function testCrearCirugiaMismaSala()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/cirugia',[
                "id_paciente"=>7,
                "id_sala"=>79,
                "fechaIngreso"=>"2020-04-19 01:27:47",
                "fechaSalida"=>"2020-04-19 02:27:47"
        ]);
        $response->assertStatus(200);
        $response->assertJson(["message"=>"La sala ya se encuntra ocupada"]);

    }
}
