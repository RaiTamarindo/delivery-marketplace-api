<?php

namespace JampApp\Router;

use \Slim\App;

use JampApp\Controller\AddressController;
use JampApp\Middleware\AddressValidatorMiddleware;

/**
 * Address routes
 */
class AddressRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('addresses', AddressController::class, new AddressValidatorMiddleware());
    }

}

?>