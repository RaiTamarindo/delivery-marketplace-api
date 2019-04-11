<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\ProductController;

/**
 * Product routes
 */
class ProductRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('products', ProductController::class);
    }

}

?>