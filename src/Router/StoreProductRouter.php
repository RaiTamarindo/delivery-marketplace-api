<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\StoreProductController;

/**
 * StoreProduct routes
 */
class StoreProductRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('store-products', StoreProductController::class);
    }

}

?>