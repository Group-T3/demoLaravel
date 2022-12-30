<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\CreateUserRequest;
use App\Http\Request\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    private UserServiceInterfaces $userServiceInterfaces;

    public function __construct(UserServiceInterfaces $userServiceInterfaces)
    {
        $this->userServiceInterfaces = $userServiceInterfaces;
    }

    public function index()
    {
        $users = $this->userServiceInterfaces->findAll();
        return view('admin.user.list')->with('users', $users)->with('roles', Role::all());
    }

    public function getAllBy(Request $request)
    {
        $users = $this->userServiceInterfaces->findAll();
        $role_id = $request->input('role_id');
        if ($role_id != null || is_int($role_id)) {
            if ($role_id != 'Search') {
                $users = $this->userServiceInterfaces->findAllBy('role_id', $role_id);
            }
        }
        return view('admin.user.list')->with('users', $users)->with('roles', Role::all());
    }

    public function detail($id)
    {
        $user = $this->userServiceInterfaces->findById($id);
        return view('admin.user.detail')->with('user', $user)->with('roles', Role::all());
    }

    public function create(CreateUserRequest $request)
    {
        $validated = $request->validated();
        $this->userServiceInterfaces->create($validated);
        return redirect(route('admin.show.all.users'));
    }

    public function createProcess()
    {
        return view('admin.user.create')->with('roles', Role::all());
    }

    public function hiden($id)
    {
        $this->userServiceInterfaces->hiden($id);
        return redirect(route('admin.show.all.users'));
    }

    public function deleteProcess()
    {
        return view('admin.user.delete');
    }

    public function delete($id)
    {
        return $this->userServiceInterfaces->delete($id);
    }

    public function update($id, UserRequest $request)
    {
        $validated = $request->validated();

        if ($request->avt != null) {
            $imageName = time() . '.' . $request->avt->extension();
            // Public Folder
            $request->avt->move(public_path('images'), $imageName);

            $imageName = 'http://127.0.0.1:8000/images/' . $imageName;
            $user = User::where('id', $id)->update(
                ['avt' => $imageName]
            );
        }

        $this->userServiceInterfaces->update($id, $validated);
        return redirect(route('admin.show.all.users'));
    }
}
