<?php

namespace App\Service\Implement;

use App\Repositories\Interfaces\CategoryRepositoryInterfaces;
use App\Service\Interfaces\CategoryServiceInterfaces;

class CategoryService implements CategoryServiceInterfaces
{
    private CategoryRepositoryInterfaces $categoryRepositoryInterfaces;

    public function __construct(CategoryRepositoryInterfaces $categoryRepositoryInterfaces)
    {
        $this->categoryRepositoryInterfaces = $categoryRepositoryInterfaces;
    }

    public function findAll()
    {
       return $this->categoryRepositoryInterfaces->getAll();
    }

    public function findById($id)
    {
        return $this->categoryRepositoryInterfaces->findById($id);
    }

    public function create($data)
    {
        return $this->categoryRepositoryInterfaces->create($data);
    }

    public function update($id, $data)
    {
        return $this->categoryRepositoryInterfaces->update($id, $data);
    }

    public function delete($id)
    {
        return $this->categoryRepositoryInterfaces->delete($id);
    }
}
