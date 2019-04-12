<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\UserController;
use JumpApp\Middleware\UserValidatorMiddleware;

/**
 * User routes
 */
class UserRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('users', UserController::class, new UserValidatorMiddleware());
    }

}

?>