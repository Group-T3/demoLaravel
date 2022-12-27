<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function test()
    {
        return view('welcome');
    }
}
