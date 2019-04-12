<?php

namespace JampApp\Router;

use \Slim\App;

use JampApp\Controller\ProductController;

/**
 * Product routes
 */
class ProductRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('products', ProductController::class);
    }

}

?>