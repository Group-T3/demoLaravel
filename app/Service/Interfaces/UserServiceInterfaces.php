<?php

namespace App\Service\Interfaces;

interface UserServiceInterfaces
{
    public function findAll();

    public function findAllByStatus();

    public function findAllBy($key, $value);

    public function findById($id);

    public function findByIdAndStatus($id);

    public function hiden($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
