<?php

namespace App\Http\Controllers;

use App\Enums\CategoryStatus;
use App\Models\Category;
use App\Models\Product;
use App\Service\Interfaces\ProductServiceInterfaces;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    private ProductServiceInterfaces $productServiceInterfaces;

    public function __construct(ProductServiceInterfaces $productServiceInterfaces)
    {
        $this->productServiceInterfaces = $productServiceInterfaces;
    }

    public function index()
    {
        $products = Product::where('status', '=', 'ACTIVE')->paginate(8);
        return view('templates.product.list')
            ->with('products', $products)
            ->with('categories', Category::where('status', '=', CategoryStatus::ACTIVE)->get());
    }

    public function detail($id)
    {
        $product = $this->productServiceInterfaces->findByIdAndStatus($id);
        return view('templates.product.detail')
            ->with('product', $product);
    }

    public function getBy($id)
    {
        return view('templates.product.list')
            ->with('categories', Category::where('status', '=', CategoryStatus::ACTIVE)->get())
            ->with('products', Product::where([
                ['status', '=', 'ACTIVE'],
                ['category_id', '=', $id],
            ])->paginate(8));
    }
}
