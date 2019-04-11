<?php

namespace JumpApp\Controller;

use JumpApp\Service\ProductService;

class ProductController extends ResourceController {

    public function __construct() {
        parent::__construct(new ProductService());
    }

}
