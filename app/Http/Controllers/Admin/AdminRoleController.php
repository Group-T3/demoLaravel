<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Service\Interfaces\RoleServiceInterfaces;
use Illuminate\Routing\Controller;

class AdminRoleController extends Controller
{
    private RoleServiceInterfaces $roleServiceInterfaces;

    public function __construct(RoleServiceInterfaces $roleServiceInterfaces)
    {
        $this->roleServiceInterfaces = $roleServiceInterfaces;
    }

    public function index()
    {
        $roles = $this->roleServiceInterfaces->findAll();
        return view('admin.role.list')->with('roles', $roles);
    }

    public function detail($id)
    {
        $role = $this->roleServiceInterfaces->findById($id);
        return view('admin.role.detail')->with('role', $role);
    }

    public function createProcess()
    {
        return view('admin.role.create');
    }

    public function create(RoleRequest $request)
    {
        $validated = $request->validated();
        $this->roleServiceInterfaces->create($validated);
        return redirect(route('admin.show.all.roles'));
    }

    public function hiden($id)
    {
        $this->roleServiceInterfaces->hiden($id);
        return redirect(route('admin.show.all.roles'));
    }

    public function deleteProcess()
    {
        return view('admin.role.delete');
    }

    public function delete($id)
    {
        return $this->roleServiceInterfaces->delete($id);
    }

    public function update($id, RoleRequest $request)
    {
        $validated = $request->validated();
        $this->roleServiceInterfaces->update($id, $validated);
        return redirect(route('admin.show.all.roles'));
    }
}
