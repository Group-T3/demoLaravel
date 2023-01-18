<?php

namespace App\Http\Controllers;

use App\Filter\CartFilter;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Service\Interfaces\CartServiceInterface;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private CartServiceInterface $cartServiceInterface;

    public function __construct(CartServiceInterface $cartServiceInterface)
    {
        $this->cartServiceInterface = $cartServiceInterface;
    }

//    public function index(CartFilter $cartFilter)
//    {
//        $carts = Cart::filter($cartFilter)->get();
//        return view('templates.cart.list')
//            ->with('carts', $carts);
//    }

//    public function detail($id)
//    {
//        $cartsShopping = Cart::where('user_id', '=', $id)->paginate(8);
//        $mainArray = array();
//        foreach ($cartsShopping as $cart) {
//            $product = $cart->product_id;
//            $subArray = $cart->filter(function ($item) use ($product) {
//                return $item->product_id == $product;
//            });
//            $object['product'] = $product;
//            $object['cart'] = $subArray;
//            if (count($mainArray) != 0) {
//                foreach ($mainArray as $item) {
//                    if ($item['product'] == $product) {
//                        break;
//                    } else {
//                        $mainArray[] = $object;
//                    }
//                }
//            } else {
//                $mainArray[] = $object;
//            }
//        }
//        return view('templates.cart.list')
//            ->with('cartsShopping', $cartsShopping)
//            ->with('products', $mainArray);
//    }

    public function detail()
    {
        $newList = [];
        $listCart = Cart::where('user_id', '=', \auth()->id())->get();
        foreach ($listCart as $item) {
            $product = Product::where('id', '=', $item->id)->first();
            $item['product'] = $product;
            $newList[] = $item;
        }
        return view('templates.cart.list')
            ->with('cartsShopping', $newList);
    }

    public function processCreate()
    {
        return view('templates.product.detail');
    }

    public function create(CartRequest $request)
    {
        if ($request->qty != 0) {
            $request->total_price = $request->qty * $request->price;
        }
        $validated = $request->validated();
        $this->cartServiceInterface->create($validated);
        return redirect(route('show.cart', ['id' => Auth::user()->id]));
    }
}
