<?php

namespace JumpApp\Service;

use JumpApp\ApiException;
use JumpApp\User;

class UserService extends ResourceService {

    public function create($user) {
        $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT, [ 'cost' => 11 ]);
        
        return parent::create($user);
    }

    protected function getModel() {
        return User::class;
    }

    protected function getConditions($filter) {
        $conditions = array();
        if (isset($filter['name'])) {
            \array_push($conditions, [ 'name', 'like', $filter['name'] . '%' ]);
        }
        if (isset($filter['email'])) {
            \array_push($conditions, [ 'email', '=', $filter['email'] ]);
        }

        return $conditions;
    }

}

?>