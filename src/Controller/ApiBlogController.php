<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use App\Service\BlogFormatter;
use App\Service\JsonPlaceholderApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiBlogController extends AbstractController
{
    #[Route('/api/posts/{id}', name: 'app_api_blog')]
    public function index($id): JsonResponse
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
}
