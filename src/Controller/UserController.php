<?php

namespace JampApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use JampApp\Service\UserService;

class UserController extends ResourceController {

    public function __construct() {
        parent::__construct(new UserService());
    }

}
