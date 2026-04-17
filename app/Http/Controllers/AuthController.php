<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthService;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function register(RegisterRequest $request)
    {
        $result = $this->authService->register(
            $request->validated()
        );

        return response()->json([
            'message' => 'Register successful',
            'data' => $result
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login(
            $request->validated()
        );

        return response()->json([
            'message' => 'Login successful',
            'data' => $result
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'data' => $this->authService->me($request->user())
        ]);
    }

    public function logout(Request $request)
    {
        $result = $this->authService->logout($request->user());

        return response()->json([
            'message' => $result['message']
        ]);
    }
}