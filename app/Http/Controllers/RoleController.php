<?php

namespace App\Http\Controllers;

use App\Http\Request\RoleRequest;
use App\Service\Interfaces\RoleServiceInterfaces;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    private RoleServiceInterfaces $roleServiceInterfaces;

    public function __construct(RoleServiceInterfaces $roleServiceInterfaces)
    {
        $this->roleServiceInterfaces = $roleServiceInterfaces;
    }

    public function index()
    {
        $roles = $this->roleServiceInterfaces->findAll();
        return view('templates.user.role.list')->with('roles', $roles);
    }

    public function detail($id)
    {
        $role = $this->roleServiceInterfaces->findById($id);
        return view('templates.user.role.detail')->with('role', $role);
    }

    public function create(RoleRequest $request)
    {
        $validated = $request->validated();
        return $this->roleServiceInterfaces->create($validated);
    }


    public function delete($id)
    {
        return $this->roleServiceInterfaces->delete($id);
    }

    public function update($id, RoleRequest $request)
    {
        $validated = $request->validated();
        return $this->roleServiceInterfaces->update($id, $validated);
    }
}
