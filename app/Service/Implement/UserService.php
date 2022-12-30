<?php

namespace App\Service\Implement;

use App\Repositories\Interfaces\UserRepositoryInterfaces;
use App\Service\Interfaces\UserServiceInterfaces;

class UserService implements UserServiceInterfaces
{
    private UserRepositoryInterfaces $userRepositoryInterfaces;

    public function __construct(UserRepositoryInterfaces $userRepositoryInterfaces)
    {
        $this->userRepositoryInterfaces = $userRepositoryInterfaces;
    }

    public function findAll()
    {
        return $this->userRepositoryInterfaces->getAll();
    }

    public function findById($id)
    {
        return $this->userRepositoryInterfaces->findById($id);
    }

    public function create($data)
    {
        return $this->userRepositoryInterfaces->create($data);
    }

    public function update($id, $data)
    {
        return $this->userRepositoryInterfaces->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepositoryInterfaces->delete($id);
    }

    public function findAllByStatus()
    {
        return $this->userRepositoryInterfaces->getAllByStatus();
    }

    public function findAllBy($key, $value)
    {
        return $this->userRepositoryInterfaces->getAllBy($key, $value);
    }

    public function findByIdAndStatus($id)
    {
        return $this->userRepositoryInterfaces->findByIdAndStatus($id);
    }

    public function findByEmail($email)
    {
        return $this->userRepositoryInterfaces->findByEmail($email);
    }

    public function hiden($id)
    {
        $data = $this->userRepositoryInterfaces->findById($id);
        $data->status = 'DELETE';
        return $this->userRepositoryInterfaces->hiden($id, $data);
    }
}
