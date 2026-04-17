<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepositoryInterface;

class AuthService
{
    public function __construct(
        protected UserRepositoryInterface $userRepo
    ) {}

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['created_by'] = 'SYSTEM';

        $user = $this->userRepo->create($data);

        $token = $user->createToken('mx100')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(array $data)
    {
        $user = $this->userRepo->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new \Exception('Invalid credentials');
        }

        $token = $user->createToken('mx100')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function me(User $user)
    {
        return $user;
    }

    public function logout(User $user)
    {
        $user->tokens()->delete();

        return [
            'message' => 'Logged out successfully'
        ];
    }
}