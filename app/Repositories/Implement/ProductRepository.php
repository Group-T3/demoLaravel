<?php

namespace App\Repositories\Implement;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\ProductRepositoryInterfaces;

class ProductRepository extends BaseRepository implements ProductRepositoryInterfaces
{
   protected  $model_class = Product::class;
}
