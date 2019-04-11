<?php

namespace JumpApp\Controller;

use JumpApp\Service\StoreProductService;

class StoreProductController extends ResourceController {

    public function __construct() {
        parent::__construct(new StoreProductService());
    }

}
