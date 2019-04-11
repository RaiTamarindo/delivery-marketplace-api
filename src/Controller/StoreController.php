<?php

namespace JumpApp\Controller;

use JumpApp\Service\StoreService;

class StoreController extends ResourceController {

    public function __construct() {
        parent::__construct(new StoreService());
    }

}
