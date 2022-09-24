<?php

namespace App\Service;

use GuzzleHttp\Exception\GuzzleException;

class UsersService
{
    /**
     * @param $userId
     * @return bool
     * @throws GuzzleException
     */
    public function validateUser($userId): bool
    {
        $client = new JsonPlaceholderApi();

        $authors = $client->getByParameters('/users');

        $authorExists = array_search($userId, array_column($authors, 'id'), true);

        if ($authorExists) {
            return true;
        }

        return false;
    }
}