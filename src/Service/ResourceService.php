<?php

namespace JumpApp\Service;

use JumpApp\ApiException;

abstract class ResourceService {
    
    /**
     * Find one resource by id
     * @param $id Resource id
     */
    public function findById($id) {
        return $this->getModel()::find($id);
    }

    /**
     * Find resources by filter
     * @param $filter Resource filter
     */
    public function findByFilter($filter) {
        $query = $this->getModel()::where($this->getConditions($filter));
        $total = $query->count();
        if (isset($filter['page']) && isset($filter['limit'])) {
            $query = $query
                ->skip($filter['page'] * $filter['limit'])
                ->take($filter['limit']);
        }
        $resources = $query->get();

        return [
            'data' => $resources,
            'filter' => $filter,
            'total' => $total,
        ];
    }

    /**
     * Lists resources by filter
     * @param $filter Resource filter
     */
    public function listByFilter($filter) {
        unset($filter['page']);
        unset($filter['limit']);

        return $this->getModel()::where($this->getConditions($filter))
            ->get();
    }

    /**
     * Creates a new resource
     * @param $resource Resource data
     */
    public function create($resource) {
        try {
            return $this->getModel()::create($resource);
        } catch(\Exception $e) {
            throw new ApiException('Could not create this new resource', 500);
        }
    }

    /**
     * Updates a resource
     * @param $id Resource id
     * @param $resource Resource data
     */
    public function update($id, $resource) {
        try {
            unset($resource['id']);
            $this->getModel()::where('id', $id)
                ->update($resource);
        } catch(\Exception $e) {
            throw new ApiException('Could not update this new resource', 500);
        }
    }

    /**
     * Removes a resource
     * @param $req Request
     * @param $res Response
     * @param $args Route params
     */
    public function remove($id) {
        try {
            $this->getModel()::destroy($id);
        } catch(\Exception $e) {
            throw new ApiException('Could not remove this resource', 500);
        }
    }

    protected abstract function getModel();
    protected abstract function getConditions($filter);
}

?>