<?php

namespace App\Service\Implement;

use App\Repositories\Interfaces\ProductRepositoryInterfaces;
use App\Service\Interfaces\ProductServiceInterfaces;

class ProductService implements ProductServiceInterfaces
{
    private ProductRepositoryInterfaces $productRepositoryInterfaces;

    public function __construct(ProductRepositoryInterfaces $productRepositoryInterfaces)
    {
        $this->productRepositoryInterfaces = $productRepositoryInterfaces;
    }

    public function findAll()
    {
        return $this->productRepositoryInterfaces->getAll();
    }

    public function findById($id)
    {
        return $this->productRepositoryInterfaces->findById($id);
    }

    public function create($data)
    {
        return $this->productRepositoryInterfaces->create($data);
    }

    public function update($id, $data)
    {
        return $this->productRepositoryInterfaces->update($id, $data);
    }

    public function hiden($id){
        $data = $this->productRepositoryInterfaces->findById($id);
        $data->status = 'DELETE';
        return $this->productRepositoryInterfaces->hiden($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepositoryInterfaces->delete($id);
    }

    public function findAllByStatus()
    {
        return $this->productRepositoryInterfaces->getAllByStatus();
    }

    public function findByIdAndStatus($id)
    {
        return $this->productRepositoryInterfaces->findByIdAndStatus($id);
    }
}
