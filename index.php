<?php

use controller\HomeController;
use controller\SearchController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($className) {
    $filePath =  str_replace('\\', '/', $className) . '.php';
    if (file_exists($filePath)) {
        require($filePath);
    }
});

/**
 * Instantiate App
 *
 * In order for the factory to work you need to ensure you have installed
 * a supported PSR-7 implementation of your choice e.g.: Slim PSR-7 and a supported
 * ServerRequest creator (included with Slim PSR-7)
 */
$app = AppFactory::create();

// Adapt rooter to sub directory
define('BASE_PATH', rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/'));
$app->setBasePath(BASE_PATH);

// Add Routing Middleware
$app->addRoutingMiddleware();

/**
 * Add Error Handling Middleware
 *
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.
 
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Define app routes

$app->get('/', HomeController::class . ':home');

$app->get('/search/{keyword:[\w%]+}[/{show}]', SearchController::class . ':search');

$app->get('/show/{id:[0-9]+}', SearchController::class . ':show');

$app->get('/{slug:.*base_path.*}', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write(json_encode(['base_path' => BASE_PATH]));
    return $response
        ->withHeader('Content-type', 'application/json')
        ->withStatus(201);
});



// Run app
$app->run();
