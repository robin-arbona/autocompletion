<?php

namespace controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->preloadTwig();
    }

    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $BASE_PATH = BASE_PATH;

        $response->getBody()->write($this->twig->render('home.twig.php', compact('BASE_PATH')));
        return $response;
    }
}
