<?php

namespace App\Service;

use GuzzleHttp\Exception\GuzzleException;

class PostsService
{
    /**
     * @param $post
     * @return bool
     * @throws GuzzleException
     */
    public function validatePost($post): bool
    {
        $usersService = new UsersService();
        if (is_string($post['title']) && is_string($post['body']) && is_int($post['userId'])) {
            $validAuthor = $usersService->validateUser($post['userId']);
            if ($validAuthor) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    public function getPosts(): array
    {
        $client = new JsonPlaceholderApi();

        $posts = $client->getByParameters('/posts');
        $authors = $client->getByParameters('/users');

        foreach ($posts as &$post) {
            $arrayValues = array_filter($authors, static function ($author) use ($post) {
                return $author['id'] == $post['userId'];
            });
            $authorFiltered = array_shift($arrayValues);
            array_push($authorFiltered);
            $post['author'] = $authorFiltered;
        }

        return $posts;
    }
}