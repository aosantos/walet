<?php

class UserTest extends \Tests\TestCase
{

    public function testGetAll()
    {
        $response = $this->call('GET', '/api/index');

        $this->assertEquals(200, $response->status());

    }

    public function testGet()
    {
        $response = $this->call('GET', '/api/show/1');

        $this->assertEquals(200, $response->status());
    }

    public function testCreate()
    {
        $params = [
            "nome_completo"=> "Bento Silva",
            "email"=> "bento@hotmail.com.br",
            "cpf"=> "32589741876",
            "senha"=> "password",
            "carteira"=> 30.00
        ];

        $response = $this->call('POST', '/api/store', $params);

        $this->assertEquals(400, $response->status());


    }

    public function testUpdate()
    {
        $params = [
            "nome_completo"=> "Juca ",
            "email"=> "juca@hotmail.com",
            "cpf"=> "0265984758",
            "senha"=> "432432",
            "carteira"=> 50.00
        ];

        $response = $this->call('PUT', '/api/update/3', $params);

        $this->assertEquals(200, $response->status());
    }

    public function testDelete()
    {
        $response = $this->call('DELETE', '/api/delete/5');

        $this->assertEquals(200, $response->status());
    }
}
