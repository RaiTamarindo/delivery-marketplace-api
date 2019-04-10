<?php

require __DIR__ . '/../bootstrap.php';

use \Slim\App;
use \Slim\Container;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr7Middlewares\Middleware\TrailingSlash;

use JumpApp\Router\ApiRouter;
use JumpApp\APIException;

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
$container['errorHandler'] = function($c) {
    return function(Request $req, Response $res, Exception $exception) use ($c) {
        $status = $exception instanceof APIException ? $exception->getStatus() : 500;
        return $res
            ->withStatus($status)
            ->withJson(['error' => $exception->getMessage()]);
    };
};

$app = new App($container);
$app->add(new TrailingSlash(false));
$router = new ApiRouter();

// API routes
$router->apply($app);

$app->run();

?>