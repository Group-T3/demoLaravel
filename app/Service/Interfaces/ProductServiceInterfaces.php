<?php

namespace App\Service\Interfaces;

interface ProductServiceInterfaces
{
    public function findAll();

    public function findAllByStatus();

    public function findById($id);

    public function findByIdAndStatus($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}
