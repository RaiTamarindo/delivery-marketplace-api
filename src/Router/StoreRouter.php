<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\StoreController;
use JumpApp\Middleware\StoreValidatorMiddleware;

/**
 * Store routes
 */
class StoreRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('stores', StoreController::class, new StoreValidatorMiddleware());
    }

}

?>