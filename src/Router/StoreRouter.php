<?php

namespace JampApp\Router;

use \Slim\App;

use JampApp\Controller\StoreController;
use JampApp\Middleware\StoreValidatorMiddleware;

/**
 * Store routes
 */
class StoreRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('stores', StoreController::class, new StoreValidatorMiddleware());
    }

}

?>