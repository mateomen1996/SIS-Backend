<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

    
class PersonalCirugia extends TestCase
{
    
    public function testCrearPersonalCirugia()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/personalCirugia/crear',[
            "id_cirugia"=>14,
            "id_personal"=>1,
        ]);
        $response->assertStatus(200);
    }
    public function testMostrarPersonalCirugia()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/personalCirugia/mostrar');
        $response->assertStatus(200);
    }
    public function testMostrarPersonalCirugiaDetalle()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('POST','/api/personalCirugia/detalle/3');
        $response->assertStatus(200);
    }
    public function testActualizarPersonalCirugia()
    {
        $response = $this->withHeaders([
            'Authorization'=>"Bearer ".$_POST['tokenADM'],
        ])->json('PUT','/api/personalCirugia/actualizar/1',[
            "id_personal"=>1,
            "id_cirugia"=>14
        ]);
        $response->assertStatus(200);
    }
}
