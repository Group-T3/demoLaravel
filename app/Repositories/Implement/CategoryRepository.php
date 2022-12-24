<?php

namespace App\Repositories\Implement;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterfaces;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterfaces
{
     protected  $model_class = Category::class;
}
