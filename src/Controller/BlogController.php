<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use App\Service\PostsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/posts', name: 'app_posts', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $json_response_factory = new JsonResponseFactory();

        $posts = (new PostsService())->getPosts();

        return $json_response_factory->success($posts);
    }
}
