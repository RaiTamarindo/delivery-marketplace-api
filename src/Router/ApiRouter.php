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
        $productRouter = new ProductRouter();
        $global = new GlobalRouter();
        $app->group('/api', function() use ($productRouter) {
            $productRouter->apply($this);
            $global->apply($this);
        });
    }

}

?>