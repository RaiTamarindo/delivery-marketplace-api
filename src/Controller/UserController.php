<?php

namespace JumpApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use JumpApp\User;
use JumpApp\ApiException;

class UserController extends ResourceController {

    public function create(Request $req, Response $res) {
        $user = $req->getParsedBody();
        try {
            $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT, [ 'cost' => 11 ]);
            $createdUser = $this->getModel()::create($user);
        } catch(\Exception $e) {
            throw new ApiException('Could not create this new user', 500);
        }

        return $res
            ->withStatus(201)
            ->withJson($createdUser);
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
