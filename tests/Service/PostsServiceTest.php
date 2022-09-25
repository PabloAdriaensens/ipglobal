<?php

namespace App\Tests\Util;

use PHPUnit\Framework\TestCase;

class PostsServiceTest extends TestCase
{

    /**
     * @var bool
     */
    private bool $validPost;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->validPost = false;
    }

    /**
     * @return void
     */
    public function testValidPost(): void
    {
        $post = [
            "userId" => 1,
            "title" => "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            "body" => "et iusto sed quo iure voluptatem occaecati omnis eligendi aut ad voluptatem doloribus vel accusantium quis pariatur molestiae porro eius odio et labore et velit aut",
        ];

        if (is_string($post['title']) && is_string($post['body']) && is_int($post['userId'])) {
            $this->validPost = true;
        }

        $this->assertTrue($this->validPost);
    }

    /**
     * @return void
     */
    public function testInvalidPost(): void
    {
        $post = [
            "userId" => "fdsa",
            "title" => 4321,
            "body" => "et iusto sed quo iure voluptatem occaecati omnis eligendi aut ad voluptatem doloribus vel accusantium quis pariatur molestiae porro eius odio et labore et velit aut",
        ];
        if (is_string($post['title']) && is_string($post['body']) && is_int($post['userId'])) {
            $this->validPost = true;
        }

        $this->assertFalse($this->validPost);
    }
}
