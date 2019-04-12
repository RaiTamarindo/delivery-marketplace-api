<?php

namespace JampApp\Controller;

use JampApp\Service\ProductService;

class ProductController extends ResourceController {

    public function __construct() {
        parent::__construct(new ProductService());
    }

}
