<?php

namespace App\Repositories\Implement;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterfaces;

class UserRepository extends BaseRepository implements UserRepositoryInterfaces
{
    protected $model_class = User::class;
}
