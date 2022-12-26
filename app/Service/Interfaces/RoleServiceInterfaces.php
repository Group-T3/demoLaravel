<?php

namespace App\Service\Interfaces;

interface RoleServiceInterfaces
{
    public function findAll();
    public function findById($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
