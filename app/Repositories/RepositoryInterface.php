<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    public function getAllByStatus();

    public function getAllBy($key, $value);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function findById($id);

    public function findByIdAndStatus($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($data);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $data);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
