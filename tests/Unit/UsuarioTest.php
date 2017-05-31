<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioTest extends TestCase
{

    const URI = 'http://proyectogrado.dev/';
    //const uri = 'http://api-demo.com:82/';
    private $dataToken;
    private $client;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->client = new \GuzzleHttp\Client();
        $this->dataToken = $this->testGetAccessToken();

    }

    /**
     * @return mixed
     */
    public function testGetAccessToken()
    {
        $response =
            $this->client->request('POST',self::URI.'oauth/access_token',[
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

    public function testStoreCodigoEstado200()
    {

        $response =
            $this->client->request('POST', self::URI.'usuarios',[
                'form_params' => [
                    'access token' => $this->dataToken['access_token'],
                    'fechaNacimiento' => '1989-04-04',
                    'identificacion' => '987654321',
                    'nombres' => 'JUAN',
                    'apellidos' => 'PEPITO PEREZ',
                    'userName' => 'juan.pepito',
                    'correo' => 'juan.pepito@demo.com',
                    'contrasenia' => '12345678',
                    'contrasenia_confirmation' => '12345678',
                    'idRol' => 3,
                    'idConjunto' => 1
                ]
            ]);

        $this->assertEquals($response->getStatusCode(), 200);

        return \GuzzleHttp\json_decode($response->getBody(), true);
    }

    /**
     * @depends testStoreCodigoEstado200
     */
    public function testUpdateCodigoEstado200(array $dataUsuario)
    {

        $client = new \GuzzleHttp\Client();

        $response =
            $client->request('PUT', self::URI.'usuarios/' . $dataUsuario['id_usuario'],[
                'form_params' => [
                    'access token' => $this->dataToken['access_token'],
                    'fechaNacimiento' => '1989-04-04',
                    'identificacion' => '987654321',
                    'nombres' => 'JUAN',
                    'apellidos' => 'Pepito Garcia',
                    'userName' => 'juan.pepito',
                    'correo' => 'juan.pepito@demo.com',
                    'contrasenia' => '12345678',
                    'contrasenia_confirmation' => '12345678',
                    'idRol' => 3,
                    'idConjunto' => 1
                ]
            ]);

        $this->assertEquals($response->getStatusCode(), 200);
        return \GuzzleHttp\json_decode($response->getBody(), true);
    }

    /**
     * @depends testUpdateCodigoEstado200
     */
    public function testUsuarioCodigoEstado200(array $dataUsuario)
    {
        $url = self::URI.'usuarios/' . $dataUsuario['id_usuario'].'?access token='.$this->dataToken['access_token'];

        $response =
            $this->client->request('GET',$url);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
     * @depends testUpdateCodigoEstado200
     */
    public function testUsuariosCodigoEstado200(array $dataUsuario)
    {
        $url = self::URI.'usuarios?access token='.$this->dataToken['access_token'];

        $response =
            $this->client->request('GET',$url);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testMiUsuarioCodigoEstado200()
    {
        $url = self::URI.'miusuario?access token='.$this->dataToken['access_token'];

        $response =
            $this->client->request('GET',$url);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
