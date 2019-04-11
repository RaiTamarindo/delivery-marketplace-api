<?php

namespace JumpApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use JumpApp\ApiException;
use JumpApp\StoreProduct;
use JumpApp\Store;
use JumpApp\Product;

class StoreProductController extends ResourceController {

    public function create(Request $req, Response $res) {
        $data = $req->getParsedBody();
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

        return $res
            ->withStatus(201)
            ->withJson($storeProduct->load('store', 'product'));
    }

    public function update(Request $req, Response $res, $args) {
        $data = $req->getParsedBody();
        $storeProduct = StoreProduct::find($args['id']);
        if (!$storeProduct) {
            throw new ApiException('This store product does not exist', 404);
        }
        unset($data['id']);
        unset($data['store']);
        unset($data['product']);
        $storeProduct->fill($data);
        $storeProduct->save();

        return $res->withStatus(204);
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
