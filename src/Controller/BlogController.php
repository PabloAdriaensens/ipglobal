<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use App\Service\JsonPlaceholderApi;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/posts', name: 'app_posts', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $client = new JsonPlaceholderApi();
        $json_response_factory = new JsonResponseFactory();

        $response = $client->getByParameters('/posts');

        return $json_response_factory->success($response);
    }
}
