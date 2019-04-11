<?php

namespace JumpApp\Router;

use \Slim\App;

use JumpApp\Controller\AddressController;

/**
 * Address routes
 */
class AddressRouter extends ResourceRouter {

    public function __construct() {
        parent::__construct('addresses', AddressController::class);
    }

}

?>