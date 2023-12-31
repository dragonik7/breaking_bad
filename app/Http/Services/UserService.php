<?php

namespace App\Http\Services;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class UserService {

	public function register(RegisterUserRequest $request) {
		$data = $request->validated();
		$user = User::create($data);
		event(new Registered($user));
		return $user;
	}

	public function login(LoginUserRequest $request) {
		$user = User::withTrashed()->firstWhere('email', '=', $request->email);
		if (!$user || !Hash::check($request->password, $user->password)) {
			throw new HttpResponseException(
				response()->json(['errors' => 'Password or email incorrect'], 400),
			);
		}
		return $user->createToken(
			name     : $request->ip() . "|" . $request->userAgent(),
			expiresAt: Carbon::parse(Carbon::now()->add('3month'))
		);
	}
}
