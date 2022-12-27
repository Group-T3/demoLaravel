<?php

namespace App\Http\Controllers;

use App\Http\Request\CategoryRequest;
use App\Service\Interfaces\CategoryServiceInterfaces;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    private CategoryServiceInterfaces $categoryServiceInterfaces;

    public function __construct(CategoryServiceInterfaces $categoryServiceInterfaces) {
        $this->categoryServiceInterfaces = $categoryServiceInterfaces;
    }

    public function getList() {
        $category = $this->categoryServiceInterfaces->findAll();
        return view('templates.product.category.list')->with('categories', $category);
    }

    public function getDetail($id) {
        $category = $this->categoryServiceInterfaces->findById($id);
        return view('templates.product.category.detail')->with('category', $category);
    }

    public function createCategory(CategoryRequest $request) {
        $validated = $request->validated();
        return $this->categoryServiceInterfaces->create($validated);
    }

    public function updateCategory($id, CategoryRequest $request) {
        $validated = $request->validated();
        return $this->categoryServiceInterfaces->update($id, $validated);
    }

    public function deleteCategory($id) {
        $this->categoryServiceInterfaces->delete($id);
    }
}
