<?php

namespace JampApp\Service;

use JampApp\ApiException;
use JampApp\StoreProduct;
use JampApp\Store;
use JampApp\Product;

class StoreProductService extends ResourceService {

    public function findById($id) {
        $storeProduct = parent::findById($id);

        return $storeProduct->load('store', 'product');
    }

    public function create($data) {
        $storeProduct = new StoreProduct();
        $storeProduct->fill($data);
        $store = Store::find($data['store']['id']);
        $product = Product::find($data['product']['id']);
        if (!$store) {
            throw new ApiException('This store does not exist', 404);
        }
        if (!$product) {
            throw new ApiException('This product does not exist', 404);
        }
        $storeProduct['store_id'] = $data['store']['id'];
        $storeProduct['product_id'] = $data['product']['id'];
        $storeProduct->save();

        return $storeProduct->load('store', 'product');
    }

    public function update($id, $data) {
        $storeProduct = StoreProduct::find($id);
        if (!$storeProduct) {
            throw new ApiException('This store product does not exist', 404);
        }
        unset($data['id']);
        unset($data['store']);
        unset($data['product']);
        $storeProduct->fill($data);
        $storeProduct->save();
    }

    protected function getModel() {
        return StoreProduct::class;
    }

    protected function getConditions($filter) {
        $conditions = array();
        if (isset($filter['is_available'])) {
            \array_push($conditions, [ 'is_available', '=', $filter['is_available'] ]);
        }
        if (isset($filter['store'])) {
            \array_push($conditions, [ 'store_id', '=', $filter['store'] ]);
        }
        if (isset($filter['product'])) {
            \array_push($conditions, [ 'product_id', '=', $filter['product'] ]);
        }
        if (isset($filter['min_price'])) {
            \array_push($conditions, [ 'price', '>=', $filter['min_price'] ]);
        }
        if (isset($filter['max_price'])) {
            \array_push($conditions, [ 'price', '<=', $filter['max_price'] ]);
        }

        return $conditions;
    }

}

?>