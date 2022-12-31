<?php

namespace App\Filter;

class ProductFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'name',
        'desc',
        'price',
        'status',
        'category_id',
    ];

    public function filterName($name)
    {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }
}
