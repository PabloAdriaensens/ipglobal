<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use App\Service\PostsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiBlogController extends AbstractController
{
    #[Route('/api/posts', name: 'api_posts', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $json_response_factory = new JsonResponseFactory();

        $posts = (new PostsService())->getPosts();

        return $json_response_factory->success($posts);
    }

    #[Route('/api/posts', name: 'post_api_post', methods: ['POST'])]
    public function post(Request $request): Response
    {
        $json_response_factory = new JsonResponseFactory();

        $parameter = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $validPost = (new PostsService())->validatePost($parameter);

        if (!$validPost) {
            return $json_response_factory->error('Invalid syntax for this request was provided.', 401);
        }

        return $json_response_factory->success($parameter);
    }
}
