<?php

namespace JampApp\Controller;

use JampApp\Service\StoreProductService;

class StoreProductController extends ResourceController {

    public function __construct() {
        parent::__construct(new StoreProductService());
    }

}
