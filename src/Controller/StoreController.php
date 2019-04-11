<?php

namespace JumpApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use JumpApp\Store;
use JumpApp\User;

class StoreController extends ResourceController {

    public function create(Request $req, Response $res) {
        $store = $req->getParsedBody();
        $user = User::find($store['user']['id']);
        if ($user) {
            unset($store['user']);
            return $user
                ->store()
                ->create($store);
        } else {
            throw new ApiException('This user does not exist', 404);
        }
    }

    public function update(Request $req, Response $res, $args) {
        try {
            $store = $req->getParsedBody();
            unset($store['id']);
            unset($store['user']);
            $this->getModel()::where('id', $args['id'])
                ->update($store);
        } catch(\Exception $e) {
            throw new ApiException('Could not update this new resource', 500);
        }

        return $res->withStatus(204);
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
