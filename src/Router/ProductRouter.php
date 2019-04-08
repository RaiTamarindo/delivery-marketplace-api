<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\ProductController;

/**
 * Product routes
 */
class ProductRouter implements IRouter {

        
    /**
     * Defines all product routes
     *
     * @param  \Slim\App $app
     * @return void
     */
    public function apply(App $app) {
        $app->group('/products', function() {
            
            // TODO

        });
    }

}

?>