<?php

namespace App\Http\Controllers;

use App\Service\Interfaces\CategoryServiceInterfaces;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    private CategoryServiceInterfaces $categoryServiceInterfaces;

    public function __construct(CategoryServiceInterfaces $categoryServiceInterfaces)
    {
        $this->categoryServiceInterfaces = $categoryServiceInterfaces;
    }

    public function getList()
    {
        $category = $this->categoryServiceInterfaces->findAllByStatus();
        return view('templates.product.category.list')->with('categories', $category);
    }

    public function getDetail($id)
    {
        $category = $this->categoryServiceInterfaces->findByIdAndStatus($id);
        return view('templates.product.category.detail')->with('category', $category);
    }
}
