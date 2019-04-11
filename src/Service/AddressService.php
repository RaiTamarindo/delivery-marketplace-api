<?php

namespace JumpApp\Service;

use JumpApp\Address;

class AddressService extends ResourceService {

    protected function getModel() {
        return Address::class;
    }

    protected function getConditions($filter) {
        $conditions = array();
        if (isset($filter['zipcode'])) {
            \array_push($conditions, [ 'zipcode', '=', $filter['zipcode'] ]);
        }

        return $conditions;
    }

}

?>
