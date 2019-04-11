<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\StoreController;

/**
 * Store routes
 */
class StoreRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('stores', StoreController::class);
    }

}

?>