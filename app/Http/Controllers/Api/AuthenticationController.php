<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\Api\UserResource;
use App\Services\LoginService;
use Illuminate\Http\Response;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request, LoginService $loginService)
    {
        $user = $loginService->execute($request->validated());

        if ($user) {
            $responseData = [
                'user'  => new UserResource($user),
                'token' => $user->createToken("Personal Access Token")->plainTextToken
            ];
            return customResponse($responseData, '', Response::HTTP_OK);
        } else {
            return customResponse((object)[], 'Invalid credentials', Response::HTTP_UNAUTHORIZED);
        }
    }
}
