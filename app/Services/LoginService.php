<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function execute(array $data)
    {
        $user = User::query()->where('email', $data['email'])->first();
        if (isset($user) && Hash::check($data['password'], $user->password))
            return $user;
        return null;
    }
}
