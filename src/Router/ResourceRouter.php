<?php

namespace JampApp\Router;

use \Slim\App;

abstract class ResourceRouter implements IRouter {

    private $base_route;
    private $controller;
    private $validator;

    public function __construct($base_route, $controller, $validator = null) {
        $this->base_route = $base_route;
        $this->controller = $controller;
        $this->validator = $validator;
    }

    public function apply(App $app) {
        $_this = $this;
        $app->group('/' . $this->base_route, function(App $app) use ($_this) {
            $app->get('/{id}', $_this->controller . ':get');
            $app->get('', $_this->controller . ':find');
            $createRoute = $app->post('', $_this->controller . ':create');
            $updateRoute = $app->put('/{id}', $_this->controller . ':update');
            $app->delete('/{id}', $_this->controller . ':remove');
            $_this->extraRoutes($app);
            if ($_this->validator) {
                $createRoute->add($_this->validator);
                $updateRoute->add($_this->validator);
            }
        });
    }

    protected function extraRoutes(App $app) {
        //
    }

}

?>