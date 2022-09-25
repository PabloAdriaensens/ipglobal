<?php

namespace App\Tests\Controller;

use JsonException;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiBlogControllerTest extends WebTestCase
{
    /**
     * @var KernelBrowser
     */
    private KernelBrowser $client;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testUrlExists(): void
    {
        $this->client->request('GET', '/api/posts');
        $haystack = json_decode($this->client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertNotEmpty($haystack);
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testApiPosts(): void
    {
        $this->client->request('GET', '/api/posts');
        $expected = json_decode($this->client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR);
        self::assertResponseIsSuccessful();
        $this->assertCount(
            100,
            $expected['data'],
            'Returns all posts.'
        );
    }
}
