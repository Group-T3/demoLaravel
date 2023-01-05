<?php

namespace App\Filter;

class CartFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'user_name',
        'product_name',
    ];

    public function filterName($name)
    {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }
}
