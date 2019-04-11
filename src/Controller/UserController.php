<?php

namespace JumpApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use JumpApp\Service\UserService;

class UserController extends ResourceController {

    public function __construct() {
        parent::__construct(new UserService());
    }

}
