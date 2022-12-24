<?php

namespace App\Service\Interfaces;

interface CategoryServiceInterfaces
{
    public function findAll();
    public function findById($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
