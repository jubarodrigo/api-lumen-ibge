<?php

namespace App\Services;

class IbgeService
{
    /**
     * @var $http_service
     */
    protected $http_service;

    /**
     * IbgeService constructor.
     */
    public function __construct()
    {
        $this->http_service = new HttpService('https://servicodados.ibge.gov.br/api/v1/');
    }

    public function getCitiesByUf(string $uf)
    {
        try {

            $association_uri = "localidades/estados/{$uf}/municipios";

            $response = $this->http_service->request("GET",$association_uri);
            return $response->getBody()->getContents();

        } catch (\Exception $exception) {
            return $exception->getCode();

        }
    }

}
