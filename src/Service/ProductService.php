<?php

namespace JumpApp\Service;

use JumpApp\Product;

class ProductService extends ResourceService {

    protected function getModel() {
        return Product::class;
    }

    protected function getConditions($filter) {
        $conditions = array();
        if (isset($filter['barcode'])) {
            \array_push($conditions, [ 'barcode', '=', $filter['barcode'] ]);
        }
        if (isset($filter['name'])) {
            \array_push($conditions, [ 'name', 'like', $filter['name'] . '%' ]);
        }

        return $conditions;
    }

}

?>