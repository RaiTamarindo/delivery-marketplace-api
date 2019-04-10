<?php

namespace JumpApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use JumpApp\ApiException;

abstract class ResourceController {

    /**
     * Find one resource by id
     * @param $req Request
     * @param $res Response
     * @param $args Route params
     */
    public function get(Request $req, Response $res, $args) {
        $resource = $this->getModel()::find($args['id']);
        if (!$resource) {
            throw new ApiException('Resource not found', 404);
        }

        return $res
            ->withStatus(200)
            ->withJson($resource);
    }

    /**
     * Find resources by filter
     * @param $req Request
     * @param $res Response
     */
    public function find(Request $req, Response $res) {
        $filter = $req->getQueryParams();
        $query = $this->getModel()::where($this->getConditions($filter));
        $total = $query->count();
        if (isset($filter['page']) && isset($filter['limit'])) {
            $query = $query
                ->skip($filter['page'] * $filter['limit'])
                ->take($filter['limit']);
        }
        $resources = $query->get();

        return $res
            ->withStatus(200)
            ->withJson([
                'data' => $resources,
                'filter' => $filter,
                'total' => $total,
            ]);
    }

    /**
     * Creates a new resource
     * @param $req Request
     * @param $res Response
     */
    public function create(Request $req, Response $res) {
        try {
            $resource = $req->getParsedBody();
            $createdResource = $this->getModel()::create($resource);
        } catch(\Exception $e) {
            throw new ApiException('Could not create this new resource', 500);
        }

        return $res
            ->withStatus(201)
            ->withJson($createdResource);
    }

    /**
     * Updates a resource
     * @param $req Request
     * @param $res Response
     * @param $args Route params
     */
    public function update(Request $req, Response $res, $args) {
        try {
            $resource = $req->getParsedBody();
            unset($resource['id']);
            $this->getModel()::where('id', $args['id'])
                ->update($resource);
        } catch(\Exception $e) {
            throw new ApiException('Could not update this new resource', 500);
        }

        return $res->withStatus(204);
    }

    /**
     * Removes a resource
     * @param $req Request
     * @param $res Response
     * @param $args Route params
     */
    public function remove(Request $req, Response $res, $args) {
        try {
            $this->getModel()::destroy($args['id']);
        } catch(\Exception $e) {
            throw new ApiException('Could not remove this resource', 500);
        }
        return $res->withStatus(204);
    }

    protected abstract function getModel();
    protected abstract function getConditions($filter);

}