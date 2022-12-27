<?php

namespace App\Http\Controllers;

use App\Http\Request\Auth\ChangePasswordRequest;
use App\Http\Request\Auth\LoginRequest;
use App\Http\Request\Auth\RegisterRequest;
use App\Models\User;
use App\Service\Interfaces\UserServiceInterfaces;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private UserServiceInterfaces $userServiceInterfaces;

    public function __construct(UserServiceInterfaces $userServiceInterfaces)
    {
        $this->userServiceInterfaces = $userServiceInterfaces;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $email = $validated['email'];
        $password = $validated['password'];
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];
        $token = Auth::attempt($credentials);
        if ($token) {
            return $this->createNewToken($token);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
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

        $user =  $this->userServiceInterfaces->create($credentials);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 200);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
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
            'expires_in' => auth()->factory()->getTTL() * 60,
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
