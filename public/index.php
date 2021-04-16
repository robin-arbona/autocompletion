<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

//$app->setBasePath(rtrim(dirname($_SERVER["REQUEST_URI"]), '/'));
$app->setBasePath('Projectpool3/autocompletion/public/');

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write($_SERVER["REQUEST_URI"]);
    return $response;
});

$app->get('/test', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world test!");
    return $response;
});

$app->run();
