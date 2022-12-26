<?php

namespace App\Http\Controllers;

use App\Http\Request\ProductRequest;
use App\Service\Interfaces\ProductServiceInterfaces;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    private ProductServiceInterfaces $productServiceInterfaces;

    public function __construct(ProductServiceInterfaces $productServiceInterfaces)
    {
        $this->productServiceInterfaces = $productServiceInterfaces;
    }

    public function index() {
        $products = $this->productServiceInterfaces->findAll();
        return view('product.list')->with('products', $products);
    }

    public function detail($id) {
        $product = $this->productServiceInterfaces->findById($id);
        return view('product.detail')->with('product', $product);
    }

    public function create(ProductRequest $request) {
        $validated = $request->validated();
        return $this->productServiceInterfaces->create($validated);
    }


    public function delete($id) {
        return $this->productServiceInterfaces->delete($id);
    }

    public function update($id, ProductRequest $request) {
        $validated = $request->validated();
        return $this->productServiceInterfaces->update($id, $validated);
    }
}
