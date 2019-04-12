<?php

namespace JampApp\Router;

use \Slim\App;

use JampApp\Controller\UserController;
use JampApp\Middleware\UserValidatorMiddleware;

/**
 * User routes
 */
class UserRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('users', UserController::class, new UserValidatorMiddleware());
    }

}

?>