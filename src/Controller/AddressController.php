<?php

namespace JumpApp\Controller;

use JumpApp\Service\AddressService;

class AddressController extends ResourceController {

    public function __construct() {
        parent::__construct(new AddressService());
    }

}
