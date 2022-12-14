<?php

namespace App\Service;

use GuzzleHttp\Exception\GuzzleException;

class JsonPlaceholderApi
{
    /**
     * @var string
     */
    private string $base_uri = 'https://jsonplaceholder.typicode.com';

    /**
     * @param $route
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function getByParameters($route, array $params = []): array
    {
        return (new JsonPlaceholderApiClient($this->base_uri))->getByParameters($route, $params);
    }
}