<?php

namespace App\Http\Controllers;

use App\Http\Request\Auth\ChangePasswordRequest;
use App\Http\Request\MyRequest\UpdateProfileRequest;
use App\Models\User;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UserServiceInterfaces $userServiceInterfaces;

    public function __construct(UserServiceInterfaces $userServiceInterfaces)
    {
        $this->userServiceInterfaces = $userServiceInterfaces;
    }

    public function myprofile($id)
    {
        $user = $this->userServiceInterfaces->findByIdAndStatus($id);
        return view('templates.myprofile')->with('user', $user);
    }

    public function update($id, UpdateProfileRequest $request)
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
        return redirect(route('myprofile', $id));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $validator = $request->validated();

        $userId = auth()->user()->id;

        if (!Hash::check($request->password, auth()->user()->password)){
            return response()->json([
                'message' => 'Password old incorrect'
            ], 400);
        }

        if ($request->newpassword !== $request->newpasswordConfirm) {
            return response()->json([
                'message' => 'Password or PasswordConfirm incorrect'
            ], 400);
        }

        $user = User::where('id', $userId)->update(
            ['password' => bcrypt($request->newpassword)]
        );

        return redirect(route('myprofile', $userId));
    }
}
