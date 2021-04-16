<?php

namespace controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController extends Controller
{
    private $twig;

    // constructor receives container instance
    public function __construct()
    {
        $loader = new FilesystemLoader('../view');
        $this->twig = new Environment($loader);
    }

    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $response->getBody()->write($this->twig->render('home.twig.php', ['name' => 'robin']));
        return $response;
    }
}
