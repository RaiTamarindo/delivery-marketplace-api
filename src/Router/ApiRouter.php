<?php

namespace JumpApp\Router;

use \Slim\App;

/**
 * API entry point
 */
class ApiRouter implements IRouter {

        
    /**
     * Defines application routes
     *
     * @param  \Slim\App $app
     * @return void
     */
    public function apply(App $app) {
        $routers = array(
            new UserRouter(),
            new ProductRouter(),
            new StoreRouter(),
        );
        $app->group('/api', function() use ($routers) {
            foreach($routers as $router) {
                $router->apply($this);
            }
        });
    }

}

?>