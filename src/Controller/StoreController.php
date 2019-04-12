<?php

namespace JampApp\Controller;

use JampApp\Service\StoreService;

class StoreController extends ResourceController {

    public function __construct() {
        parent::__construct(new StoreService());
    }

}
