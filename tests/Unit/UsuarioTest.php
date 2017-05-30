<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioTest extends TestCase
{

    const uri = 'http://proyectogrado.dev/oauth/access_token';

    public function testGetAccessToken()
    {
        $client = new \GuzzleHttp\Client();

        $response =
            $client->request('POST','http://proyectogrado.dev/oauth/access_token',[
                'form_params' => [
                    'grant_type'=> 'password',
                    'client_id' => 'f3d259ddd3ed8ff3843839b',
                    'client_secret' => '4c7f6f8fa93d59c45502c0ae8c4a95b',
                    'username' => 'superAdmin@demo.com',
                    'password' => '12345678'
                ]
            ]);


        $this->assertEquals(200, $response->getStatusCode());
        return \GuzzleHttp\json_decode($response->getBody(), true);
    }


    /**
     * @depends testGetAccessToken
     */
    public function testStore(array $dataToken)
    {
        $client = new \GuzzleHttp\Client();

        $response =
            $client->request('');
    }
}
