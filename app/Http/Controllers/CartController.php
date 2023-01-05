<?php

namespace App\Http\Controllers;

use App\Filter\CartFilter;
use App\Models\Cart;
use App\Service\Interfaces\CartServiceInterface;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    private CartServiceInterface $cartServiceInterface;

    public function __construct(CartServiceInterface $cartServiceInterface)
    {
        $this->cartServiceInterface = $cartServiceInterface;
    }

    public function index(CartFilter $cartFilter)
    {
        $carts = Cart::filter($cartFilter)->get();
        return view('templates.cart.list')
            ->with('carts', $carts);
    }

}
