<?php

namespace JumpApp\Controller;

use JumpApp\Product;

class ProductController extends ResourceController {

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
