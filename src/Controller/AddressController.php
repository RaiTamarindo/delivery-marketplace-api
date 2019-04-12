<?php

namespace JampApp\Controller;

use JampApp\Service\AddressService;

class AddressController extends ResourceController {

    public function __construct() {
        parent::__construct(new AddressService());
    }

}
