<?php

namespace App\Tests\Util;

use App\Service\JsonPlaceholderApi;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

class UsersServiceTest extends TestCase
{

    /**
     * @var JsonPlaceholderApi
     */
    private JsonPlaceholderApi $client;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->client = new JsonPlaceholderApi();
    }

    /**
     * @return void
     * @throws GuzzleException
     */
    public function testValidUser(): void
    {
        $userId = 5;

        $authors = $this->client->getByParameters('/users');

        $authorExists = array_search($userId, array_column($authors, 'id'), true);

        $this->assertTrue((bool)$authorExists);
    }

    /**
     * @return void
     * @throws GuzzleException
     */
    public function testInvalidUser(): void
    {
        $userId = 12;

        $authors = $this->client->getByParameters('/users');

        $authorExists = array_search($userId, array_column($authors, 'id'), true);

        $this->assertFalse((bool)$authorExists);
    }
}
