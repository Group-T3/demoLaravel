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
        return $this->productServiceInterfaces->findAll();
    }

    public function detail($id) {
        return $this->productServiceInterfaces->findById($id);
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
