<?php

namespace JampApp\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use JampApp\ApiException;
use JampApp\Service\ResourceService;

abstract class ResourceController {

    protected $service;

    public function __construct(ResourceService $service) {
        $this->service = $service;
    }

    /**
     * Find one resource by id
     * @param $req Request
     * @param $res Response
     * @param $args Route params
     */
    public function get(Request $req, Response $res, $args) {
        $resource = $this->service->findById($args['id']);
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
        $result = $this->service->findByFilter($filter);

        return $res
            ->withStatus(200)
            ->withJson($result);
    }

    /**
     * Creates a new resource
     * @param $req Request
     * @param $res Response
     */
    public function create(Request $req, Response $res) {
        $resource = $req->getParsedBody();
        $createdResource = $this->service->create($resource);

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
        $resource = $req->getParsedBody();
        unset($resource['id']);
        $this->service->update($args['id'], $resource);

        return $res->withStatus(204);
    }

    /**
     * Removes a resource
     * @param $req Request
     * @param $res Response
     * @param $args Route params
     */
    public function remove(Request $req, Response $res, $args) {
        $this->service->remove($args['id']);

        return $res->withStatus(204);
    }

}