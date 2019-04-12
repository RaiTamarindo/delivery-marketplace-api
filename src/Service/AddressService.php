<?php

namespace JampApp\Service;

use JampApp\Address;

class AddressService extends ResourceService {

    public function findByIdWithRoutesTo($id, $storeIds) {
        return $this->getModel()::with([ 'routes' => function ($query) use ($storeIds) {
            $query->whereIn('store_id', $storeIds);
        }])->find($id);
    }

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
