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
}