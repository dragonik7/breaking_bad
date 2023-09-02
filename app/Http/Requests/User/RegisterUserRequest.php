<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class RegisterUserRequest extends BaseRequest {

	public function rules(): array {
		return [
			'name'     => ['required', 'string'],
			'email'    => ['required', 'email', 'max:254', 'unique:users,email'],
			'password' => ['required', 'string'],
		];
	}
}
