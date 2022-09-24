<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class JsonPlaceholderApiClient
{
    /**
     * @var Client
     */
    private $_client;

    /**
     * @param $base_uri
     */
    public function __construct($base_uri)
    {
        $this->_client = new Client(
            [
                // Base URI is used with relative requests
                'base_uri' => $base_uri,
                // Timeout if a server does not return a response
                'timeout' => 2.0,
            ]
        );
    }

    /**
     * @param $endpoint
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function getByParameters($endpoint, $params = []): array
    {
        try {
            $response = $this->_client->request(
                'GET',
                $endpoint,
                [
                    'query' => $params,
                ]
            );
            $response->getHeaderLine('application/json');

            return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        } catch (\Exception $e) {
            return [];
        }
    }
}