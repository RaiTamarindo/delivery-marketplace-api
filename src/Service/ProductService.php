<?php

namespace JumpApp\Service;

use JumpApp\Product;

class ProductService extends ResourceService {

    public function findByFilter($filter) {
        $query = Product::with('stores.store')
            ->where($this->getConditions($filter));
        $total = $query->count();
        if (isset($filter['page']) && isset($filter['limit'])) {
            $query = $query
                ->skip($filter['page'] * $filter['limit'])
                ->take($filter['limit']);
        }
        $resources = $query->get();

        return [
            'data' => $resources,
            'filter' => $filter,
            'total' => $total,
        ];
    }

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