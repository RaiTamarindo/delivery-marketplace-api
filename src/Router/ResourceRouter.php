<?php

namespace JumpApp\Router;

use \Slim\App;

abstract class ResourceRouter implements IRouter {

    private $base_route;
    private $controller;

    public function __construct($base_route, $controller) {
        $this->base_route = $base_route;
        $this->controller = $controller;
    }

    public function apply(App $app) {
        $_this = $this;
        $app->group('/' . $this->base_route, function(App $app) use ($_this) {
            $app->get('/{id}', $_this->controller . ':get');
            $app->get('', $_this->controller . ':find');
            $app->post('', $_this->controller . ':create');
            $app->put('/{id}', $_this->controller . ':update');
            $app->delete('/{id}', $_this->controller . ':remove');
            $_this->extraRoutes($app);
        });
    }

    protected function extraRoutes(App $app) {
        //
    }

}

?>