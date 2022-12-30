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
        $products = $this->productServiceInterfaces->findAllByStatus();
        return view('templates.product.list')->with('products', $products);
    }

    public function detail($id) {
        $product = $this->productServiceInterfaces->findByIdAndStatus($id);
        return view('templates.product.detail')->with('product', $product);
    }
}
