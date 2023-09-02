<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\User\InfoUserResource;
use App\Http\Resources\User\LoginUserResource;
use App\Http\Services\UserService;

class UserController extends Controller {

    public function login(LoginUserRequest $request, UserService $service) {
        $token = $service->login($request);
        return LoginUserResource::make($token);
    }

    public function register(RegisterUserRequest $request, UserService $service) {
        $user = $service->register($request);
        return InfoUserResource::make($user);
    }
}
