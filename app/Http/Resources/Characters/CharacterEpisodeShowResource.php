<?php

namespace App\Http\Resources\Characters;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Character */
class CharacterEpisodeShowResource extends JsonResource
{

	public function toArray(Request $request): array
	{
		return [
			'id'               => $this->id,
			'name'             => $this->name,
			'birthday'         => $this->birthday,
			'occupations_json' => $this->occupations_json,
			'img'              => $this->img,
			'nickname'         => $this->nickname,
			'portrayed'        => $this->portrayed,
		];
	}
}
