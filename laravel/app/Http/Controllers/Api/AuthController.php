<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8'
        ]);

        $user =
        User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make ($validateData['password']),
            'role' => 'user'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'user' => UserResource::make($user)
        ]);

    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $user = User::where('email', $loginData['email']) ->first();
        if(!$user) {
            return response()->json([
                'message' => 'User not Found'
            ], 401);
        }

        if (!Hash::check ($loginData['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'user' => UserResource::make($user),
            ]);

        }

        public function logout(Request $request)
        {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Logout success'
            ]);
        }
}


