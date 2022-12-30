<?php

namespace App\Http\Controllers;

use App\Http\Request\UserRequest;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    private UserServiceInterfaces $userServiceInterfaces;

    public function __construct(UserServiceInterfaces $userServiceInterfaces)
    {
        $this->userServiceInterfaces = $userServiceInterfaces;
    }

    public function index()
    {
        $users = $this->userServiceInterfaces->findAllByStatus();
        return view('templates.user.list')->with('users', $users);
    }

    public function detail($id)
    {
        $user = $this->userServiceInterfaces->findByIdAndStatus($id);
        return view('templates.user.detail')->with('user', $user);
    }
}
