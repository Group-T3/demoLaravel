<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\MyRequest\UpdateProfileRequest;
use App\Models\User;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
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
        if ($user->avt == null) {
            $user->avt = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png';
        }
        return view('templates.account.myprofile')->with('user', $user);
    }

    public function update($id, UpdateProfileRequest $request)
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
        return redirect(route('myprofile', $id));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $validator = $request->validated();

        $userId = auth()->user()->id;

        if (!Hash::check($request->password, auth()->user()->password)) {
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
            ['password' => Hash::make($request->newpassword)]
        );

        return redirect(route('myprofile', $userId));
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
        return redirect(route('myprofile', $id));
    }
}
