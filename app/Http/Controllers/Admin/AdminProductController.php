<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\ProductRequest;
use App\Models\Category;
use App\Service\Interfaces\ProductServiceInterfaces;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
    private ProductServiceInterfaces $productServiceInterfaces;

    public function __construct(ProductServiceInterfaces $productServiceInterfaces)
    {
        $this->productServiceInterfaces = $productServiceInterfaces;
    }

    public function index()
    {
        $products = $this->productServiceInterfaces->findAll();
        return view('admin.product.list')->with('products', $products);
    }

    public function detail($id)
    {
        $product = $this->productServiceInterfaces->findById($id);
        return view('admin.product.detail')->with('product', $product)->with('categories', Category::all());
    }

    public function create(ProductRequest $request)
    {
        $validated = $request->validated();
        $this->productServiceInterfaces->create($validated);
        return redirect(route('admin.show.all.products'));
    }

    public function createProcess()
    {
        return view('admin.product.create')->with('categories', Category::all());
    }

    public function hiden($id)
    {
        $this->productServiceInterfaces->hiden($id);
        return redirect(route('admin.show.all.products'));
    }

    public function delete($id)
    {
        return $this->productServiceInterfaces->delete($id);
    }

    public function deleteProcess()
    {
        return view('admin.product.delete');
    }

    public function update($id, ProductRequest $request)
    {
        $validated = $request->validated();
        $this->productServiceInterfaces->update($id, $validated);
        return redirect(route('admin.show.all.products'));
    }
}
