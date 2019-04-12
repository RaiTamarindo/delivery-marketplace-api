<?php

namespace JampApp\Service;

use JampApp\Route;
use JampApp\Address;
use JampApp\Store;

class RouteService extends ResourceService {

    const R = 6371000;

    public function createStraightLineRoute(Address $address, Store $store) {
        $route = new Route();
        $route->address_id = $address->id;
        $route->store_id = $store->id;
        $route->is_straight_line = true;
        $route->distance = $this->computeStraightLineDistance($address, $store);
        $route->save();

        return $route;
    }

    protected function getModel() {
        return Route::class;
    }

    protected function getConditions($filter) {
        $conditions = array();
        if (isset($filter['address'])) {
            \array_push($conditions, [ 'address_id', '=', $filter['address'] ]);
        }
        if (isset($filter['store'])) {
            \array_push($conditions, [ 'store_id', '=', $filter['store'] ]);
        }

        return $conditions;
    }

    private function computeStraightLineDistance(Address $address, Store $store) {
        $theta1 = \deg2rad($address->latitude);
        $theta2 = \deg2rad($store->latitude);
        $delta_theta = \deg2rad($store->latitude - $address->latitude);
        $delta_lambda = \deg2rad($store->longitude - $address->longitude);

        $a = \sin($delta_theta/2) * \sin($delta_theta/2) +
            \cos($theta1) * \cos($theta2) * \sin($delta_lambda/2) * \sin($delta_lambda/2);
        $c = 2 * \atan2(\sqrt($a), \sqrt(1 - $a));

        return self::R * $c;
    }

}

?>
