<?php

namespace App\Service\Implement;

use App\Repositories\Interfaces\RoleRepositoryInterfaces;
use App\Service\Interfaces\RoleServiceInterfaces;

class RoleService implements RoleServiceInterfaces
{
    private RoleRepositoryInterfaces $roleRepositoryInterfaces;

    public function __construct(RoleRepositoryInterfaces $roleRepositoryInterfaces)
    {
        $this->roleRepositoryInterfaces = $roleRepositoryInterfaces;
    }

    public function findAll()
    {
        return $this->roleRepositoryInterfaces->getAll();
    }

    public function findById($id)
    {
        return $this->roleRepositoryInterfaces->findById($id);
    }

    public function create($data)
    {
        return $this->roleRepositoryInterfaces->create($data);
    }

    public function update($id, $data)
    {
        return $this->roleRepositoryInterfaces->update($id, $data);
    }

    public function delete($id)
    {
        return $this->roleRepositoryInterfaces->delete($id);
    }
}
