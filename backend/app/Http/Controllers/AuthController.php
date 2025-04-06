<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'bio' => 'required|max:100',
            'username' => 'required|min:3|unique:user|regex:/^[a-zA-Z0-9._]+$/',
            'password' => 'required|min:6',
            'is_private' => 'boolean'
        ]);

        $validator->fails() && ErrorResponse::error(['message' => 'Invalid field', 'errors' => $validator->errors()], 422);

        $user = User::create($validator->validated());
        $token = $user->createToken($request->username)->plainTextToken;

        return response()->json([
            "message" => "Register success",
            "token" => $token,
            "user" => $user
        ], 201);
    }

    public function login (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $validator->fails() && ErrorResponse::error(['message' => 'Invalid field', 'errors' => $validator->errors()], 422);

        $user = User::where('username', $request->username)->first();
        $is_matched = $request->password === $user?->password;
        
        (!$user|| !$is_matched) && ErrorResponse::error(['message' => 'Wrong username or password'], 404);

        $token = $user->createToken($request->username)->plainTextToken;

        return response()->json([
            "message" => "Login success",
            "token" => $token,
            "user" => $user
        ]);
    }

    public function logout (Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout success']);
    }
}
