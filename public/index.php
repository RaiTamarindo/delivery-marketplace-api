<?php

require __DIR__ . '/../vendor/autoload.php';

use \Slim\App;
use \Slim\Container;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use JumpApp\Router\ApiRouter;

$container = new Container([
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,
    ]
]);

$container['notFoundHandler'] = function($c) {
    return function(Request $req, Response $res) use ($c) {
        return $res->withStatus(404);
    };

};

$app = new App($container);
$router = new ApiRouter();

// API routes
$router->apply($app);

$app->run();

?>