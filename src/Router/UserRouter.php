<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\UserController;

/**
 * User routes
 */
class UserRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('users', UserController::class);
    }

}

?>