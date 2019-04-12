<?php

namespace JampApp\Router;

use \Slim\App;

use JampApp\Controller\StoreProductController;
use JampApp\Middleware\StoreProductValidatorMiddleware;

/**
 * StoreProduct routes
 */
class StoreProductRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('store-products', StoreProductController::class, new StoreProductValidatorMiddleware());
    }

}

?>