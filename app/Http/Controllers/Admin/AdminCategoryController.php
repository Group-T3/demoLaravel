<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\CategoryRequest;
use App\Models\Category;
use App\Service\Interfaces\CategoryServiceInterfaces;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    private CategoryServiceInterfaces $categoryServiceInterfaces;

    public function __construct(CategoryServiceInterfaces $categoryServiceInterfaces)
    {
        $this->categoryServiceInterfaces = $categoryServiceInterfaces;
    }

    public function getList()
    {
        $category = $this->categoryServiceInterfaces->findAll();
        return view('admin.category.list')->with('categories', $category);
    }

    public function getDetail($id)
    {
        $category = $this->categoryServiceInterfaces->findById($id);
        return view('admin.category.detail')->with('category', $category);
    }

    public function createProcess()
    {
        return view('admin.category.create');
    }

    public function createCategory(CategoryRequest $request)
    {
        $validated = $request->validated();
        $this->categoryServiceInterfaces->create($validated);
        return redirect(route('admin.show.all.categories'));
    }

    public function updateCategory($id, CategoryRequest $request)
    {
        $validated = $request->validated();
        $this->categoryServiceInterfaces->update($id, $validated);
        return redirect(route('admin.show.all.categories'));
    }

    public function hiden($id)
    {
        $this->categoryServiceInterfaces->hiden($id);
        return redirect(route('admin.show.all.categories'));
    }

    public function deleteProcess()
    {
        return view('admin.category.delete');
    }

    public function deleteCategory($id)
    {
        $this->categoryServiceInterfaces->delete($id);
    }
}
