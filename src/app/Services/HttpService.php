<?php

namespace App\Services;

use GuzzleHttp\Client;

class HttpService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * HttpService constructor.
     * @param string $base_uri
     */
    public function __construct(string $base_uri)
    {
        $this->client = new Client([
            'base_uri' => $base_uri
        ]);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $method, string $uri = '', array $options = [])
    {
        try {
            $response = $this->client->request($method, $uri, $options);
            return $response;
        } catch (\Exception $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }
}
