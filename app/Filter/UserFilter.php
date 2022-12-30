<?php

namespace App\Filter;

class UserFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'fullname',
        'email',
        'phonenumber',
        'status',
        'address',
        'role_id',
    ];

    public function filterName($name)
    {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }
}
