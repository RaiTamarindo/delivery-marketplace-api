<?php

namespace JampApp\Service;

use JampApp\Product;

class ProductService extends ResourceService {

    private $addressService;
    private $routeService;

    public function __construct() {
        $this->addressService = new AddressService();
        $this->routeService = new RouteService();
    }

    public function findByFilter($filter) {
        $query = Product::with('stores.store')
            ->where($this->getConditions($filter));
        $total = $query->count();
        if (isset($filter['page']) && isset($filter['limit'])) {
            $query = $query
                ->skip($filter['page'] * $filter['limit'])
                ->take($filter['limit']);
        }
        $products = $query->get();
        if (isset($filter['address'])) {
            $this->loadDistancesToStores($filter['address'], $products);
        }

        return [
            'data' => $products,
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

    private function loadDistancesToStores($addressId, $products) {
        $storesDistances = array();
        foreach ($products as $product) {
            foreach ($product->stores as $storeProduct) {
                $storesDistances[$storeProduct->store->id] = 0;
            }
        }
        $storeIds = \array_keys($storesDistances);
        $address = $this->addressService->findByIdWithRoutesTo($addressId, $storeIds);
        foreach ($address->routes as $route) {
            $storesDistances[$route->store_id] = $route->distance;
        }
        foreach ($products as $product) {
            foreach ($product->stores as $storeProduct) {
                if ($storesDistances[$storeProduct->store->id] > 0) {
                    $storeProduct->distance = $storesDistances[$storeProduct->store->id];
                } else {
                    $route = $this->routeService
                        ->createStraightLineRoute($address, $storeProduct->store);
                    $storeProduct->distance = $route->distance;
                    $storesDistances[$storeProduct->store->id] = $route->distance;
                }
            }
        }
    }

}

?>