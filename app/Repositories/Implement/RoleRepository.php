<?php

namespace App\Repositories\Implement;

use App\Models\Role;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\RoleRepositoryInterfaces;

class RoleRepository extends BaseRepository implements RoleRepositoryInterfaces
{
    protected $model_class = Role::class;
}
