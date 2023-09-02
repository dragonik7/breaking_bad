<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class LoginUserRequest extends BaseRequest {

	public function rules(): array {
		return [
			'email'    => ['required', 'email', 'max:254'],
			'password' => ['required'],
		];
	}
}
