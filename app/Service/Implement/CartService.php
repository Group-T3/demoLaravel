<?php

namespace App\Service\Implement;

use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Service\Interfaces\CartServiceInterface;

class CartService implements CartServiceInterface
{
    private CartRepositoryInterface $cartRepositoryInterface;

    public function __construct(CartRepositoryInterface $cartRepositoryInterface)
    {
        $this->cartRepositoryInterface = $cartRepositoryInterface;
    }

    public function findAll()
    {
        return $this->cartRepositoryInterface->getAll();
    }

    public function findById($id)
    {
        return $this->cartRepositoryInterface->findById($id);
    }

    public function hiden($id)
    {
        $data = $this->cartRepositoryInterface->findById($id);
        $data->status = 'DELETE';
        return $this->cartRepositoryInterface->hiden($id, $data);
    }

    public function create($data)
    {
        return $this->cartRepositoryInterface->create($data);
    }

    public function update($id, $data)
    {
        return $this->cartRepositoryInterface->update($id, $data);
    }

    public function delete($id)
    {
        return $this->cartRepositoryInterface->delete($id);
    }

    public function findByUserId($id)
    {
        return $this->cartRepositoryInterface->getAll();
    }
}
