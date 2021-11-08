<?php

class IbgeIntegrationTest extends TestCase
{

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testHealthCheck()
    {
        $http = new \App\Services\HttpService('https://servicodados.ibge.gov.br/api/v1/');
        $association_uri = "localidades/estados/SP/municipios";
        $response = $http->request("GET", $association_uri);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testApiReturn()
    {
        $http = new \App\Services\HttpService('https://servicodados.ibge.gov.br/api/v1/');
        $association_uri = "localidades/estados/SP/municipios";
        $response = $http->request("GET", $association_uri);

        $this->assertNotEquals("[]", $response->getBody()->getContents());
    }
}
