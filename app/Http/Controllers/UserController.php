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

    public function index() {
        $users = $this->userServiceInterfaces->findAll();
        return view('user.list')->with('users', $users);
    }

    public function detail($id) {
        $user = $this->userServiceInterfaces->findById($id);
        return view('user.detail')->with('user', $user);
    }

    public function create(UserRequest $request) {
        $validated = $request->validated();
        return $this->userServiceInterfaces->create($validated);
    }


    public function delete($id) {
        return $this->userServiceInterfaces->delete($id);
    }

    public function update($id, UserRequest $request) {
        $validated = $request->validated();
        return $this->userServiceInterfaces->update($id, $validated);
    }
}
