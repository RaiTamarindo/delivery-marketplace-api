<?php

namespace JumpApp\Service;

use JumpApp\ApiException;
use JumpApp\Store;
use JumpApp\User;

class StoreService extends ResourceService {

    public function create($data) {
        $store = new Store();
        $user = User::find($data['user']['id']);
        if ($user) {
            unset($data['user']);
            $store->fill($data);
            $store['user_id'] = $user->id;
            $store->save();
        } else {
            throw new ApiException('This user does not exist', 404);
        }

        return $store;
    }

    public function update($id, $data) {
        $store = Store::find($id);
        if (!$store) {
            throw new ApiException('This store does not exist', 404);
        }
        unset($data['id']);
        unset($data['user']);
        $store->fill($data);
        $store->save();
    }

    protected function getModel() {
        return Store::class;
    }

    protected function getConditions($filter) {
        $conditions = array();
        if (isset($filter['name'])) {
            \array_push($conditions, [ 'name', 'like', $filter['name'] . '%' ]);
        }

        return $conditions;
    }

}

?>