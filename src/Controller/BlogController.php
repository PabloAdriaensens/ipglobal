<?php

namespace App\Controller;

use App\Service\PostsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/posts', name: 'posts', methods: ['GET'])]
    public function index(): Response
    {
        $posts = (new PostsService())->getPosts();

        return $this->render('posts/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/posts/{id}', name: 'show_post')]
    public function fetch($id): Response
    {
        $posts = (new PostsService())->getPosts();

        $post = (new PostsService())->specificPost($posts, (int)$id);

        return $this->render('posts/show.html.twig', [
            'post' => $post,
        ]);
    }
}
