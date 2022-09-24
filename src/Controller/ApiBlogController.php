<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use App\Service\BlogFormatter;
use App\Service\JsonPlaceholderApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiBlogController extends AbstractController
{
    #[Route('/api/posts/{id}', name: 'fetch_api_post', methods: ['GET'])]
    public function fetch($id): JsonResponse
    {
        $client = new JsonPlaceholderApi();
        $response = $client->getByParameters(['ids' => $id]);
        $json_response_factory = new JsonResponseFactory();

        $post = (new BlogFormatter())->specificPost($response, (int)$id);

        if (!empty($post)) {
            return $json_response_factory->success($post);
        }

        return $json_response_factory->error('Invalid syntax for this request was provided.', 404);
    }

    #[Route('/api/posts', name: 'post_api_post', methods: ['POST'])]
    public function post(Request $request): Response
    {
        $json_response_factory = new JsonResponseFactory();

        $parameter = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $post = (new BlogFormatter())->validatePost($parameter);

        if (!empty($post)) {
            return $json_response_factory->success($post);
        }

        return $json_response_factory->error('Invalid syntax for this request was provided.', 404);
    }
}
