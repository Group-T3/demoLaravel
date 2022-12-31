<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private UserServiceInterfaces $userServiceInterfaces;

    public function __construct(UserServiceInterfaces $userServiceInterfaces)
    {
        $this->userServiceInterfaces = $userServiceInterfaces;
    }

    public function loginProcess()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userServiceInterfaces->findByEmail($request->email);
        if ($user == null) {
            return view('auth.login')->with('messageEmail', 'Account not found');
        }

        if ($user->status == UserStatus::DELETE) {
            return view('auth.login')->with('messageEmail', 'User has been deleted');
        }

        if ($user->status == UserStatus::BAN) {
            return view('auth.login')->with('messageEmail', 'User has been banned');
        }

        if ($user->status == UserStatus::DEACTIVE) {
            return view('auth.login')->with('messageEmail', 'User is not activated');
        }

        if (!Hash::check($request->password, $user->password)){
            return view('auth.login')->with('messagePassword', 'Password is false');
        }

        $token = Auth::attempt($request->validated());
        if ($token) {
            $this->createNewToken($token);
            Cookie::queue('jwt_token', $token, 60);
//            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return view('auth.login')->with('message', 'Undefault error, Please try again after....');
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $email = $validated['email'];
        $password = $validated['password'];
        $passwordConfirm = $validated['passwordConfirm'];

        if ($password != $passwordConfirm) {
            return response()->json([
                'message' => 'Password or PasswordConfirm incorrect'
            ], 400);
        }

        $credentials = [
            'fullname' => 'A',
            'email' => $email,
            'password' => $password,
            'role_id' => '3',
            'avt' => '',
            'address' => 'A',
            'phonenumber' => 'A',
        ];

        $user = $this->userServiceInterfaces->create($credentials);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
//            'expires_in' => auth()->factory()->getTTL() * 60,
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function changePassWord(ChangePasswordRequest $request)
    {
        $validator = $request->validated();

        if ($request->password != $request->passwordConfirm) {
            return response()->json([
                'message' => 'Password or PasswordConfirm incorrect'
            ], 400);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->update(
            ['password' => bcrypt($request->password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
        ], 200);
    }
}
