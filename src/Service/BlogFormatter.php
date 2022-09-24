<?php

namespace App\Service;

class BlogFormatter
{

    /**
     * @param $posts
     * @param $id
     * @return array
     */
    public function specificPost($posts, $id): array
    {
        $specificPost = [];
        foreach ($posts as $post) {
            if ((int)$post['id'] === $id) {
                $specificPost = $post;
            }
        }

        return $specificPost;
    }

    /**
     * @param $post
     * @return array
     */
    public function validatePost($post): array
    {
        $apiId = 100;
        if (is_string($post['title']) && is_string($post['body']) && is_int($post['userId'])) {
            $apiId++;
            $post['id'] = $apiId;
        } else {
            $post = [];
        }

        return $post;
    }
}