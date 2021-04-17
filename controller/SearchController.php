<?php

namespace controller;

use core\Model;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class SearchController extends Controller
{
    public function search(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $keyword = isset($args['keyword']) ? $args['keyword'] : '';
        $model = new Model();
        $results = $model->search($keyword, 'nom', 'dictionnaire');


        if (isset($args['show']) && $args['show'] === 'render') {
            $BASE_PATH = BASE_PATH;
            $template = ($request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest') ? 'xhr.twig.php' : 'base.twig.php';
            $this->preloadTwig();
            $response->getBody()->write($this->twig->render('results.twig.php', compact('results', 'keyword', 'template', 'BASE_PATH')));
        } else {
            $payload = json_encode($results);
            $response->getBody()->write($payload);
            $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        }

        return $response;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = isset($args['id']) ? $args['id'] : '';
        $model = new Model();
        $result = $model->getBy('id', $id, 'dictionnaire');

        $template = ($request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest') ? 'xhr.twig.php' : 'base.twig.php';
        $BASE_PATH = BASE_PATH;

        $this->preloadTwig();
        $response->getBody()->write($this->twig->render('result.twig.php', compact('result', 'template', 'BASE_PATH')));

        return $response;
    }
}
