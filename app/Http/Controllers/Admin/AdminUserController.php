<?php

namespace App\Http\Controllers\Admin;

use App\Filter\UserFilter;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    private UserServiceInterfaces $userServiceInterfaces;

    public function __construct(UserServiceInterfaces $userServiceInterfaces)
    {
        $this->userServiceInterfaces = $userServiceInterfaces;
    }

    public function index(UserFilter $userFilter)
    {
        $users = User::filter($userFilter)->get();
        // Create role from enums.
        $reflector = new \ReflectionClass('App\Enums\UserStatus');
        //
        foreach ($reflector->getConstants() as $constValue) {
            $statusList[] = $constValue;
        }
//        $users = $this->userServiceInterfaces->findAll();
        return view('admin.user.list')
            ->with('users', $users)
            ->with('roles', Role::all())
            ->with('statusList', $statusList);
    }

    public function getAllByStatusBan()
    {
        $users = $this->userServiceInterfaces->findAll();
        return view('admin.user.list-ban')->with('users', $users)->with('roles', Role::all());
    }

    public function getAllByStatusDelete()
    {
        $users = $this->userServiceInterfaces->findAll();
        return view('admin.user.list-delete')->with('users', $users)->with('roles', Role::all());
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
        if ($user->avt == null) {
            $user->avt = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png';
        }
        return view('admin.user.detail')->with('user', $user)->with('roles', Role::all());
    }

    public function create(CreateUserRequest $request)
    {
        $validated = $request->validated();
        $passwordHash = Hash::make($request->password);
        $validated['password'] = $passwordHash;
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

            $imageName = asset('images/' . $imageName);
            $user = User::where('id', $id)->update(
                ['avt' => $imageName]
            );
        }

        $this->userServiceInterfaces->update($id, $validated);
        return redirect(route('admin.show.user', $id));
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $urlImg = $data->avt;
        $realUrl = str_replace(asset(''), '', $urlImg);
        if (File::exists($realUrl)) {
            File::delete($realUrl);
        }
        $user = User::where('id', $id)->update(
            ['avt' => '']
        );
        return redirect(route('admin.show.user', $id));
    }
}
