<?php

namespace controller;

use core\Model;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class SearchController
{
    public function search(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $keyword = isset($args['keyword']) ? $args['keyword'] : '';
        $model = new Model();
        $results = $model->search($keyword, 'nom', 'dictionnaire');

        $payload = json_encode($results);
        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return $response;
    }
}
