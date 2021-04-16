<?php

namespace controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class HomeController
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('view');
        $this->twig = new Environment($loader);
    }

    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $name = isset($args['name']) ? $args['name'] : 'you!';
        $response->getBody()->write($this->twig->render('home.twig.php', ['name' => $name]));
        return $response;
    }
}
