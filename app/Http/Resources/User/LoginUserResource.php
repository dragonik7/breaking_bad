<?php

namespace App\Http\Resources\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\NewAccessToken;

/**
 * @property NewAccessToken $resource
 * @mixin NewAccessToken
 */
class LoginUserResource extends JsonResource {

	public function toArray($request): array {
		return [
			'token'     => $this->plainTextToken,
			'expiredAt' => Carbon::parse($this->accessToken->expires_at)->format('Y-m-d H:i:s'),
		];
	}

	public function withResponse($request, $response) {
		return $response->header('Authorization', "Bearer $this->plainTextToken");
	}
}
