<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryStatus;
use App\Filter\ProductFilter;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Service\Interfaces\ProductServiceInterfaces;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
    private ProductServiceInterfaces $productServiceInterfaces;

    public function __construct(ProductServiceInterfaces $productServiceInterfaces)
    {
        $this->productServiceInterfaces = $productServiceInterfaces;
    }

    public function index(ProductFilter $productFilter)
    {
//        $products = $this->productServiceInterfaces->findAll();
//        return view('admin.product.list')->with('products', $products)->with('categories', Category::all());

        $products = Product::filter($productFilter)->get();
        // Create role from enums.
        $reflector = new \ReflectionClass('App\Enums\ProductStatus');
        //
//        foreach ($reflector->getConstants() as $constValue) {
//            $statusList[] = $constValue;
//        }
        return view('admin.product.list')
            ->with('products', $products)
            ->with('categories', Category::where('status', '=', CategoryStatus::ACTIVE)->get())
            ->with('statusList', $reflector->getConstants());
    }

    public function detail($id)
    {
        $product = $this->productServiceInterfaces->findById($id);
        return view('admin.product.detail')->with('product', $product)->with('categories', Category::all());
    }

    public function getAllBy(\Illuminate\Http\Request $request)
    {
        $products = $this->productServiceInterfaces->findAll();
        $category_id = $request->input('category_id');
        if ($category_id != null || is_int($category_id)) {
            if ($category_id != 'Search') {
                $products = $this->productServiceInterfaces->findAllBy('category_id', $category_id);
            }
        }
        return view('admin.product.list')->with('products', $products)->with('categories', Category::all());
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
