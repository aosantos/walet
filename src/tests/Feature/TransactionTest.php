<?php

class TransactionTest extends \Tests\TestCase
{

    public function testTransaction()
    {

        # Envio de parametros
        $params = array(
            "value" => 1.00,
            "payer" =>4
        );
        $response = $this->call('POST', '/api/transaction', $params);

        # Confere se o status do resultado
        $this->assertEquals(400, $response->status());

    }

}
