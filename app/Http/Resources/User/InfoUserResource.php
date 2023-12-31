<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class InfoUserResource extends JsonResource {

	public function toArray(Request $request): array {
		return [
			'id'         => $this->id,
			'name'       => $this->name,
			'email'      => $this->email,
			'created_at' => $this->created_at,
		];
	}
}
